<?php
// database/seeders/DatabaseSeeder.php - UPDATED

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            DefaultThemesSeeder::class,
            LandingPageContentSeeder::class,
        ]);

        $this->command->info('🎉 All seeders completed successfully!');
    }
}