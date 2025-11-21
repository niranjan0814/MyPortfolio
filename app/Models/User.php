<?php
// app/Models/User.php - UPDATED VERSION

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles; // ✅ ADD THIS

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles; // ✅ ADD HasRoles

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
        'slug',
        'active_theme',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Use 'slug' instead of 'id' in routes
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Boot events
     */
    protected static function booted(): void
    {
        // Auto-generate slug
        static::saving(function ($user) {
            if ($user->isDirty(['full_name', 'name']) || empty($user->slug)) {
                $base = Str::slug($user->full_name ?: $user->name ?: 'user');
                $slug = $base;
                $i = 1;

                while (static::where('slug', $slug)->where('id', '!=', $user->id)->exists()) {
                    $slug = $base . '-' . $i++;
                }

                $user->slug = $slug;
            }
        });

        // Auto-create default portfolio sections + assign role
        static::created(function ($user) {
            // ✅ Assign default role if not already assigned
            if (!$user->hasAnyRole(['super_admin', 'premium_user', 'free_user'])) {
                $user->assignRole('free_user');
            }

            // ✅ Give default theme access (theme1)
            $defaultTheme = \App\Models\Theme::where('slug', 'theme1')->first();
            if ($defaultTheme) {
                $user->themes()->attach($defaultTheme->id, [
                    'purchased_at' => now(),
                    'is_active' => true,
                ]);
            }

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
                'description' => "Transforming ideas into elegant, scalable digital solutions",
                'typing_texts' => json_encode([
                    ['text' => 'Full-Stack Developer'],
                    ['text' => 'MERN Stack Enthusiast'],
                    ['text' => 'Problem Solver'],
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
    // THEME RELATIONSHIPS
    // =================================================================

    /**
     * Themes this user has access to
     */
    public function themes()
    {
        return $this->belongsToMany(Theme::class, 'theme_user')
            ->withPivot(['purchased_at', 'expires_at', 'is_active'])
            ->withTimestamps();
    }

    /**
     * Check if user can access a specific theme
     */
    public function canAccessTheme(string $themeSlug): bool
    {
        // Super admins can access all themes
        if ($this->hasRole('super_admin')) {
            return true;
        }

        // Check if user owns this theme
        return $this->themes()
            ->where('slug', $themeSlug)
            ->wherePivot('is_active', true)
            ->exists();
    }

    /**
     * Get user's available themes
     */
    public function availableThemes()
    {
        if ($this->hasRole('super_admin')) {
            return Theme::active()->get();
        }

        return $this->themes()->wherePivot('is_active', true)->get();
    }

    /**
     * Check if user is premium
     */
    public function isPremium(): bool
    {
        return $this->hasAnyRole(['premium_user', 'super_admin']);
    }

    /**
     * Check if user is super admin
     */
    public function isSuperAdmin(): bool
    {
        return $this->hasRole('super_admin');
    }

    // =================================================================
    // EXISTING RELATIONSHIPS
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

    // CV Helpers
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