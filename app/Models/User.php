<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'full_name',
        'description',
        'phone',
        'address',
        'location',
        'github_url',
        'linkedin_url',
        'profile_image',
        'cv_path',
        'slug', // ← For clean URLs: /portfolio/john-doe
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Use 'slug' instead of 'id' in routes → /portfolio/niru works automatically
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Boot events: Auto-create portfolio data + Auto-generate unique slug
     */
    protected static function booted(): void
    {
        // 1. Auto-generate unique slug on create/update
        static::saving(function ($user) {
            if ($user->isDirty(['full_name', 'name']) || empty($user->slug)) {
                $base = Str::slug($user->full_name ?: $user->name ?: 'user');
                $slug = $base;
                $i = 1;

                // Avoid conflict with existing slugs (except itself)
                while (static::where('slug', $slug)->where('id', '!=', $user->id)->exists()) {
                    $slug = $base . '-' . $i++;
                }

                $user->slug = $slug;
            }
        });

        // 2. Auto-create default portfolio sections when a new user registers
        static::created(function ($user) {
            // Default About section
            \App\Models\About::create([
                'user_id' => $user->id,
                'about_greeting' => "Hi, I'm {$user->full_name}!",
                'about_description' => $user->description ?? 'Driven and innovative developer.',
                'profile_name' => $user->full_name,
                'profile_gpa_badge' => 'GPA 3.79',
                'profile_degree_badge' => 'BSc(Hons)SE',
                'cta_button_text' => "Let's Work Together",
                'stat_projects_count' => '5+',
                'stat_projects_label' => 'Projects Completed',
                'stat_technologies_count' => '10+',
                'stat_technologies_label' => 'Technologies',
                'stat_team_count' => 'Team',
                'stat_team_label' => 'Leadership Skills',
                'stat_problem_count' => 'Problem',
                'stat_problem_label' => 'Solving Expert',
            ]);

            // Default Hero section
            \App\Models\HeroContent::create([
                'user_id' => $user->id,
                'greeting' => "Hi, I'm",
                'description' => "Transforming ideas into elegant, scalable digital solutions with the power of modern web technologies",
                'typing_texts' => json_encode([
                    ['text' => 'Full-Stack Developer'],
                    ['text' => 'MERN Stack Enthusiast'],
                    ['text' => 'Problem Solver'],
                    ['text' => 'Team Leader'],
                ]),
                'btn_contact_enabled' => true,
                'btn_contact_text' => 'Get In Touch',
                'btn_projects_enabled' => true,
                'btn_projects_text' => 'View My Work',
                'social_links' => json_encode([]),
                'tech_stack_enabled' => true,
                'tech_stack_count' => 4,
            ]);
        });
    }

    // =================================================================
    // RELATIONSHIPS — All portfolio data belongs to this user
    // =================================================================

    public function about()
    {
        return $this->hasOne(\App\Models\About::class);
    }

    public function abouts()
    {
        return $this->hasMany(\App\Models\About::class);
    }

    public function heroContents()
    {
        return $this->hasMany(\App\Models\HeroContent::class);
    }

    public function skills()
    {
        return $this->hasMany(\App\Models\Skill::class);
    }

    public function projects()
    {
        return $this->hasMany(\App\Models\Project::class);
    }

    public function experiences()
    {
        return $this->hasMany(\App\Models\Experience::class);
    }

    public function educations()
    {
        return $this->hasMany(\App\Models\Education::class);
    }

    public function enquiries()
    {
        return $this->hasMany(\App\Models\Enquiry::class);
    }

    public function projectOverviews()
    {
        return $this->hasMany(\App\Models\ProjectOverview::class);
    }

    // =================================================================
    // CV Helpers
    // =================================================================

    public function hasCv(): bool
    {
        return !empty($this->cv_path) && Storage::disk('public')->exists($this->cv_path);
    }

    public function getCvUrlAttribute(): ?string
    {
        return $this->hasCv() ? Storage::disk('public')->url($this->cv_path) : null;
    }

    public function deleteCv(): bool
    {
        if ($this->hasCv()) {
            Storage::disk('public')->delete($this->cv_path);
            $this->cv_path = null;
            $this->save();
            return true;
        }
        return false;
    }
}