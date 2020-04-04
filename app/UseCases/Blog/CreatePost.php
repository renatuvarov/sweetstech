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
            'title_en' => $en = $data['title_en'],
            'title_ru' => $data['title_ru'],
            'short_description_en' => $data['short_description_en'],
            'short_description_ru' => $data['short_description_ru'],
            'meta_description_en' => $data['meta_description_en'] ?: null,
            'meta_description_ru' => $data['meta_description_ru'] ?: null,
            'slug' => Str::slug(mb_strtolower($data['slug'])) ?: Str::slug(mb_strtolower($en)),
            'category_id' => $data['category_id'],
            'content_en' => clean($data['content_en'], 'youtube'),
            'content_ru' => clean($data['content_ru'], 'youtube'),
            'images' => empty($data['images']) ? null : $data['images'],
            'type' => empty($data['type']) ? Post::TYPE_POST : Post::TYPE_EXHIBITION,
        ]);

        $post->attachTags($data['tags'] ?? []);

        return $post;
    }
}
