<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'title_card_image_location',
        'title_card_text',
    ];

    /**
     * Define the many-to-many relationship with BlogTag.
     */
    public function tags()
    {
        return $this->belongsToMany(
            BlogTag::class,       // Related model
            'blog_post_blog_tag', // Pivot table name
            'blog_post_id',       // Foreign key on the pivot table for this model
            'blog_tag_id'         // Foreign key on the pivot table for the related model
        );
    }
}
