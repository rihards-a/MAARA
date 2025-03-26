<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Define the many-to-many relationship with BlogPost.
     */
    public function posts()
    {
        return $this->belongsToMany(
            BlogPost::class,      // Related model
            'blog_post_tag',      // Pivot table name
            'blog_post_id',       // Foreign key on the pivot table for this model
            'blog_tag_id'         // Foreign key on the pivot table for the related model
        );
    }
}
