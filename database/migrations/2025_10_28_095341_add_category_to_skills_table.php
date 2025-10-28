<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('skills', function (Blueprint $table) {
            // ✅ Only add the column if it doesn't exist already
            if (!Schema::hasColumn('skills', 'category')) {
                $table->string('category')->default('frontend')->after('name');
            }
        });
    }

    public function down(): void
    {
        Schema::table('skills', function (Blueprint $table) {
            // ✅ Only drop the column if it exists
            if (Schema::hasColumn('skills', 'category')) {
                $table->dropColumn('category');
            }
        });
    }
};
