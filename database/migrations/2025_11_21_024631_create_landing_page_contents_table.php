<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('landing_page_contents', function (Blueprint $table) {
            $table->id();
            $table->string('section'); // hero, features, themes, contact, footer
            $table->string('key'); // hero_title, feature_1_title, etc.
            $table->text('value')->nullable(); // Actual content
            $table->string('type')->default('text'); // text, textarea, image, boolean
            $table->integer('order')->default(0); // Display order
            $table->timestamps();

            // Unique combination of section + key
            $table->unique(['section', 'key']);
            
            // Index for faster queries
            $table->index('section');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('landing_page_contents');
    }
};