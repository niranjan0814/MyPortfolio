<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HeroContent;

class FixHeroContentRepeaterSeeder extends Seeder
{
    public function run(): void
    {
        HeroContent::all()->each(function ($content) {

            // Fix typing_texts
            if (!is_array($content->typing_texts)) {
                $content->typing_texts = [];
            }

            // Fix social_links
            if (!is_array($content->social_links)) {
                $content->social_links = [];
            }

            $content->save();
        });
    }
}
