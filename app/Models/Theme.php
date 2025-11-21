<?php
// app/Models/Theme.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class Theme extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'version',
        'author',
        'thumbnail_path',
        'zip_file_path',
        'is_premium',
        'is_active',
        'sort_order',
        'created_by',
        'features',
        'colors',
    ];

    protected $casts = [
        'is_premium' => 'boolean',
        'is_active' => 'boolean',
        'features' => 'array',
        'colors' => 'array',
        'sort_order' => 'integer',
    ];

    /**
     * Theme belongs to a creator (super admin)
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Users who have access to this theme
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'theme_user')
            ->withPivot(['purchased_at', 'expires_at', 'is_active'])
            ->withTimestamps();
    }

    /**
     * Get thumbnail URL
     */
    public function getThumbnailUrlAttribute(): ?string
    {
        return $this->thumbnail_path 
            ? Storage::disk('public')->url($this->thumbnail_path)
            : null;
    }

    /**
     * Get full theme path
     */
    public function getThemePathAttribute(): string
    {
        return resource_path('views/themes/' . $this->slug);
    }

    /**
     * Check if theme files exist
     */
    public function filesExist(): bool
    {
        return file_exists($this->theme_path);
    }

    /**
     * Scope: Only active themes
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope: Only free themes
     */
    public function scopeFree($query)
    {
        return $query->where('is_premium', false);
    }

    /**
     * Scope: Only premium themes
     */
    public function scopePremium($query)
    {
        return $query->where('is_premium', true);
    }

    /**
     * Get badge color based on premium status
     */
    public function getBadgeColorAttribute(): string
    {
        return $this->is_premium ? 'warning' : 'success';
    }

    /**
     * Get badge text
     */
    public function getBadgeTextAttribute(): string
    {
        return $this->is_premium ? 'Premium' : 'Free';
    }
}