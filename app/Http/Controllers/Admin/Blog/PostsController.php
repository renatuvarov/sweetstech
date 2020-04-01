<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Entities\Blog\Category;
use App\Entities\Blog\Post;
use App\Entities\Blog\Tag;
use App\Handlers\ImageManager;
use App\Handlers\TransactionManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\Posts\CreateRequest;
use App\Http\Requests\Admin\Blog\Posts\UpdateRequest;
use App\UseCases\Blog\CreatePost;
use App\UseCases\Blog\UpdatePost;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(Request $request, ?string $type = null)
    {
        $posts = Post::query();

        if (!empty($type)) {
            $posts->where('type', $type);
        }

        $posts = $posts->with('category', 'tags')->paginate(config('site.user.pagination'));
        return view('admin.blog.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.blog.posts.create', compact('categories', 'tags'));
    }

    public function store(CreateRequest $request, TransactionManager $transactionManager, CreatePost $createPost)
    {
       $transactionManager->handle(function () use ($request, $createPost) {
           $createPost->action($request->all());
       });

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

    public function update(UpdateRequest $request, Post $post, TransactionManager $transactionManager, UpdatePost $updatePost)
    {
        $transactionManager->handle(function () use ($post, $request, $updatePost) {
            $updatePost->action($request->all(), $post);
        });

        return redirect()->route('admin.blog.posts.index');
    }

    public function destroy(Post $post, ImageManager $manager)
    {
        $manager->delete($post->images);
        $post->delete();
        return redirect()->route('admin.blog.posts.index');
    }
}
