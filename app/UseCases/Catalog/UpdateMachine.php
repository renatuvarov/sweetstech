<?php

namespace App\UseCases\Catalog;

use App\Contracts\UpdatesContentImages;
use App\Entities\Catalog\Machine;
use App\Handlers\ImageManager;
use App\Traits\UpdatesImagesTrait;
use Psr\SimpleCache\CacheInterface;

class UpdateMachine implements UpdatesContentImages
{
    use UpdatesImagesTrait;

    /**
     * @var ImageManager
     */
    private $manager;
    /**
     * @var CacheInterface
     */
    private $cache;

    public function __construct(ImageManager $manager, CacheInterface $cache)
    {
        $this->manager = $manager;
        $this->cache = $cache;
    }

    public function action(Machine $machine, array $data): Machine
    {
        $machine->newTags($data['tags'] ?? []);
        $machine->newProperties($data['properties'] ?? []);

        $machine->update([
            'name_en' => $data['name_en'] ?: $machine->name_en,
            'name_ru' => $data['name_ru'] ?: $machine->name_ru,
            'short_name_ru' => $data['short_name_ru'],
            'short_name_en' => $data['short_name_en'],
            'short_description_en' => $data['short_description_en'],
            'short_description_ru' => $data['short_description_ru'],
            'meta_description_en' => $data['meta_description_en'] ?: null,
            'meta_description_ru' => $data['meta_description_ru'] ?: null,
            'description_en' => clean($data['description_en'], 'youtube'),
            'description_ru' => clean($data['description_ru'], 'youtube'),
            'mail_en' => $data['mail_en'] ?: $machine->mail_en,
            'mail_ru' => $data['mail_ru'] ?: $machine->mail_ru,
            'slug' => mb_strtolower($data['slug']) ?: $machine->slug,
            'img' => $machine->newImg($data['img'] ?? null) ?: $machine->img,
            'is_redirect' => isset($data['is_redirect']),
            'images' => empty(
                $images = $this->updateImagesList($data['images'] ?? [], $data['for_removing'] ?? [])
            ) ? null : $images,
        ]);

        $this->cache->forget('categories');

        return $machine;
    }
}
