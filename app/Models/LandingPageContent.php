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
     * Get content by section with caching
     */
    public static function getSection(string $section): array
    {
        return Cache::remember("landing_section_{$section}", 3600, function () use ($section) {
            return self::where('section', $section)
                ->orderBy('order')
                ->pluck('value', 'key')
                ->toArray();
        });
    }

    /**
     * Get specific content by key
     */
    public static function getValue(string $section, string $key, $default = null)
    {
        $sectionData = self::getSection($section);
        return $sectionData[$key] ?? $default;
    }

    /**
     * Clear cache on update
     */
    protected static function boot()
    {
        parent::boot();

        static::saved(function ($content) {
            Cache::forget("landing_section_{$content->section}");
        });

        static::deleted(function ($content) {
            Cache::forget("landing_section_{$content->section}");
        });
    }
}