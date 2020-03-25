<?php


namespace App\UseCases\Catalog;


use App\Entities\Catalog\Machine;
use App\Handlers\ImageManager;
use Illuminate\Support\Str;

class CreateMachine
{
    /**
     * @var ImageManager
     */
    private $manager;

    public function __construct(ImageManager $manager)
    {
        $this->manager = $manager;
    }

    public function action(array $data): Machine
    {
        /** @var Machine $machine */
        $machine = Machine::make([
            'name_en' => mb_strtolower($data['name_en']),
            'name_ru' => mb_strtolower($data['name_ru']),
            'description_en' => clean($data['description_en']),
            'description_ru' => clean($data['description_ru']),
            'mail_en' => $data['mail_en'],
            'mail_ru' => $data['mail_ru'],
            'slug' => mb_strtolower($data['slug']) ?: Str::slug(mb_strtolower($data['name_en'])),
            'img' => $this->manager->load($data['img'], 'machines'),
            'images' => empty($data['images']) ? null : $data['images'],
        ]);

        $machine->save();

        $machine->newTags($data['tags'] ?? []);
        $machine->newProperties($data['properties'] ?? []);

        return $machine;
    }
}
