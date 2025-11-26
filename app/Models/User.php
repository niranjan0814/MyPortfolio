<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

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
        'favicon_path',
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

        // Auto-create default portfolio sections + assign role + give theme1 access
        static::created(function ($user) {
            // Assign default role if not already assigned
            if (!$user->hasAnyRole(['super_admin', 'premium_user', 'free_user'])) {
                $user->assignRole('free_user');
            }

            // Give default theme access (theme1) - everyone gets it
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
    // THEME RELATIONSHIPS & ACCESS METHODS
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
        // ✅ FIX: Super admins can access all active themes
        if ($this->hasRole('super_admin')) {
            $theme = \App\Models\Theme::where('slug', $themeSlug)->first();
            return $theme && $theme->is_active;
        }

        // theme1 is always accessible to everyone
        if ($themeSlug === 'theme1') {
            return true;
        }

        // Check if user owns this theme and it's active
        return $this->themes()
            ->where('themes.slug', $themeSlug)
            ->where('themes.is_active', true)
            ->wherePivot('is_active', true)
            ->exists();
    }

    /**
     * Get user's available themes (for dropdown in profile, etc.)
     */
    public function availableThemes()
    {
        // ✅ FIX: Super admins get ALL active themes
        if ($this->hasRole('super_admin')) {
            return \App\Models\Theme::where('themes.is_active', true)
                ->orderBy('sort_order')
                ->get();
        }

        // Everyone gets theme1 + any premium themes they own and are active
        return \App\Models\Theme::where(function ($query) {
            $query->where('themes.slug', 'theme1')
                ->orWhereHas('users', function ($q) {
                    $q->where('users.id', $this->id)
                        ->where('theme_user.is_active', true);
                });
        })
            ->where('themes.is_active', true)
            ->orderBy('sort_order')
            ->get();
    }

    /**
     * Accessor: active_theme with fallback and auto-correction
     */
    public function getActiveThemeAttribute(): string
    {
        $theme = $this->attributes['active_theme'] ?? 'theme1';

        // If user no longer has access, fallback to theme1
        if (!$this->canAccessTheme($theme)) {
            $this->update(['active_theme' => 'theme1']);
            return 'theme1';
        }

        return $theme;
    }

    /**
     * Check if user is premium (has premium role)
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

    /**
     * Get count of themes user has access to (accessor)
     */
    public function getThemesCountAttribute(): int
    {
        return $this->availableThemes()->count();
    }
 // app/Models/User.php
public function themeComments()
{
    return $this->hasMany(ThemeComment::class);
}
    // =================================================================
    // EXISTING RELATIONSHIPS (unchanged)
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
    /**
     * Check if user has uploaded a custom favicon
     */
    /**
     * Check if user has uploaded a custom favicon
     */
    public function hasFavicon(): bool
    {
        // ✅ First check if favicon_path is not empty
        if (empty($this->favicon_path)) {
            return false;
        }

        // ✅ Then check if file exists in storage
        return Storage::disk('public')->exists($this->favicon_path);
    }

    /**
     * Get favicon URL with fallback
     */
    public function getFaviconUrlAttribute(): string
    {
        // ✅ Only try to build URL if favicon exists
        if ($this->hasFavicon()) {
            return asset('storage/' . $this->favicon_path);
        }

        // ✅ Fallback to default
        return asset('favicon.ico');
    }

    /**
     * Delete favicon file from storage
     */
    public function deleteFavicon(): bool
    {
        if ($this->hasFavicon()) {
            Storage::disk('public')->delete($this->favicon_path);
            $this->favicon_path = null;
            $this->save();
            return true;
        }
        return false;
    }

}