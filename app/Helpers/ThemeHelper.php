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
        // 1. Determine which slug we are trying to load
        $targetSlug = $previewTheme ?? $user->active_theme ?? 'theme1';

        // 2. Find the Theme model
        $themeModel = Theme::where('slug', $targetSlug)->first();

        // 3. Validate Theme Existence & Status
        if (!$themeModel || (!$themeModel->is_active && !$previewTheme)) {
            // If theme doesn't exist or is inactive (and not in preview mode), fallback
            if (!$previewTheme) {
                self::switchToDefault($user);
            }
            return 'theme1';
        }

        // 4. Check Permissions (skip for preview mode or super admin)
        if (!$previewTheme && !$user->hasRole('super_admin')) {
            if (!$user->canAccessTheme($targetSlug)) {
                self::switchToDefault($user);
                return 'theme1';
            }
        }

        // 5. Resolve Directory Name (component_path)
        // Use the DB column 'component_path' if set, otherwise fallback to slug
        $directoryName = $themeModel->component_path ?? $themeModel->slug;

        // 6. Verify Files Exist in that Directory
        if (!self::themeFilesExist($directoryName)) {
            \Log::error("Theme files missing for slug: {$targetSlug}, directory: {$directoryName}");
            
            if (!$previewTheme) {
                self::switchToDefault($user);
            }
            return 'theme1';
        }

        // 7. Return the Directory Name (NOT the slug)
        return $directoryName;
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