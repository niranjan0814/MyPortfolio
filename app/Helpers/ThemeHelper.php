<?php
// app/Helpers/ThemeHelper.php - UPDATED FOR PREVIEW

namespace App\Helpers;

use App\Models\User;
use App\Models\Theme;
use Illuminate\Support\Facades\File;

class ThemeHelper
{
    /**
     * Get the active theme for a user with fallback protection
     * ✅ UPDATED: Allow anyone to preview themes (not just super admins)
     */
    public static function getActiveTheme(User $user, ?string $previewTheme = null): string
    {
        // ✅ FIX: Allow ANYONE to preview ANY active theme (remove super admin check)
        if ($previewTheme) {
            $themeModel = Theme::where('slug', $previewTheme)->first();
            
            // Allow preview if theme exists and is active
            if ($themeModel && $themeModel->is_active) {
                \Log::info("User {$user->id} previewing theme: {$previewTheme}");
                
                // Verify files exist
                if (self::themeFilesExist($previewTheme)) {
                    return $previewTheme;
                } else {
                    \Log::error("Theme files missing for: {$previewTheme}");
                    return 'theme1';
                }
            }
        }

        // Get user's active theme
        $theme = $user->active_theme ?? 'theme1';

        // Verify theme is active
        $themeModel = Theme::where('slug', $theme)->first();
        if (!$themeModel || !$themeModel->is_active) {
            self::switchToDefault($user);
            return 'theme1';
        }

        // Super admins bypass access checks for their own theme
        if (!$user->hasRole('super_admin')) {
            // Verify user has access
            if (!$user->canAccessTheme($theme)) {
                self::switchToDefault($user);
                return 'theme1';
            }
        }

        // Verify theme files exist
        // ✅ FIX: Map 'golden' to 'theme2' for file check
        $checkTheme = ($theme === 'golden') ? 'theme2' : $theme;

        if (!self::themeFilesExist($checkTheme)) {
            \Log::error("Theme files missing for: {$checkTheme} (requested: {$theme})");
            self::switchToDefault($user);
            return 'theme1';
        }

        // Return mapped theme if it was golden
        return ($theme === 'golden') ? 'theme2' : $theme;
    }

    /**
     * Check if theme component files exist
     * ✅ IMPROVED: Better logging
     */
    public static function themeFilesExist(string $themeSlug): bool
    {
        // ✅ FIX: Map 'golden' to 'theme2'
        if ($themeSlug === 'golden') {
            $themeSlug = 'theme2';
        }

        $componentPath = resource_path("views/components/{$themeSlug}");
        
        if (!File::exists($componentPath)) {
            \Log::error("Theme directory not found: {$componentPath}");
            return false;
        }
        
        $requiredFiles = [
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

        $missingFiles = [];
        foreach ($requiredFiles as $file) {
            if (!File::exists("{$componentPath}/{$file}")) {
                $missingFiles[] = $file;
            }
        }

        if (!empty($missingFiles)) {
            \Log::error("Missing theme components for {$themeSlug}: " . implode(', ', $missingFiles));
            return false;
        }

        return true;
    }

    /**
     * Switch user to default theme
     */
    protected static function switchToDefault(User $user): void
    {
        if ($user->active_theme !== 'theme1') {
            $user->update(['active_theme' => 'theme1']);
            \Log::info("User {$user->id} switched to default theme");
        }
    }

    /**
     * Get component path with fallback
     */
    public static function getComponentPath(string $themeSlug, string $component): string
    {
        $path = "components.{$themeSlug}.{$component}";
        $fallbackPath = "components.theme1.{$component}";

        // Check if theme component exists
        if (view()->exists($path)) {
            return $path;
        }

        // Fallback to theme1
        \Log::warning("Component not found: {$path}, using fallback");
        return $fallbackPath;
    }

    /**
     * Validate theme before assigning to users
     */
    public static function validateThemeForProduction(Theme $theme): array
    {
        $issues = [];

        // Check if active
        if (!$theme->is_active) {
            $issues[] = 'Theme is not active';
        }

        // Check if files exist
        if (!self::themeFilesExist($theme->slug)) {
            $issues[] = 'Theme components are missing or incomplete';
        }

        // Check if ZIP exists
        if (!$theme->zip_file_path) {
            $issues[] = 'No ZIP file uploaded';
        }

        return $issues;
    }
}