<?php

namespace App\Entities\Catalog;

use App\Entities\Model;

/**
 * Class Tag
 * @package App\Entities\Catalog
 *
 * @property integer $id
 * @property string $name_en
 * @property string $name_ru
 * @property string $slug
 * @property string $img
 */
class Tag extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];

    public function machines()
    {
        return $this->belongsToMany(
            Machine::class,
            'machine_tag',
            'tag_id',
            'machine_id'
        );
    }
}
