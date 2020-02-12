<?php

namespace App\Entities\Catalog;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Property
 * @package App\Entities\Catalog
 *
 * @property integer $id
 * @property string $name_en
 * @property string $name_ru
 * @property string $measure_ru
 * @property string $measure_en
 * @property string $img
 */
class Property extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];

    public function machines()
    {
        return $this->belongsToMany(
            Machine::class,
            'machine_property',
            'property_id',
            'machine_id');
    }
}
