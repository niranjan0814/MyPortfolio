<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Theme;

class ThemeSeeder extends Seeder
{
    public function run(): void
    {
        $themes = [
            [
                'name' => 'Minimal Portfolio',
                'slug' => 'theme1',
                'component_path' => 'theme1', // ✅ Added component_path
                'description' => 'A clean and minimal portfolio theme perfect for developers.',
                'is_premium' => false,
                'is_active' => true,
                'version' => '1.0.0',
                'author' => 'Detech',
                'sort_order' => 1,
                'features' => ['Clean Design', 'Responsive', 'Dark Mode'],
                'colors' => ['primary' => '#3b82f6', 'secondary' => '#1e40af'],
            ],
            [
                'name' => 'Creative Professional',
                'slug' => 'theme2',
                'component_path' => 'theme2', // ✅ Added component_path
                'description' => 'A vibrant and creative theme for designers and artists.',
                'is_premium' => true,
                'is_active' => true,
                'version' => '1.0.0',
                'author' => 'Detech',
                'sort_order' => 2,
                'features' => ['Animated Hero', 'Gallery Layout', 'Custom Typography'],
                'colors' => ['primary' => '#8b5cf6', 'secondary' => '#6d28d9'],
            ],
            [
                'name' => 'Tech Master',
                'slug' => 'theme3',
                'component_path' => 'theme3', // ✅ Added component_path
                'description' => 'Built specifically for senior developers and tech leads.',
                'is_premium' => true,
                'is_active' => true,
                'version' => '1.0.0',
                'author' => 'Detech',
                'sort_order' => 3,
                'features' => ['Repo Integration', 'Blog Support', 'Terminal Style'],
                'colors' => ['primary' => '#10b981', 'secondary' => '#059669'],
            ],
            [
                'name' => 'Executive Suite',
                'slug' => 'theme4',
                'component_path' => 'theme4', // ✅ Added component_path
                'description' => 'Professional and elegant theme for executives and consultants.',
                'is_premium' => true,
                'is_active' => true,
                'version' => '1.0.0',
                'author' => 'Detech',
                'sort_order' => 4,
                'features' => ['Timeline', 'Testimonials', 'Service Grid'],
                'colors' => ['primary' => '#f59e0b', 'secondary' => '#d97706'],
            ],
        ];

        foreach ($themes as $theme) {
            Theme::updateOrCreate(
                ['slug' => $theme['slug']],
                $theme
            );
        }

        $this->command->info('✅ Themes seeded successfully! (theme1, theme2, theme3, theme4)');
    }
}
