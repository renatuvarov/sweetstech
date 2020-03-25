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
 * @property array $images
 */
class Machine extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];

    protected $casts = [
        'images' => 'array',
    ];

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

    public function newImg(?UploadedFile $file)
    {
        if (! empty($file)) {
            Storage::delete(str_replace('/storage', '', $this->img));
            return '/storage/' . $file->store('machines');
        }
    }

    public function newTags($tags): void
    {
        $this->tags()->detach();

        if (! empty($tags)) {
            $this->tags()->attach(Tag::whereIn('id', $tags)->pluck('id'));
        }
    }

    public function newProperties($properties): void
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
