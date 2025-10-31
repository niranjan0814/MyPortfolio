<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('project_overviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->text('overview_description')->nullable(); // Rich text overview
            $table->json('key_features')->nullable(); // [{key: "Feature", value: "Description"}]
            $table->json('gallery_images')->nullable(); // ["url1", "url2", "url3"]
            $table->json('tech_stack')->nullable(); // [1, 2, 3] - Skill IDs
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_overviews');
    }
};