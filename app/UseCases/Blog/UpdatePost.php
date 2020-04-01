<?php

namespace App\UseCases\Blog;

use App\Contracts\UpdatesContentImages;
use App\Entities\Blog\Post;
use App\Handlers\ImageManager;
use App\Traits\UpdatesImagesTrait;
use Illuminate\Support\Str;

class UpdatePost implements UpdatesContentImages
{
    use UpdatesImagesTrait;

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
        $post->attachTags($data['tags'] ?? []);

        $post->update([
            'title_en' => $en = mb_strtolower($data['title_en']) ?: $post->title_en,
            'title_ru' => mb_strtolower($data['title_ru']) ?: $post->title_ru,
            'slug' => Str::slug(mb_strtolower($data['slug'])) ?: $post->slug,
            'category_id' => $data['category_id'] ?: $post->category_id,
            'content_en' => clean($data['content_en']),
            'content_ru' => clean($data['content_ru']),
            'type' => empty($data['type']) ? Post::TYPE_POST : Post::TYPE_EXHIBITION,
            'images' => empty(
                $images = $this->updateImagesList($data['images'] ?? [], $data['for_removing'] ?? [])
            ) ? null : $images,
        ]);

        return $post;
    }
}
