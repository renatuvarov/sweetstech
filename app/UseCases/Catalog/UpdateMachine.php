<?php

namespace App\UseCases\Catalog;

use App\Entities\Catalog\Machine;
use App\Handlers\ImageManager;

class UpdateMachine
{
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
        $forRemoving = (array)$data['for_removing'];

        $images = array_filter($data['images'], function ($image) use ($forRemoving) {
            return ! in_array($image, (array)$forRemoving);
        });

        $machine->update([
            'name_en' => mb_strtolower($data['name_en']) ?: $machine->name_en,
            'name_ru' => mb_strtolower($data['name_ru']) ?: $machine->name_ru,
            'description_en' => $data['description_en'] ? clean($data['description_en']) : $machine->description_en,
            'description_ru' => $data['description_ru'] ? clean($data['description_ru']) : $machine->description_ru,
            'mail_en' => $data['mail_en'] ?: $machine->mail_en,
            'mail_ru' => $data['mail_ru'] ?: $machine->mail_ru,
            'slug' => mb_strtolower($data['slug']) ?: $machine->slug,
            'img' => $machine->newImg($data['img'] ?? null) ?: $machine->img,
            'images' => empty($images) ? null : $images,
        ]);

        $machine->save();
        $machine->newTags($data['tags'] ?? []);
        $machine->newProperties($data['properties'] ?? []);
        $this->manager->delete($forRemoving);
        return $machine;
    }
}
