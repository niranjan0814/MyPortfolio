<?php
// database/migrations/2025_11_26_100000_add_parent_id_to_theme_comments.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('theme_comments', function (Blueprint $table) {
            // Add parent_id to track replies
            $table->foreignId('parent_id')->nullable()->after('user_id')->constrained('theme_comments')->cascadeOnDelete();
            
            // Add index for better performance
            $table->index(['theme_id', 'parent_id']);
        });
    }

    public function down(): void
    {
        Schema::table('theme_comments', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropIndex(['theme_id', 'parent_id']);
            $table->dropColumn('parent_id');
        });
    }
};