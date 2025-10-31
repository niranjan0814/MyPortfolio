<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HeroContent;

class HeroContentSeeder extends Seeder
{
    public function run(): void
    {
        $contents = [
            // Greeting
            [
                'key' => 'greeting',
                'value' => "Hi, I'm",
                'type' => 'text',
                'description' => 'Text that appears before the user name',
                'order' => 0,
            ],
            
            // Description
            [
                'key' => 'description',
                'value' => 'Transforming ideas into elegant, scalable digital solutions with the power of modern web technologies',
                'type' => 'textarea',
                'description' => 'Description text below typing animation',
                'order' => 0,
            ],
            
            // Typing Animation Texts
            [
                'key' => 'typing_text_1',
                'value' => 'Full-Stack Developer',
                'type' => 'text',
                'description' => 'First typing animation text',
                'order' => 1,
            ],
            [
                'key' => 'typing_text_2',
                'value' => 'MERN Stack Enthusiast',
                'type' => 'text',
                'description' => 'Second typing animation text',
                'order' => 2,
            ],
            [
                'key' => 'typing_text_3',
                'value' => 'Software Engineering Student',
                'type' => 'text',
                'description' => 'Third typing animation text',
                'order' => 3,
            ],
            [
                'key' => 'typing_text_4',
                'value' => 'Problem Solver',
                'type' => 'text',
                'description' => 'Fourth typing animation text',
                'order' => 4,
            ],
            [
                'key' => 'typing_text_5',
                'value' => 'Team Leader',
                'type' => 'text',
                'description' => 'Fifth typing animation text',
                'order' => 5,
            ],
            
            // Button Controls
            [
                'key' => 'btn_contact_enabled',
                'value' => '1',
                'type' => 'boolean',
                'description' => 'Show/hide "Get In Touch" button',
                'order' => 0,
            ],
            [
                'key' => 'btn_contact_text',
                'value' => 'Get In Touch',
                'type' => 'text',
                'description' => 'Text for contact button',
                'order' => 0,
            ],
            [
                'key' => 'btn_projects_enabled',
                'value' => '1',
                'type' => 'boolean',
                'description' => 'Show/hide "View My Work" button',
                'order' => 0,
            ],
            [
                'key' => 'btn_projects_text',
                'value' => 'View My Work',
                'type' => 'text',
                'description' => 'Text for projects button',
                'order' => 0,
            ],
            
            // Social Links
            [
                'key' => 'social_link_1',
                'value' => json_encode([
                    'name' => 'GitHub',
                    'url' => 'https://github.com/niranjan0814',
                    'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/github/github-original.svg',
                    'color' => '#6b7280',
                ]),
                'type' => 'json',
                'description' => 'GitHub profile link',
                'order' => 1,
            ],
            [
                'key' => 'social_link_2',
                'value' => json_encode([
                    'name' => 'LinkedIn',
                    'url' => 'https://linkedin.com/in/niranjan-sivarasa-56ba57366',
                    'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/linkedin/linkedin-original.svg',
                    'color' => '#3b82f6',
                ]),
                'type' => 'json',
                'description' => 'LinkedIn profile link',
                'order' => 2,
            ],
            [
                'key' => 'social_link_3',
                'value' => json_encode([
                    'name' => 'Email',
                    'url' => 'mailto:niranjansivarajah35@gmail.com',
                    'icon' => '', // Will use SVG icon in blade
                    'color' => '#dc2626',
                ]),
                'type' => 'json',
                'description' => 'Email contact',
                'order' => 3,
            ],
            
            // Tech Stack Settings
            [
                'key' => 'tech_stack_enabled',
                'value' => '1',
                'type' => 'boolean',
                'description' => 'Show/hide tech stack preview section',
                'order' => 0,
            ],
            [
                'key' => 'tech_stack_count',
                'value' => '4',
                'type' => 'text',
                'description' => 'Number of tech icons to display',
                'order' => 0,
            ],
        ];

        foreach ($contents as $content) {
            HeroContent::updateOrCreate(
                ['key' => $content['key']],
                $content
            );
        }
    }
}