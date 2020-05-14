<?php

namespace App\Entities\Catalog;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];

    public function machines()
    {
        return $this->hasMany(Machine::class);
    }
}
