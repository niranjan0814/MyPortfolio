<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'is_published',
        'published_at',
        'hero_image_path',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::saving(function (Blog $blog) {
            if (empty($blog->slug)) {
                $base = Str::slug($blog->title ?: 'post');
                $slug = $base;
                $i = 1;

                while (static::where('slug', $slug)->where('id', '!=', $blog->id)->exists()) {
                    $slug = $base . '-' . $i++;
                }

                $blog->slug = $slug;
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }
}


