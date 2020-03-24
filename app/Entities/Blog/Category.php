<?php

namespace App\Entities\Blog;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App\Entities\Blog
 *
 * @property integer $id
 * @property string $name_en
 * @property string $name_ru
 * @property string $img
 */
class Category extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
