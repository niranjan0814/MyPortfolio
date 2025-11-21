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
     * Get content by section with shorter caching
     */
    public static function getSection(string $section): array
    {
        // Reduced cache time to 5 minutes for better real-time updates
        return Cache::remember("landing_section_{$section}", 300, function () use ($section) {
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
     * Clear ALL landing page cache on update
     */
   protected static function boot()
{
    parent::boot();

    static::saved(function ($content) {
        Cache::flush(); // clear ALL cache
    });

    static::deleted(function ($content) {
        Cache::flush();
    });
}

}