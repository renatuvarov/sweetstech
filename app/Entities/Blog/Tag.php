<?php

namespace App\Entities\Blog;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'blog_tags';

    public $timestamps = false;

    protected $guarded = ['id'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
