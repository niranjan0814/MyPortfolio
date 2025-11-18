<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class ProjectOverview extends Model
{
    protected $fillable = [
        'user_id',
        'project_id',
        'overview_description',
        'key_features',
        'gallery_images',
        'tech_stack',
    ];

    protected $casts = [
        'key_features'   => 'array',
        'gallery_images' => 'array',
        'tech_stack'     => 'array',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the Skill models for the tech stack (only from the same user)
     */
    public function getTechStackSkills(): Collection
    {
        if (empty($this->tech_stack)) {
            return collect([]);
        }

        return Skill::where('user_id', $this->user_id)
                    ->whereIn('id', $this->tech_stack)
                    ->get();
    }
}