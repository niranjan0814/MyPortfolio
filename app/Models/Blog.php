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

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function booted(): void
    {
        static::saving(function (Blog $blog) {
            // Auto-generate slug if empty
            if (empty($blog->slug)) {
                $base = Str::slug($blog->title ?: 'post');
                $slug = $base;
                $i = 1;

                while (static::where('slug', $slug)->where('id', '!=', $blog->id)->exists()) {
                    $slug = $base . '-' . $i++;
                }

                $blog->slug = $slug;
            }

            // Auto-set published_at to now() if published but no timestamp set
            if ($blog->is_published && empty($blog->published_at)) {
                $blog->published_at = now();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(ThemeComment::class, 'blog_id')
            ->where('category', 'blog')
            ->whereNull('parent_id') // Only top-level comments
            ->orderBy('created_at', 'desc');
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }
}


