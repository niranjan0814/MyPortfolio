<?php
// app/Helpers/ThemeHelper.php - CREATE NEW FILE

namespace App\Helpers;

use App\Models\User;
use App\Models\Theme;
use Illuminate\Support\Facades\File;

class ThemeHelper
{
    /**
     * Get the active theme for a user with fallback protection
     */
    public static function getActiveTheme(User $user, ?string $previewTheme = null): string
    {
        // Preview mode (for testing)
        if ($previewTheme && $user->canAccessTheme($previewTheme)) {
            return $previewTheme;
        }

        $theme = $user->active_theme ?? 'theme1';

        // Verify theme is active
        $themeModel = Theme::where('slug', $theme)->first();
        if (!$themeModel || !$themeModel->is_active) {
            self::switchToDefault($user);
            return 'theme1';
        }

        // Verify user has access
        if (!$user->canAccessTheme($theme)) {
            self::switchToDefault($user);
            return 'theme1';
        }

        // Verify theme files exist
        if (!self::themeFilesExist($theme)) {
            self::switchToDefault($user);
            return 'theme1';
        }

        return $theme;
    }

    /**
     * Check if theme component files exist
     */
    public static function themeFilesExist(string $themeSlug): bool
    {
        $componentPath = resource_path("views/components/{$themeSlug}");
        
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

        foreach ($requiredFiles as $file) {
            if (!File::exists("{$componentPath}/{$file}")) {
                \Log::error("Missing theme component: {$themeSlug}/{$file}");
                return false;
            }
        }

        return true;
    }

    /**
     * Switch user to default theme
     */
    protected static function switchToDefault(User $user): void
    {
        $user->update(['active_theme' => 'theme1']);
        \Log::info("User {$user->id} switched to default theme");
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