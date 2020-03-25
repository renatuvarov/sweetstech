<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Entities\Blog\Category;
use App\Entities\Blog\Post;
use App\Entities\Blog\Tag;
use App\Handlers\ImageManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\Posts\CreateRequest;
use App\Http\Requests\Admin\Blog\Posts\UpdateRequest;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with('category', 'tags')->paginate(2);
        return view('admin.blog.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.blog.posts.create', compact('categories', 'tags'));
    }

    public function store(CreateRequest $request)
    {
        /** @var Post $post */
        $post = Post::create([
            'title_en' => $en = mb_strtolower($request->input('title_en')),
            'title_ru' => mb_strtolower($request->input('title_ru')),
            'slug' => Str::slug(mb_strtolower($request->input('slug'))) ?: Str::slug($en),
            'category_id' => $request->input('category_id'),
            'content_en' => clean($request->input('content_en')),
            'content_ru' => clean($request->input('content_ru')),
            'images' => empty($request->input('images')) ? null : $request->input('images'),
        ]);

        $post->attachTags($request->input('tags'));
        return redirect()->route('admin.blog.posts.index');
    }

    public function show(Post $post)
    {
        return view('admin.blog.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.blog.posts.edit', compact('post', 'tags', 'categories'));
    }

    public function update(UpdateRequest $request, Post $post, ImageManager $manager)
    {
        $forRemoving = (array)$request->input('for_removing');

        $images = array_filter($request->input('images'), function ($image) use ($forRemoving) {
            return ! in_array($image, (array)$forRemoving);
        });

        $post->update([
            'title_en' => $en = mb_strtolower($request->input('title_en')) ?: $post->title_en,
            'title_ru' => mb_strtolower($request->input('title_ru')) ?: $post->title_ru,
            'slug' => Str::slug(mb_strtolower($request->input('slug'))) ?: $post->slug,
            'category_id' => $request->input('category_id') ?: $post->category_id,
            'content_en' => empty($request->input('content_en')) ? $post->content_en : clean($request->input('content_en')),
            'content_ru' => empty($request->input('content_ru')) ? $post->content_ru : clean($request->input('content_ru')),
            'images' => empty($images) ? null : $images,
        ]);

        $post->attachTags($request->input('tags'));
        $manager->delete($forRemoving);
        return redirect()->route('admin.blog.posts.index');
    }

    public function destroy(Post $post, ImageManager $manager)
    {
        $manager->delete($post->images);
        $post->delete();
        return redirect()->route('admin.blog.posts.index');
    }
}
