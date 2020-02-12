<?php

namespace App\Entities\Catalog;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Type
 * @package App\Entities\Catalog
 *
 * @property integer $id
 * @property string $name_en
 * @property string $name_ru
 * @property string $slug
 * @property string $img
 */
class Type extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];

    public function machines()
    {
        return $this->hasMany(Machine::class);
    }
}
