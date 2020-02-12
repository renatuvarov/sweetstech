<?php

namespace App\Entities\Catalog;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Machine
 * @package App\Entities\Catalog
 *
 * @property integer $id
 * @property string $name_en
 * @property string $name_ru
 * @property string $description_en
 * @property string $description_ru
 * @property string $slug
 * @property string $img
 * @property integer $type_id
 */
class Machine extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];

    public function type()
    {
        return $this->belongsTo(Type::class);
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
        );
    }
}
