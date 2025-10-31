<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectOverview extends Model
{
    protected $fillable = [
        'project_id',
        'overview_description',
        'key_features',
        'gallery_images',
        'tech_stack',
    ];

    protected $casts = [
        'key_features' => 'array',
        'gallery_images' => 'array',
        'tech_stack' => 'array',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    // Get tech stack skills
    public function getTechStackSkills()
    {
        if (empty($this->tech_stack)) {
            return collect([]);
        }
        
        return \App\Models\Skill::whereIn('id', $this->tech_stack)->get();
    }
}
