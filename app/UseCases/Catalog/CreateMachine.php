<?php


namespace App\UseCases\Catalog;


use App\Entities\Catalog\Machine;
use App\Handlers\ImageManager;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Psr\SimpleCache\CacheInterface;

class CreateMachine
{
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

    public function action(array $data): Machine
    {
        /** @var Machine $machine */
        $machine = Machine::make([
            'name_en' => $data['name_en'],
            'name_ru' => $data['name_ru'],
            'short_name_ru' => $data['short_name_ru'],
            'short_name_en' => $data['short_name_en'],
            'short_description_en' => $data['short_description_en'],
            'short_description_ru' => $data['short_description_ru'],
            'meta_description_en' => $data['meta_description_en'] ?: null,
            'meta_description_ru' => $data['meta_description_ru'] ?: null,
            'description_en' => clean($data['description_en'], 'youtube'),
            'description_ru' => clean($data['description_ru'], 'youtube'),
            'mail_en' => $data['mail_en'],
            'mail_ru' => $data['mail_ru'],
            'slug' => mb_strtolower($data['slug']) ?: Str::slug(mb_strtolower($data['name_en'])),
            'img' => $this->manager->load($data['img'], 'machines'),
            'pdf_en' => $data['pdf_en']->store('machines/pdf', 'local'),
            'pdf_ru' => $data['pdf_ru']->store('machines/pdf/ru', 'local'),
            'is_redirect' => isset($data['is_redirect']),
            'images' => empty($data['images']) ? null : $data['images'],
        ]);

        $this->cache->forget('categories');

        $machine->save();

        $machine->newTags($data['tags'] ?? []);
        $machine->newProperties($data['properties'] ?? []);

        return $machine;
    }
}
