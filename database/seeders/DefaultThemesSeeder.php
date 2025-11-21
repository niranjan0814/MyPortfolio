<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Theme;

class DefaultThemesSeeder extends Seeder
{
    public function run(): void
    {
        $themes = [
            [
                'name' => 'Modern Professional',
                'slug' => 'theme1',
                'description' => 'Clean, contemporary design with glassmorphism effects and smooth animations',
                'version' => '1.0.0',
                'author' => 'Detech Team',
                'is_premium' => false,
                'is_active' => true,
                'sort_order' => 1,
                'features' => [
                    'Dark Mode Support',
                    'Glassmorphism Effects',
                    'Mobile Responsive',
                    'SEO Optimized',
                    'Fast Loading',
                ],
                'colors' => [
                    'primary' => '#3B82F6',
                    'secondary' => '#8B5CF6',
                    'accent' => '#F59E0B',
                    'background' => '#F9FAFB',
                ],
            ],
            [
                'name' => 'Corporate Clean',
                'slug' => 'theme2',
                'description' => 'Professional business layout with minimal design principles',
                'version' => '1.0.0',
                'author' => 'Detech Team',
                'is_premium' => true,
                'is_active' => false, // Coming soon
                'sort_order' => 2,
                'features' => [
                    'Minimal Design',
                    'Typography Focused',
                    'Business Ready',
                    'Fast Performance',
                ],
                'colors' => [
                    'primary' => '#059669',
                    'secondary' => '#10B981',
                    'accent' => '#34D399',
                    'background' => '#FFFFFF',
                ],
            ],
            [
                'name' => 'Creative Bold',
                'slug' => 'theme3',
                'description' => 'Vibrant and artistic design for creative professionals',
                'version' => '1.0.0',
                'author' => 'Detech Team',
                'is_premium' => true,
                'is_active' => false, // Coming soon
                'sort_order' => 3,
                'features' => [
                    'Bold Colors',
                    'Dynamic Animations',
                    'Portfolio Focused',
                    'Creative Layouts',
                ],
                'colors' => [
                    'primary' => '#F59E0B',
                    'secondary' => '#D97706',
                    'accent' => '#B45309',
                    'background' => '#1F2937',
                ],
            ],
        ];

        foreach ($themes as $themeData) {
            Theme::updateOrCreate(
                ['slug' => $themeData['slug']],
                $themeData
            );
        }

        $this->command->info('✅ Default themes seeded successfully!');
        $this->command->info('📌 Theme1 (Modern Professional) is active and free');
        $this->command->info('📌 Theme2 & Theme3 marked as "Coming Soon"');
    }
}