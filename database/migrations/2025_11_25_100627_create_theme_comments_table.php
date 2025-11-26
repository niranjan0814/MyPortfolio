<?php
// database/migrations/2025_11_25_100627_create_theme_comments_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('theme_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('theme_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->text('comment');
            $table->unsignedTinyInteger('rating')->nullable(); // 1-5 stars
            $table->boolean('is_approved')->default(true); // For moderation
            $table->timestamps();

            // Index for faster queries
            $table->index(['theme_id', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('theme_comments');
    }
};