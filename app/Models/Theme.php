<?php
// app/Models/Theme.php - ENHANCED VERSION

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use ZipArchive;

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

    // ============================================
    // RELATIONSHIPS
    // ============================================

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'theme_user')
            ->withPivot(['purchased_at', 'expires_at', 'is_active'])
            ->withTimestamps();
    }

    // ============================================
    // ATTRIBUTE ACCESSORS
    // ============================================

    public function getThumbnailUrlAttribute(): ?string
    {
        return $this->thumbnail_path
            ? Storage::disk('public')->url($this->thumbnail_path)
            : null;
    }

    public function getComponentPathAttribute(): string
    {
        return resource_path('views/components/' . $this->slug);
    }

    public function getBadgeColorAttribute(): string
    {
        return $this->is_premium ? 'warning' : 'success';
    }

    public function getBadgeTextAttribute(): string
    {
        return $this->is_premium ? 'Premium' : 'Free';
    }

    // ============================================
    // THEME FILE MANAGEMENT
    // ============================================

    /**
     * Check if theme component files exist
     */
    public function componentsExist(): bool
    {
        $requiredComponents = [
            'header.blade.php',
            'hero.blade.php',
            'about.blade.php',
            'projects.blade.php',
            'skills.blade.php',
            'experience.blade.php',
            'education.blade.php',
            'contact.blade.php',
            'footer.blade.php',
            'cv-button.blade.php'
        ];

        foreach ($requiredComponents as $component) {
            if (!File::exists($this->component_path . '/' . $component)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Extract uploaded ZIP to component directory
     */
    public function extractZip(): bool
    {
        if (!$this->zip_file_path) {
            return false;
        }

        $zipPath = Storage::disk('public')->path($this->zip_file_path);

        if (!File::exists($zipPath)) {
            \Log::error("ZIP file not found: {$zipPath}");
            return false;
        }

        $extractPath = $this->component_path;

        // Create directory if it doesn't exist
        if (!File::exists($extractPath)) {
            File::makeDirectory($extractPath, 0755, true);
        } else {
            // Clean existing files to avoid conflicts
            File::cleanDirectory($extractPath);
        }

        $zip = new ZipArchive;

        if ($zip->open($zipPath) === TRUE) {
            // ✅ CRITICAL FIX: Extract files properly
            for ($i = 0; $i < $zip->numFiles; $i++) {
                $filename = $zip->getNameIndex($i);

                // Skip directories
                if (substr($filename, -1) === '/') {
                    continue;
                }

                // ✅ FIX: Remove any parent folder from the path
                // Example: "themeb/hero.blade.php" becomes "hero.blade.php"
                $basename = basename($filename);

                // Only extract .blade.php files (skip other files)
                if (pathinfo($basename, PATHINFO_EXTENSION) === 'php') {
                    $fileContent = $zip->getFromIndex($i);

                    if ($fileContent !== false) {
                        $targetPath = $extractPath . '/' . $basename;
                        File::put($targetPath, $fileContent);
                        \Log::info("Extracted: {$basename} to {$targetPath}");
                    }
                }
            }

            $zip->close();

            \Log::info("Theme {$this->slug} extracted successfully to {$extractPath}");
            return true;
        }

        \Log::error("Failed to open ZIP: {$zipPath}");
        return false;
    }

    /**
     * Validate ZIP contains required components
     */
    public static function validateZip(string $zipPath): array
    {
        $requiredComponents = [
            'header.blade.php',
            'hero.blade.php',
            'about.blade.php',
            'projects.blade.php',
            'skills.blade.php',
            'experience.blade.php',
            'education.blade.php',
            'contact.blade.php',
            'footer.blade.php',
            'cv-button.blade.php'
        ];

        $zip = new ZipArchive;
        $missing = [];

        if ($zip->open($zipPath) === TRUE) {
            foreach ($requiredComponents as $component) {
                $found = false;

                // Check all files in ZIP
                for ($i = 0; $i < $zip->numFiles; $i++) {
                    $filename = $zip->getNameIndex($i);
                    $basename = basename($filename);

                    if ($basename === $component) {
                        $found = true;
                        break;
                    }
                }

                if (!$found) {
                    $missing[] = $component;
                }
            }
            $zip->close();
        }

        return $missing;
    }

    /**
     * Delete theme files from filesystem
     */
    public function deleteFiles(): void
    {
        // Delete component directory
        if (File::exists($this->component_path)) {
            File::deleteDirectory($this->component_path);
        }

        // Delete ZIP file
        if ($this->zip_file_path) {
            Storage::disk('public')->delete($this->zip_file_path);
        }

        // Delete thumbnail
        if ($this->thumbnail_path) {
            Storage::disk('public')->delete($this->thumbnail_path);
        }
    }

    // ============================================
    // USER ASSIGNMENT METHODS
    // ============================================

    /**
     * Assign theme to user(s)
     */
    public function assignToUser($userId): void
    {
        $userIds = is_array($userId) ? $userId : [$userId];

        foreach ($userIds as $id) {
            $this->users()->syncWithoutDetaching([
                $id => [
                    'purchased_at' => now(),
                    'is_active' => true,
                ]
            ]);
        }
    }

    /**
     * Remove theme access from user(s) and switch to theme1
     */
    public function removeFromUser($userId): void
    {
        $userIds = is_array($userId) ? $userId : [$userId];

        foreach ($userIds as $id) {
            $this->users()->detach($id);

            // Switch user to default theme if they were using this one
            $user = User::find($id);
            if ($user && $user->active_theme === $this->slug) {
                $user->update(['active_theme' => 'theme1']);
            }
        }
    }

    /**
     * Get users who have access to this theme
     */
    public function getAssignedUsers()
    {
        return $this->users()
            ->wherePivot('is_active', true)
            ->select(['users.id', 'users.name', 'users.email', 'users.full_name'])
            ->get();
    }

    // ============================================
    // QUERY SCOPES
    // ============================================

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFree($query)
    {
        return $query->where('is_premium', false);
    }

    public function scopePremium($query)
    {
        return $query->where('is_premium', true);
    }

    // ============================================
    // MODEL EVENTS
    // ============================================

    protected static function boot()
    {
        parent::boot();

        // Before deleting theme
        static::deleting(function ($theme) {
            // Can't delete theme1 (default)
            if ($theme->slug === 'theme1') {
                throw new \Exception('Cannot delete default theme (theme1)');
            }

            // Switch all users using this theme to theme1
            User::where('active_theme', $theme->slug)
                ->update(['active_theme' => 'theme1']);

            // Remove all user assignments
            $theme->users()->detach();

            // Delete theme files
            $theme->deleteFiles();
        });

        // Before deactivating theme
        static::updating(function ($theme) {
            // Can't deactivate theme1
            if ($theme->slug === 'theme1' && !$theme->is_active) {
                throw new \Exception('Cannot deactivate default theme (theme1)');
            }

            // If deactivating, switch affected users to theme1
            if ($theme->isDirty('is_active') && !$theme->is_active) {
                User::where('active_theme', $theme->slug)
                    ->update(['active_theme' => 'theme1']);
            }
        });

        // After creating/updating theme with ZIP
        static::saved(function ($theme) {
            if ($theme->isDirty('zip_file_path') && $theme->zip_file_path) {
                $theme->extractZip();
            }
        });
    }
    // Add this method to the existing Theme model

    public function comments()
    {
        return $this->hasMany(ThemeComment::class);
    }

    public function approvedComments()
    {
        return $this->comments()->approved()->recent();
    }

    public function getAverageRatingAttribute(): float
    {
        return $this->comments()
            ->approved()
            ->whereNotNull('rating')
            ->avg('rating') ?? 0;
    }

    public function getCommentsCountAttribute(): int
    {
        return $this->comments()->approved()->count();
    }
}