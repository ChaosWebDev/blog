<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'stub',
        'body',
        'tags',
        'cover_image',
        'views',
        'meta',
        'reading_time',
        'published_at',
        'is_published'
    ];

    protected static function booted(): void
    {
        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });

        static::updating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }
}
