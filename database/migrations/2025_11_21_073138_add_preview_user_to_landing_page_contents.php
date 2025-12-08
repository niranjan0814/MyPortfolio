<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // No need to alter table structure since landing_page_contents
        // uses a key-value system. The preview_user_id will be stored
        // as a regular key-value pair.
        
        // However, if you want to seed a default preview user:
        \App\Models\LandingPageContent::updateOrCreate(
            ['key' => 'preview_user_id'],
            [
                'value' => 2,
                'section' => 'hero',
                'type' => 'text',
                'order' => 0
            ]
        );

        \App\Models\LandingPageContent::updateOrCreate(
            ['key' => 'visual_type'],
            [
                'value' => 'portfolio_preview',
                'section' => 'hero',
                'type' => 'text',
                'order' => 0
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \App\Models\LandingPageContent::where('key', 'preview_user_id')->delete();
        \App\Models\LandingPageContent::where('key', 'visual_type')->delete();
    }
};