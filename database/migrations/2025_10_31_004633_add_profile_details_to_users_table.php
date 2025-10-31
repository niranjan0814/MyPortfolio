<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('full_name')->nullable()->after('name'); // e.g., "Niranjan Sivarasa"
            $table->text('description')->nullable(); // Long bio/description
            $table->string('phone')->nullable();
            $table->string('address')->nullable(); // Full address
            $table->string('location')->nullable(); // Short location, e.g., "Jaffna, Sri Lanka"
            $table->string('github_url')->nullable();
            $table->string('linkedin_url')->nullable();
            // Add more if needed, e.g., twitter_url, etc.
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['full_name', 'description', 'phone', 'address', 'location', 'github_url', 'linkedin_url']);
        });
    }
};