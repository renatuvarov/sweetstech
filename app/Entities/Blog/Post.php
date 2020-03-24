<?php

namespace App\Entities\Blog;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tag_post', 'post_id', 'tag_id');
    }

    protected $casts = [
        'images' => 'array',
    ];
}
