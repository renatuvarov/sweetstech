<?php


namespace App\UseCases\Blog;


use App\Entities\Blog\Post;
use Illuminate\Support\Str;

class CreatePost
{
    public function action(array $data): Post
    {
        /** @var Post $post */
        $post = Post::create([
            'title_en' => $en = mb_strtolower($data['title_en']),
            'title_ru' => mb_strtolower($data['title_ru']),
            'slug' => Str::slug(mb_strtolower($data['slug'])) ?: Str::slug($en),
            'category_id' => $data['category_id'],
            'content_en' => clean($data['content_en']),
            'content_ru' => clean($data['content_ru']),
            'images' => empty($data['images']) ? null : $data['images'],
            'type' => empty($data['type']) ? Post::TYPE_POST : Post::TYPE_EXHIBITION,
        ]);

        $post->attachTags($data['tags']);

        return $post;
    }
}
