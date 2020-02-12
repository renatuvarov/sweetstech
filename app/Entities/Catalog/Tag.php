<?php

namespace App\Entities\Catalog;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tag
 * @package App\Entities\Catalog
 *
 * @property integer $id
 * @property string $name_en
 * @property string $name_ru
 * @property string $slug
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
