<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('theme_comments', function (Blueprint $table) {
            // Add category field to distinguish between theme and blog comments
            $table->string('category')->default('theme')->after('theme_id');
            // Add index for better query performance
            $table->index(['theme_id', 'category']);
        });
    }

    public function down(): void
    {
        Schema::table('theme_comments', function (Blueprint $table) {
            $table->dropIndex(['theme_id', 'category']);
            $table->dropColumn('category');
        });
    }
};