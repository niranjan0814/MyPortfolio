<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    public function up(): void
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('about_greeting')->nullable();
            $table->text('about_description')->nullable();
            $table->string('profile_name')->nullable();
            $table->string('profile_gpa_badge')->nullable();
            $table->string('profile_degree_badge')->nullable();
            $table->string('cta_button_text')->nullable();
            $table->string('stat_projects_count')->nullable();
            $table->string('stat_projects_label')->nullable();
            $table->string('stat_technologies_count')->nullable();
            $table->string('stat_technologies_label')->nullable();
            $table->string('stat_team_count')->nullable();
            $table->string('stat_team_label')->nullable();
            $table->string('stat_problem_count')->nullable();
            $table->string('stat_problem_label')->nullable();
            $table->json('stats_icon_urls')->nullable(); // Store icon URLs as JSON
            $table->json('soft_skills')->nullable(); // Store soft skills and icons as JSON
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
}