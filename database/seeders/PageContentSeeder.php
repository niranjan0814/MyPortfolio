<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageContent;

class PageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contents = [
            // About Section
            [
                'key' => 'about_heading',
                'value' => 'About Me',
                'type' => 'text',
                'section' => 'about',
                'description' => 'Main heading for about section',
            ],
            [
                'key' => 'about_greeting',
                'value' => "Hi, I'm Niranjan!",
                'type' => 'text',
                'section' => 'about',
                'description' => 'Greeting text in about section',
            ],
            [
                'key' => 'about_description',
                'value' => 'Driven and innovative undergraduate at <span class="font-semibold text-blue-600">SLIIT</span> specializing in <span class="font-semibold text-purple-600">Software Engineering</span>, with a strong academic record and hands-on experience in full-stack development.',
                'type' => 'html',
                'section' => 'about',
                'description' => 'Main description text in about section',
            ],
            [
                'key' => 'profile_image',
                'value' => '/images/profile.png',
                'type' => 'image',
                'section' => 'about',
                'description' => 'Profile image path',
            ],
            [
                'key' => 'profile_name',
                'value' => 'Niranjan Sivarasa',
                'type' => 'text',
                'section' => 'about',
                'description' => 'Profile name for alt text',
            ],
            [
                'key' => 'profile_gpa_badge',
                'value' => 'GPA 3.79',
                'type' => 'text',
                'section' => 'about',
                'description' => 'GPA badge text',
            ],
            [
                'key' => 'profile_degree_badge',
                'value' => 'BSc(Hons)SE',
                'type' => 'text',
                'section' => 'about',
                'description' => 'Degree badge text',
            ],
            
            // Stats
            [
                'key' => 'stat_projects_count',
                'value' => '5+',
                'type' => 'text',
                'section' => 'about',
                'description' => 'Projects completed count',
            ],
            [
                'key' => 'stat_projects_label',
                'value' => 'Projects Completed',
                'type' => 'text',
                'section' => 'about',
                'description' => 'Projects stat label',
            ],
            [
                'key' => 'stat_technologies_count',
                'value' => '10+',
                'type' => 'text',
                'section' => 'about',
                'description' => 'Technologies count',
            ],
            [
                'key' => 'stat_technologies_label',
                'value' => 'Technologies',
                'type' => 'text',
                'section' => 'about',
                'description' => 'Technologies stat label',
            ],
            [
                'key' => 'stat_team_count',
                'value' => 'Team',
                'type' => 'text',
                'section' => 'about',
                'description' => 'Team stat count',
            ],
            [
                'key' => 'stat_team_label',
                'value' => 'Leadership Skills',
                'type' => 'text',
                'section' => 'about',
                'description' => 'Team stat label',
            ],
            [
                'key' => 'stat_problem_count',
                'value' => 'Problem',
                'type' => 'text',
                'section' => 'about',
                'description' => 'Problem solving stat count',
            ],
            [
                'key' => 'stat_problem_label',
                'value' => 'Solving Expert',
                'type' => 'text',
                'section' => 'about',
                'description' => 'Problem solving stat label',
            ],
            [
                'key' => 'cta_button_text',
                'value' => "Let's Work Together",
                'type' => 'text',
                'section' => 'about',
                'description' => 'CTA button text in about section',
            ],
        ];

        foreach ($contents as $content) {
            PageContent::updateOrCreate(
                ['key' => $content['key']],
                $content
            );
        }
    }
}