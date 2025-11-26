<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ThemeComment extends Model
{
    protected $fillable = [
        'theme_id',
        'user_id',
        'parent_id', 
        'comment',
        'rating',
        'is_approved',
        'category',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_approved' => 'boolean',
        'created_at' => 'datetime',
    ];

    // ✅ Relationships
    public function theme(): BelongsTo
    {
        return $this->belongsTo(Theme::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // ✅ NEW: Parent comment (the comment this is replying to)
    public function parent(): BelongsTo
    {
        return $this->belongsTo(ThemeComment::class, 'parent_id');
    }

    // ✅ NEW: Child comments (replies to this comment)
    public function replies(): HasMany
    {
        return $this->hasMany(ThemeComment::class, 'parent_id')->with('user')->orderBy('created_at', 'asc');
    }

    // ✅ Scopes
    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeThemeComments($query)
    {
        return $query->where('category', 'theme');
    }

    public function scopeBlogComments($query)
    {
        return $query->where('category', 'blog');
    }

    // ✅ NEW: Get only top-level comments (no parent)
    public function scopeTopLevel($query)
    {
        return $query->whereNull('parent_id');
    }
}
