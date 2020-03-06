<?php

namespace App\Entities\Catalog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Class Machine
 * @package App\Entities\Catalog
 *
 * @property integer $id
 * @property string $name_en
 * @property string $name_ru
 * @property string $description_en
 * @property string $description_ru
 * @property string $mail_ru
 * @property string $mail_en
 * @property string $slug
 * @property string $img
 */
class Machine extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];

//    public function type()
//    {
//        return $this->belongsTo(Type::class);
//    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'machine_tag',
            'machine_id',
            'tag_id'
        );
    }

    public function properties()
    {
        return $this->belongsToMany(
            Property::class,
            'machine_property',
            'machine_id',
            'property_id'
        )->withPivot('value');
    }

    public static function getByIdWithPivots($id): self
    {
        return self::where('id', $id)->with('properties', 'tags')->first();
    }

//    public static function getByIdWithPivots($id): self
//    {
//        return self::where('id', $id)->with('properties', 'type', 'tags')->first();
//    }

    public static function new(array $data): self
    {
        /** @var Machine $machine */
        $machine = Machine::make([
            'name_en' => mb_strtolower($data['name_en']),
            'name_ru' => mb_strtolower($data['name_ru']),
            'description_en' => $data['description_en'],
            'description_ru' => $data['description_ru'],
            'mail_en' => $data['mail_en'],
            'mail_ru' => $data['mail_ru'],
            'slug' => mb_strtolower($data['slug']) ?: Str::slug(mb_strtolower($data['name_en'])),
            'img' => '/storage/' . $data['img']->store('machines'),
        ]);

//        $machine->type()->associate(Type::findOrFail($data['type']));

        $machine->save();

        $machine->newTags($data['tags'] ?? []);
        $machine->newProperties($data['properties'] ?? []);

        return $machine;
    }

    public function updateMachine(array $data): self
    {
        $this->update([
            'name_en' => mb_strtolower($data['name_en']) ?: $this->name_en,
            'name_ru' => mb_strtolower($data['name_ru']) ?: $this->name_ru,
            'description_en' => $data['description_en'] ?: $this->description_en,
            'description_ru' => $data['description_ru'] ?: $this->description_ru,
            'mail_en' => $data['mail_en'] ?: $this->mail_en,
            'mail_ru' => $data['mail_ru'] ?: $this->mail_ru,
            'slug' => mb_strtolower($data['slug']) ?: $this->slug,
            'img' => $this->newImg($data['img'] ?? null) ?: $this->img,
        ]);

//        $this->type()->associate(Type::findOrFail($data['type']));

        $this->save();

        $this->newTags($data['tags'] ?? []);
        $this->newProperties($data['properties'] ?? []);

        return $this;
    }

    private function newImg(?UploadedFile $file)
    {
        if (! empty($file)) {
            Storage::delete(str_replace('/storage', '', $this->img));
            return '/storage/' . $file->store('machines');
        }
    }

    private function newTags($tags): void
    {
        $this->tags()->detach();

        if (! empty($tags)) {
            $this->tags()->attach(Tag::whereIn('id', $tags)->pluck('id'));
        }
    }

    private function newProperties($properties): void
    {
        if (! empty($properties)) {
            $this->properties()->detach();

            $propsArray = [];

            foreach ($properties as $property) {
                $propsArray[$property['name']] = ['value' => $property['value']];
            }

            $this->properties()->attach($propsArray);
        }
    }
}
