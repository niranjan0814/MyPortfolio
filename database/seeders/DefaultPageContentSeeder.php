<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\HeroContent;
use App\Models\About;
use App\Models\Experience;
use App\Models\Education;

class DefaultPageContentSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedMenakanData();
        $this->seedNiranjanData();
    }

    private function seedMenakanData()
    {
        $user = User::where('email', 'menakan@detech.com')->first();
        if (!$user) return;

        // Update Hero
        HeroContent::where('user_id', $user->id)->update([
            'greeting' => "Hello, I'm",
            'description' => "Super Administrator & Founder of Detech. Building the future of digital portfolios.",
            'typing_texts' => json_encode([
                ['text' => 'Founder'],
                ['text' => 'Visionary'],
                ['text' => 'Tech Lead'],
            ]),
        ]);

        // Update About
        About::where('user_id', $user->id)->update([
            'about_greeting' => "Greetings, I'm Menakan",
            'about_description' => "I am the founder of Detech and a passionate Super Admin. I oversee the platform and ensure everything runs smoothly.",
            'profile_name' => "Menakan Vijayanathan",
            'profile_gpa_badge' => "4.0 GPA",
            'profile_degree_badge' => "MSc CS",
            'stat_projects_count' => "100+",
            'stat_technologies_count' => "50+",
        ]);

        // Add Experience
        Experience::updateOrCreate(
            ['user_id' => $user->id, 'company' => 'Detech Inc'],
            [
                'role' => 'Founder & CEO',
                'duration' => '2020 - Present',
                'details' => 'Leading the company to new heights.',
                'location' => 'Colombo',
                'is_active' => true,
            ]
        );

        $this->command->info('✅ Default data seeded for Menakan (Super Admin)');
    }

    private function seedNiranjanData()
    {
        $user = User::where('email', 'niranjan@detech.com')->first();
        if (!$user) return;

        // Update Hero
        HeroContent::where('user_id', $user->id)->update([
            'greeting' => "Hi there, I'm",
            'description' => "A passionate Premium User and Full-Stack Developer creating amazing web experiences.",
            'typing_texts' => json_encode([
                ['text' => 'Full-Stack Dev'],
                ['text' => 'UI/UX Designer'],
                ['text' => 'Premium Member'],
            ]),
        ]);

        // Update About
        About::where('user_id', $user->id)->update([
            'about_greeting' => "Hi, I'm Niranjan",
            'about_description' => "I am a Premium User on Detech. I love building clean, responsive, and user-friendly applications.",
            'profile_name' => "Niranjan Sivarasa",
            'profile_gpa_badge' => "3.8 GPA",
            'profile_degree_badge' => "BSc SE",
            'stat_projects_count' => "25+",
            'stat_technologies_count' => "15+",
        ]);

         // Add Experience
         Experience::updateOrCreate(
            ['user_id' => $user->id, 'company' => 'Tech Solutions'],
            [
                'role' => 'Senior Developer',
                'duration' => '2022 - Present',
                'details' => 'Developing high-scale web applications.',
                'location' => 'Jaffna',
                'is_active' => true,
            ]
        );

        $this->command->info('✅ Default data seeded for Niranjan (Premium User)');
    }
}
