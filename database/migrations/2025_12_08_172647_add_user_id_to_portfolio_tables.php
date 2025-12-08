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
        // Add user_id to projects
        Schema::table('projects', function (Blueprint $table) {
            if (!Schema::hasColumn('projects', 'user_id')) {
                $table->foreignId('user_id')->nullable()->after('id')->constrained()->cascadeOnDelete();
            }
        });

        // Add user_id to skills
        Schema::table('skills', function (Blueprint $table) {
            if (!Schema::hasColumn('skills', 'user_id')) {
                $table->foreignId('user_id')->nullable()->after('id')->constrained()->cascadeOnDelete();
            }
        });

         // Add user_id to experiences
         Schema::table('experiences', function (Blueprint $table) {
            if (!Schema::hasColumn('experiences', 'user_id')) {
                $table->foreignId('user_id')->nullable()->after('id')->constrained()->cascadeOnDelete();
            }
        });

         // Add user_id to education
         // Note: Table name is 'education' (singular) based on migration file
         if (Schema::hasTable('education')) {
             Schema::table('education', function (Blueprint $table) {
                if (!Schema::hasColumn('education', 'user_id')) {
                    $table->foreignId('user_id')->nullable()->after('id')->constrained()->cascadeOnDelete();
                }
             });
         }
         // Just in case it's plural in some contexts or I missed a rename, though migration said 'education'
         if (Schema::hasTable('educations')) {
            Schema::table('educations', function (Blueprint $table) {
               if (!Schema::hasColumn('educations', 'user_id')) {
                   $table->foreignId('user_id')->nullable()->after('id')->constrained()->cascadeOnDelete();
               }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
        });

        Schema::table('skills', function (Blueprint $table) {
            if (Schema::hasColumn('skills', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
        });

        Schema::table('experiences', function (Blueprint $table) {
            if (Schema::hasColumn('experiences', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
        });

        if (Schema::hasTable('education')) {
            Schema::table('education', function (Blueprint $table) {
                if (Schema::hasColumn('education', 'user_id')) {
                    $table->dropForeign(['user_id']);
                    $table->dropColumn('user_id');
                }
            });
        }

        if (Schema::hasTable('educations')) {
             Schema::table('educations', function (Blueprint $table) {
                 if (Schema::hasColumn('educations', 'user_id')) {
                     $table->dropForeign(['user_id']);
                     $table->dropColumn('user_id');
                 }
             });
         }
    }
};
