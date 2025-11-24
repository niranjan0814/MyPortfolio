<?php
// app/Helpers/ThemeHelper.php - FIXED VERSION

namespace App\Helpers;

use App\Models\User;
use App\Models\Theme;
use Illuminate\Support\Facades\File;

class ThemeHelper
{
    /**
     * Get the active theme for a user with fallback protection
     * ✅ FIXED: Super admins can preview ANY theme
     */
    public static function getActiveTheme(User $user, ?string $previewTheme = null): string
    {
        // ✅ FIX 1: Super admins can preview ANY active theme
        if ($previewTheme) {
            $themeModel = Theme::where('slug', $previewTheme)->first();
            
            // Allow super admins to preview any active theme
            if ($user->hasRole('super_admin') && $themeModel && $themeModel->is_active) {
                \Log::info("Super admin previewing theme: {$previewTheme}");
                
                // Verify files exist
                if (self::themeFilesExist($previewTheme)) {
                    return $previewTheme;
                } else {
                    \Log::error("Theme files missing for: {$previewTheme}");
                    return 'theme1';
                }
            }
            
            // Regular users need access
            if ($user->canAccessTheme($previewTheme)) {
                return $previewTheme;
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

        // ✅ FIX 2: Super admins bypass access checks
        if (!$user->hasRole('super_admin')) {
            // Verify user has access
            if (!$user->canAccessTheme($theme)) {
                self::switchToDefault($user);
                return 'theme1';
            }
        }

        // Verify theme files exist
        if (!self::themeFilesExist($theme)) {
            \Log::error("Theme files missing for: {$theme}");
            self::switchToDefault($user);
            return 'theme1';
        }

        return $theme;
    }

    /**
     * Check if theme component files exist
     * ✅ IMPROVED: Better logging
     */
    public static function themeFilesExist(string $themeSlug): bool
    {
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