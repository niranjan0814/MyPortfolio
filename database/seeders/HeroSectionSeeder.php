<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageContent;
use App\Models\User;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the first user (or you can specify a user_id)
        $user = User::first();
        
        if (!$user) {
            $this->command->error('No user found! Please create a user first.');
            return;
        }

        $heroContents = [
            // Main Heading
            [
                'user_id' => $user->id,
                'key' => 'hero_greeting',
                'value' => 'Hi, I\'m',
                'type' => 'text',
                'section' => 'hero',
                'description' => 'Greeting text before name',
            ],
            [
                'user_id' => $user->id,
                'key' => 'hero_name',
                'value' => 'Niranjan Sivarasa',
                'type' => 'text',
                'section' => 'hero',
                'description' => 'Your full name',
            ],
            
            // Typing Animation Texts (comma-separated)
            [
                'user_id' => $user->id,
                'key' => 'hero_typing_texts',
                'value' => 'Full-Stack Developer,MERN Stack Enthusiast,Software Engineering Student,Problem Solver,Team Leader',
                'type' => 'text',
                'section' => 'hero',
                'description' => 'Comma-separated list of typing animation texts',
            ],
            
            // Description
            [
                'user_id' => $user->id,
                'key' => 'hero_description',
                'value' => 'Transforming ideas into elegant, scalable digital solutions with the power of modern web technologies',
                'type' => 'textarea',
                'section' => 'hero',
                'description' => 'Hero section description/tagline',
            ],
            
            // CTA Buttons
            [
                'user_id' => $user->id,
                'key' => 'hero_primary_button_text',
                'value' => 'Get In Touch',
                'type' => 'text',
                'section' => 'hero',
                'description' => 'Primary button text',
            ],
            [
                'user_id' => $user->id,
                'key' => 'hero_primary_button_link',
                'value' => '#contact',
                'type' => 'text',
                'section' => 'hero',
                'description' => 'Primary button link (use # for same page)',
            ],
            [
                'user_id' => $user->id,
                'key' => 'hero_secondary_button_text',
                'value' => 'View My Work',
                'type' => 'text',
                'section' => 'hero',
                'description' => 'Secondary button text',
            ],
            [
                'user_id' => $user->id,
                'key' => 'hero_secondary_button_link',
                'value' => '#projects',
                'type' => 'text',
                'section' => 'hero',
                'description' => 'Secondary button link',
            ],
            
            // Social Links
            [
                'user_id' => $user->id,
                'key' => 'hero_github_url',
                'value' => 'https://github.com/niranjan0814',
                'type' => 'text',
                'section' => 'hero',
                'description' => 'GitHub profile URL',
            ],
            [
                'user_id' => $user->id,
                'key' => 'hero_linkedin_url',
                'value' => 'https://linkedin.com/in/niranjan-sivarasa-56ba57366',
                'type' => 'text',
                'section' => 'hero',
                'description' => 'LinkedIn profile URL',
            ],
            [
                'user_id' => $user->id,
                'key' => 'hero_email',
                'value' => 'niranjansivarajah35@gmail.com',
                'type' => 'text',
                'section' => 'hero',
                'description' => 'Email address',
            ],
            
            // Tech Stack Preview (comma-separated icon URLs)
            [
                'user_id' => $user->id,
                'key' => 'hero_tech_stack_label',
                'value' => 'Tech Stack:',
                'type' => 'text',
                'section' => 'hero',
                'description' => 'Tech stack label text',
            ],
            [
                'user_id' => $user->id,
                'key' => 'hero_tech_stack_icons',
                'value' => 'React|https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg,Node.js|https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original.svg,MongoDB|https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mongodb/mongodb-original.svg,JavaScript|https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg',
                'type' => 'textarea',
                'section' => 'hero',
                'description' => 'Tech stack icons (format: Name|URL,Name|URL)',
            ],
            
            // Scroll Indicator
            [
                'user_id' => $user->id,
                'key' => 'hero_scroll_text',
                'value' => 'Scroll to explore',
                'type' => 'text',
                'section' => 'hero',
                'description' => 'Scroll indicator text',
            ],
        ];

        foreach ($heroContents as $content) {
            PageContent::updateOrCreate(
                [
                    'user_id' => $content['user_id'],
                    'key' => $content['key']
                ],
                $content
            );
        }

        $this->command->info('Hero section content seeded successfully for user: ' . $user->name);
    }
}