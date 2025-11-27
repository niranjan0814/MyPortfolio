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
        Schema::table('theme_comments', function (Blueprint $table) {
            $table->foreignId('theme_id')->nullable()->change();
            $table->foreignId('blog_id')->nullable()->after('theme_id')->constrained()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('theme_comments', function (Blueprint $table) {
            $table->foreignId('theme_id')->nullable(false)->change();
            $table->dropForeign(['blog_id']);
            $table->dropColumn('blog_id');
        });
    }
};
