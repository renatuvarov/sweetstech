<?php

namespace App\Entities\Catalog;

use App\Entities\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Entities\Common\Gallery;

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

	public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

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
        )->withPivot('value_en', 'value_ru');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public static function getByIdWithPivots($id): self
    {
        if (empty($machine = self::where('id', $id)->with('properties', 'tags')->first())) {
            throw new ModelNotFoundException('Machine with id = ' . $id . ' is not found.');
        }

        return $machine;
    }

    public function newImg(?UploadedFile $file)
    {
        if (! empty($file)) {
            Storage::delete(str_replace('/storage', '', $this->img));
            return '/storage/' . $file->store('machines');
        }
    }

    public function newTags(array $tags): void
    {
        $this->tags()->detach();

        if (! empty($tags)) {
            $this->tags()->attach($tags);
        }
    }

    public function newProperties(array $properties): void
    {
        if (! empty($properties)) {
            $this->properties()->detach();

            $propsArray = [];

            foreach ($properties as $property) {
                $propsArray[$property['name']] = [
                    'value_en' => $property['value_en'],
                    'value_ru' => $property['value_ru'],
                ];
            }

            $this->properties()->attach($propsArray);
        }
    }
}
