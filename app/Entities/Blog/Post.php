<?php

namespace App\Entities\Blog;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'images' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tag_post', 'post_id', 'tag_id');
    }

    public function attachTags(array $tags)
    {
        $this->tags()->detach();

        if (! empty(array_filter($tags))) {
            $this->tags()->attach($tags);
        }
    }
}
