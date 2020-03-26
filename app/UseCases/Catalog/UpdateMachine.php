<?php

namespace App\UseCases\Catalog;

use App\Contracts\UpdatesContentImages;
use App\Entities\Catalog\Machine;
use App\Handlers\ImageManager;
use App\Traits\UpdatesImagesTrait;

class UpdateMachine implements UpdatesContentImages
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

    public function action(Machine $machine, array $data): Machine
    {
        $machine->newTags($data['tags'] ?? []);
        $machine->newProperties($data['properties'] ?? []);

        $machine->update([
            'name_en' => mb_strtolower($data['name_en']) ?: $machine->name_en,
            'name_ru' => mb_strtolower($data['name_ru']) ?: $machine->name_ru,
            'description_en' => clean($data['description_en']),
            'description_ru' => clean($data['description_ru']),
            'mail_en' => $data['mail_en'] ?: $machine->mail_en,
            'mail_ru' => $data['mail_ru'] ?: $machine->mail_ru,
            'slug' => mb_strtolower($data['slug']) ?: $machine->slug,
            'img' => $machine->newImg($data['img'] ?? null) ?: $machine->img,
            'images' => empty(
                $images = $this->updateImagesList($data['images'] ?? [], $data['for_removing'] ?? [])
            ) ? null : $images,
        ]);

        return $machine;
    }
}
