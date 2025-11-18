<?php
// database/migrations/2025_11_18_052000_add_slug_to_users_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('slug')->unique()->nullable()->after('name');
        });

        // Optional: Auto-generate slug on user creation/update
        \App\Models\User::saved(function ($user) {
            if (empty($user->slug)) {
                $base = \Str::slug($user->full_name ?? $user->name);
                $slug = $base;
                $i = 1;
                while (\App\Models\User::where('slug', $slug)->exists()) {
                    $slug = $base . '-' . $i++;
                }
                $user->update(['slug' => $slug]);
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};