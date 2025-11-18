<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
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
        'cv_path', // ✅ Added CV path
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    // ✅ NEW: Auto-create portfolio data after user registration
    protected static function booted()
    {
        static::created(function ($user) {
            // Create default About section
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

            // Create default Hero section
            \App\Models\HeroContent::create([
                'user_id' => $user->id,
                'greeting' => "Hi, I'm",
                'description' => "Transforming ideas into elegant, scalable digital solutions with the power of modern web technologies",
                'typing_texts' => [
                    ['text' => 'Full-Stack Developer'],
                    ['text' => 'MERN Stack Enthusiast'],
                    ['text' => 'Problem Solver'],
                    ['text' => 'Team Leader'],
                ],
                'btn_contact_enabled' => true,
                'btn_contact_text' => 'Get In Touch',
                'btn_projects_enabled' => true,
                'btn_projects_text' => 'View My Work',
                'social_links' => [],
                'tech_stack_enabled' => true,
                'tech_stack_count' => 4,
            ]);
        });
    }

    /**
     * ✅ Check if user has a CV uploaded
     */
    public function hasCv(): bool
    {
        return !empty($this->cv_path) && Storage::disk('public')->exists($this->cv_path);
    }

    /**
     * ✅ Get the full URL for the CV
     */
    public function getCvUrlAttribute(): ?string
    {
        if ($this->hasCv()) {
            return Storage::disk('public')->url($this->cv_path);
        }
        return null;
    }

    /**
     * ✅ Delete the CV file from storage
     */
    public function deleteCv(): bool
    {
        if ($this->cv_path && Storage::disk('public')->exists($this->cv_path)) {
            return Storage::disk('public')->delete($this->cv_path);
        }
        return false;
    }

    /**
     * Relationship: User has one About record
     */
    public function about()
    {
        return $this->hasOne(\App\Models\About::class);
    }
}