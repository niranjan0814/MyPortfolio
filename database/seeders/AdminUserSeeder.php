<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // ========================================
        // 1. Menakan Vijayanathan - SUPER ADMIN
        // ========================================
        $menakan = User::firstOrCreate(
            ['email' => 'menakan@detech.com'],
            [
                'name' => 'menakan',
                'full_name' => 'Menakan Vijayanathan',
                'password' => Hash::make('admin123'), 
                'description' => 'Super Administrator & Founder',
                'location' => 'Colombo, Sri Lanka',
            ]
        );

        // Assign Super Admin Role
        if (!$menakan->hasRole('super_admin')) {
            $menakan->assignRole('super_admin');
        }

        // ========================================
        // 2. Niranjan Sivarasa - PREMIUM USER
        // ========================================
        $niranjan = User::firstOrCreate(
            ['email' => 'nirujan@gmail.com'],
            [
                'name' => 'Niranjan',
                'full_name' => 'Niranjan Sivarasa',
                'password' => Hash::make('nirujan1@1234'),
                'description' => 'Full Stack Developer & Premium Member',
                'location' => 'Jaffna, Sri Lanka',
            ]
        );

        // Assign Premium User Role
        // First remove free_user if it was auto-assigned by User model event
        if ($niranjan->hasRole('free_user')) {
            $niranjan->removeRole('free_user');
        }
        
        if (!$niranjan->hasRole('premium_user')) {
            $niranjan->assignRole('premium_user');
        }

        $this->command->info('✅ Admin Users seeded successfully!');
        $this->command->info('👤 Menakan Vijayanathan (Super Admin) - menakan@detech.com');
        $this->command->info('👤 Niranjan Sivarasa (Premium User) - niranjan@detech.com');
        $this->command->info('🔑 Default Password: password');
    }
}
