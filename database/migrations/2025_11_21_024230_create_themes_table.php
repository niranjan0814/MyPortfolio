<?php
// database/migrations/2025_11_20_000001_create_themes_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // "Modern Professional"
            $table->string('slug')->unique(); // "theme-modern-pro"
            $table->text('description')->nullable();
            $table->string('version')->default('1.0.0');
            $table->string('author')->nullable();
            $table->string('thumbnail_path')->nullable(); // screenshot.png
            $table->string('zip_file_path')->nullable(); // original ZIP backup
            $table->boolean('is_premium')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->json('features')->nullable(); // ['Dark Mode', 'Responsive', etc.]
            $table->json('colors')->nullable(); // Preview color scheme
            $table->timestamps();

            $table->index(['is_active', 'is_premium']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('themes');
    }
};