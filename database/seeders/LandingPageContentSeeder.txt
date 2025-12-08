<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LandingPageContent;

class LandingPageContentSeeder extends Seeder
{
    public function run(): void
    {
        $contents = [
            // ========================================
            // HERO SECTION
            // ========================================
            [
                'section' => 'hero',
                'key' => 'hero_title',
                'value' => 'Showcase Your Extraordinary Work',
                'type' => 'text',
                'order' => 1,
            ],
            [
                'section' => 'hero',
                'key' => 'hero_subtitle',
                'value' => 'Create a stunning, professional portfolio in minutes. Impress clients, employers, and collaborators with a portfolio that truly represents your skills and achievements.',
                'type' => 'textarea',
                'order' => 2,
            ],
            [
                'section' => 'hero',
                'key' => 'hero_cta_primary',
                'value' => 'Get Started',
                'type' => 'text',
                'order' => 3,
            ],
            [
                'section' => 'hero',
                'key' => 'hero_cta_secondary',
                'value' => 'Learn More',
                'type' => 'text',
                'order' => 4,
            ],

            // ========================================
            // FEATURES SECTION
            // ========================================
            [
                'section' => 'features',
                'key' => 'features_title',
                'value' => 'Why Choose Detech?',
                'type' => 'text',
                'order' => 1,
            ],
            [
                'section' => 'features',
                'key' => 'features_subtitle',
                'value' => 'Everything you need to build and manage your professional portfolio',
                'type' => 'textarea',
                'order' => 2,
            ],
            [
                'section' => 'features',
                'key' => 'feature_1_title',
                'value' => 'Lightning Fast',
                'type' => 'text',
                'order' => 3,
            ],
            [
                'section' => 'features',
                'key' => 'feature_1_description',
                'value' => 'Optimized performance and instant loading times to keep your visitors engaged.',
                'type' => 'textarea',
                'order' => 4,
            ],
            [
                'section' => 'features',
                'key' => 'feature_2_title',
                'value' => 'Fully Customizable',
                'type' => 'text',
                'order' => 5,
            ],
            [
                'section' => 'features',
                'key' => 'feature_2_description',
                'value' => 'Multiple themes and layouts to match your personal style and brand identity.',
                'type' => 'textarea',
                'order' => 6,
            ],
            [
                'section' => 'features',
                'key' => 'feature_3_title',
                'value' => 'Secure & Reliable',
                'type' => 'text',
                'order' => 7,
            ],
            [
                'section' => 'features',
                'key' => 'feature_3_description',
                'value' => 'Enterprise-grade security and 99.9% uptime guarantee for peace of mind.',
                'type' => 'textarea',
                'order' => 8,
            ],

            // ========================================
            // THEMES SECTION
            // ========================================
            [
                'section' => 'themes',
                'key' => 'themes_title',
                'value' => 'Choose Your Theme',
                'type' => 'text',
                'order' => 1,
            ],
            [
                'section' => 'themes',
                'key' => 'themes_subtitle',
                'value' => 'Select from beautifully designed themes to get started',
                'type' => 'textarea',
                'order' => 2,
            ],

            // ========================================
            // CONTACT SECTION
            // ========================================
            [
                'section' => 'contact',
                'key' => 'contact_title',
                'value' => 'Get in Touch',
                'type' => 'text',
                'order' => 1,
            ],
            [
                'section' => 'contact',
                'key' => 'contact_subtitle',
                'value' => 'Have questions about Detech? We\'re here to help! Send us a message and we\'ll respond as soon as possible.',
                'type' => 'textarea',
                'order' => 2,
            ],
            [
                'section' => 'contact',
                'key' => 'contact_email',
                'value' => 'support@detech.com',
                'type' => 'text',
                'order' => 3,
            ],
            [
                'section' => 'contact',
                'key' => 'contact_phone',
                'value' => '+1 (555) 123-4567',
                'type' => 'text',
                'order' => 4,
            ],
            [
                'section' => 'contact',
                'key' => 'contact_address',
                'value' => '123 Tech Street, Silicon Valley, CA',
                'type' => 'text',
                'order' => 5,
            ],

            // ========================================
            // FOOTER SECTION
            // ========================================
            [
                'section' => 'footer',
                'key' => 'footer_company_name',
                'value' => 'Detech Company',
                'type' => 'text',
                'order' => 1,
            ],
            [
                'section' => 'footer',
                'key' => 'footer_tagline',
                'value' => 'Build stunning portfolios effortlessly.',
                'type' => 'text',
                'order' => 2,
            ],
            [
                'section' => 'footer',
                'key' => 'footer_copyright',
                'value' => '© 2025 Detech Company. All rights reserved.',
                'type' => 'text',
                'order' => 3,
            ],
        ];

        foreach ($contents as $content) {
            LandingPageContent::updateOrCreate(
                [
                    'section' => $content['section'],
                    'key' => $content['key'],
                ],
                $content
            );
        }

        $this->command->info('✅ Landing page content seeded successfully!');
        $this->command->info('📋 Sections created: Hero, Features, Themes, Contact, Footer');
    }
}