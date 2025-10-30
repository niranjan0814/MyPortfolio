<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class PageContent extends Model
{
    protected $fillable = [
        'user_id',
        'key',
        'value',
        'type',
        'section',
        'description',
    ];

    /**
     * Relationship: PageContent belongs to a User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get content by key with caching (user-specific)
     */
    public static function getContent(string $key, $default = null, $userId = null)
    {
        $userId = $userId ?? Auth::id();
        
        return Cache::remember("page_content_{$userId}_{$key}", 3600, function () use ($key, $default, $userId) {
            $content = self::where('key', $key)
                          ->where('user_id', $userId)
                          ->first();
            return $content ? $content->value : $default;
        });
    }

    /**
     * Get all content for a section (user-specific)
     */
    public static function getSection(string $section, $userId = null)
    {
        $userId = $userId ?? Auth::id();
        
        return Cache::remember("page_section_{$userId}_{$section}", 3600, function () use ($section, $userId) {
            return self::where('section', $section)
                      ->where('user_id', $userId)
                      ->pluck('value', 'key')
                      ->toArray();
        });
    }

    /**
     * Get all sections for a user
     */
    public static function getAllSections($userId = null)
    {
        $userId = $userId ?? Auth::id();
        
        return Cache::remember("page_all_sections_{$userId}", 3600, function () use ($userId) {
            $contents = self::where('user_id', $userId)->get();
            
            $grouped = [];
            foreach ($contents as $content) {
                $grouped[$content->section][$content->key] = $content->value;
            }
            
            return $grouped;
        });
    }

    /**
     * Clear cache when content is updated
     */
    protected static function boot()
    {
        parent::boot();

        static::saved(function ($content) {
            Cache::forget("page_content_{$content->user_id}_{$content->key}");
            Cache::forget("page_section_{$content->user_id}_{$content->section}");
            Cache::forget("page_all_sections_{$content->user_id}");
        });

        static::deleted(function ($content) {
            Cache::forget("page_content_{$content->user_id}_{$content->key}");
            Cache::forget("page_section_{$content->user_id}_{$content->section}");
            Cache::forget("page_all_sections_{$content->user_id}");
        });
    }
}