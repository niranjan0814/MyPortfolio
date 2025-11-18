<?php
// database/migrations/2025_11_18_051133_add_user_id_to_portfolio_tables.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /**
         * ONLY add user_id to tables that DO NOT have it:
         * - enquiries
         * - project_overviews
         */

        // Add user_id to enquiries
        if (!Schema::hasColumn('enquiries', 'user_id')) {
            Schema::table('enquiries', function (Blueprint $table) {
                $table->foreignId('user_id')
                    ->nullable()
                    ->after('id')
                    ->constrained()
                    ->cascadeOnDelete();

                $table->index('user_id');
            });
        }

        // Add user_id to project_overviews
        if (!Schema::hasColumn('project_overviews', 'user_id')) {
            Schema::table('project_overviews', function (Blueprint $table) {
                $table->foreignId('user_id')
                    ->nullable()
                    ->after('id')
                    ->constrained()
                    ->cascadeOnDelete();

                $table->index('user_id');
            });
        }
    }

    public function down(): void
    {
        // Remove user_id from enquiries
        if (Schema::hasColumn('enquiries', 'user_id')) {
            Schema::table('enquiries', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->dropIndex(['user_id']);
                $table->dropColumn('user_id');
            });
        }

        // Remove user_id from project_overviews
        if (Schema::hasColumn('project_overviews', 'user_id')) {
            Schema::table('project_overviews', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->dropIndex(['user_id']);
                $table->dropColumn('user_id');
            });
        }
    }
};
