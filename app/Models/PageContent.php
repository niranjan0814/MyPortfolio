<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class PageContent extends Model
{
    protected $fillable = [
        'key',
        'value',
        'type',
        'section',
        'description',
    ];

    /**
     * Get content by key with caching
     */
    public static function getContent(string $key, $default = null)
    {
        return Cache::remember("page_content_{$key}", 3600, function () use ($key, $default) {
            $content = self::where('key', $key)->first();
            return $content ? $content->value : $default;
        });
    }

    /**
     * Get all content for a section
     */
    public static function getSection(string $section)
    {
        return Cache::remember("page_section_{$section}", 3600, function () use ($section) {
            return self::where('section', $section)->pluck('value', 'key')->toArray();
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