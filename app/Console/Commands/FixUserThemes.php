<?php
// app/Console/Commands/FixUserThemes.php - CREATE THIS FILE

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Theme;
use App\Helpers\ThemeHelper;

class FixUserThemes extends Command
{
    protected $signature = 'themes:fix-users';
    protected $description = 'Fix users with invalid theme assignments';

    public function handle()
    {
        $this->info('🔧 Starting theme fix process...');
        
        // 1. Scan filesystem for available themes
        $this->info('📁 Scanning filesystem for themes...');
        $availableThemes = ThemeHelper::scanAvailableThemes();
        $this->info('Found themes: ' . implode(', ', $availableThemes));
        
        // 2. Sync themes with database
        $this->info('🔄 Syncing themes with database...');
        ThemeHelper::syncThemesWithDatabase();
        
        // 3. Fix users with invalid themes
        $this->info('👥 Checking users...');
        $users = User::all();
        $fixed = 0;
        
        foreach ($users as $user) {
            $currentTheme = $user->active_theme ?? 'theme1';
            
            // Check if theme exists
            if (!ThemeHelper::themeExists($currentTheme)) {
                $this->warn("User {$user->id} ({$user->email}) has invalid theme: {$currentTheme}");
                
                // Switch to theme1
                $user->update(['active_theme' => 'theme1']);
                
                // Give them access to theme1
                $theme1 = Theme::where('slug', 'theme1')->first();
                if ($theme1 && !$user->themes()->where('theme_id', $theme1->id)->exists()) {
                    $user->themes()->attach($theme1->id, [
                        'purchased_at' => now(),
                        'is_active' => true,
                    ]);
                }
                
                $this->info("✅ Fixed user {$user->id} - switched to theme1");
                $fixed++;
            } else {
                $this->info("✓ User {$user->id} ({$user->email}) has valid theme: {$currentTheme}");
            }
        }
        
        $this->info("🎉 Complete! Fixed {$fixed} users");
        $this->info("Available themes: " . implode(', ', $availableThemes));
        
        return 0;
    }
}