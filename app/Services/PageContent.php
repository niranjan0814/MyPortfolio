<?php

namespace App\Services;

use App\Models\HeroContent;

class PageContent
{
    public static function getSection(string $section, int $userId): array
    {
        if ($section !== 'hero') return [];

        $hero = HeroContent::where('user_id', $userId)->first();

        if (!$hero) {
            return self::defaultHeroData($userId);
        }

        return [
            'greeting' => $hero->greeting,
            'description' => $hero->description,
            'user_name' => \App\Models\User::find($userId)?->name ?? 'User',
            'typing_texts' => $hero->typing_texts ?? [],
            'btn_contact_enabled' => $hero->btn_contact_enabled,
            'btn_contact_text' => $hero->btn_contact_text,
            'btn_projects_enabled' => $hero->btn_projects_enabled,
            'btn_projects_text' => $hero->btn_projects_text,
            'social_links' => $hero->social_links ?? [],
            'tech_stack_enabled' => $hero->tech_stack_enabled,
            'tech_stack_count' => $hero->tech_stack_count,
        ];
    }

    private static function defaultHeroData($userId)
    {
        $user = \App\Models\User::find($userId);
        return [
            'greeting' => "Hi, I'm",
            'description' => 'Transforming ideas into elegant, scalable digital solutions...',
            'user_name' => $user?->name ?? 'User',
            'typing_texts' => ['Full-Stack Developer', 'Problem Solver', 'Team Leader'],
            'btn_contact_enabled' => true,
            'btn_contact_text' => 'Get In Touch',
            'btn_projects_enabled' => true,
            'btn_projects_text' => 'View My Work',
            'social_links' => [],
            'tech_stack_enabled' => true,
            'tech_stack_count' => 4,
        ];
    }
}