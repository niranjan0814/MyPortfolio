<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class LandingPageContent extends Model
{
    protected $fillable = [
        'section',
        'key',
        'value',
        'type',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    /**
     * Get content by section WITHOUT caching
     */
    public static function getSection(string $section): array
    {
        // ✅ REMOVED CACHING - Always fetch fresh data
        return self::where('section', $section)
            ->orderBy('order')
            ->pluck('value', 'key')
            ->toArray();
    }

    /**
     * Get specific content by key WITHOUT caching
     */
    public static function getValue(string $section, string $key, $default = null)
    {
        $content = self::where('section', $section)
            ->where('key', $key)
            ->first();
            
        return $content ? $content->value : $default;
    }

    /**
     * Clear ALL cache on update
     */
    protected static function boot()
    {
        parent::boot();

        static::saved(function ($content) {
            // Clear all cache to ensure fresh data
            Cache::flush();
        });

        static::deleted(function ($content) {
            Cache::flush();
        });
    }
}