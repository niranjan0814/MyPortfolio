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
        // database/migrations/xxxx_xx_xx_create_hero_contents_table.php
Schema::create('hero_contents', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->string('greeting')->default("Hi, I'm");
    $table->text('description')->nullable();
    $table->json('typing_texts')->nullable();
    $table->boolean('btn_contact_enabled')->default(true);
    $table->string('btn_contact_text')->default('Get In Touch');
    $table->boolean('btn_projects_enabled')->default(true);
    $table->string('btn_projects_text')->default('View My Work');
    $table->json('social_links')->nullable();
    $table->boolean('tech_stack_enabled')->default(true);
    $table->integer('tech_stack_count')->default(4);
    $table->string('hero_image_url')->nullable();
    $table->timestamps();

    $table->unique('user_id');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_contents');
    }
};
