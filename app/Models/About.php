<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'user_id',
        'about_greeting',
        'about_description',
        'profile_name',
        'profile_gpa_badge',
        'profile_degree_badge',
        'cta_button_text',
        'stat_projects_count',
        'stat_projects_label',
        'stat_technologies_count',
        'stat_technologies_label',
        'stat_team_count',
        'stat_team_label',
        'stat_problem_count',
        'stat_problem_label',
        'stats_icon_urls', // JSON to store icon URLs for stats
        'soft_skills', // JSON to store soft skills and their icons
    ];

    protected $casts = [
        'stats_icon_urls' => 'array',
        'soft_skills' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}