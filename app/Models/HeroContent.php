<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class HeroContent extends Model
{
    protected $fillable = [
        'key',
        'value',
        'type',
        'description',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    /**
     * Get content by key with caching
     */
    public static function getContent(string $key, $default = null)
    {
        return Cache::remember("hero_content_{$key}", 3600, function () use ($key, $default) {
            $content = self::where('key', $key)->first();
            
            if (!$content) {
                return $default;
            }

            // Handle boolean type
            if ($content->type === 'boolean') {
                return filter_var($content->value, FILTER_VALIDATE_BOOLEAN);
            }

            // Handle JSON type
            if ($content->type === 'json') {
                return json_decode($content->value, true);
            }

            return $content->value;
        });
    }

    /**
     * Get all typing texts ordered
     */
    public static function getTypingTexts()
    {
        return Cache::remember('hero_typing_texts', 3600, function () {
            return self::where('key', 'LIKE', 'typing_text_%')
                       ->orderBy('order')
                       ->pluck('value')
                       ->toArray();
        });
    }

    /**
     * Get all social links
     */
    public static function getSocialLinks()
    {
        return Cache::remember('hero_social_links', 3600, function () {
            $links = self::where('key', 'LIKE', 'social_link_%')->get();
            return $links->map(function ($link) {
                return json_decode($link->value, true);
            })->filter()->values()->toArray();
        });
    }

    /**
     * Clear cache when content is updated
     */
    protected static function boot()
    {
        parent::boot();

        static::saved(function () {
            Cache::flush();
        });

        static::deleted(function () {
            Cache::flush();
        });
    }
}