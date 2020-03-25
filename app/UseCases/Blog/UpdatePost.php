<?php

namespace App\UseCases\Blog;

use App\Entities\Blog\Post;
use App\Handlers\ImageManager;
use Illuminate\Support\Str;

class UpdatePost
{
    /**
     * @var ImageManager
     */
    private $manager;

    public function __construct(ImageManager $manager)
    {
        $this->manager = $manager;
    }

    public function action(array $data, Post $post): Post
    {
        $forRemoving = $data['for_removing'] ?? [];

        $images = array_filter($data['images'], function ($image) use ($forRemoving) {
            return ! in_array($image, (array)$forRemoving);
        });

        $post->update([
            'title_en' => $en = mb_strtolower($data['title_en']) ?: $post->title_en,
            'title_ru' => mb_strtolower($data['title_ru']) ?: $post->title_ru,
            'slug' => Str::slug(mb_strtolower($data['slug'])) ?: $post->slug,
            'category_id' => $data['category_id'] ?: $post->category_id,
            'content_en' => empty($data['content_en']) ? $post->content_en : clean($data['content_en']),
            'content_ru' => empty($data['content_ru']) ? $post->content_ru : clean($data['content_ru']),
            'images' => empty($images) ? null : $images,
        ]);

        $post->attachTags($data['tags']);
        $this->manager->delete($forRemoving);

        return $post;
    }
}
