<?php
// database/seeders/RolesAndPermissionsSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // ========================================
        // CREATE PERMISSIONS
        // ========================================
        $permissions = [
            // User Management
            'view_all_users',
            'manage_users',
            'delete_users',
            'assign_roles',

            // Theme Management
            'view_all_themes',
            'create_themes',
            'edit_themes',
            'delete_themes',
            'upload_themes',
            'access_premium_themes',

            // Landing Page
            'edit_landing_page',
            'publish_landing_page',

            // Portfolio Management
            'manage_own_portfolio',
            'view_analytics',

            // Subscription & Billing
            'manage_subscriptions',
            'view_payments',

            // System Settings
            'manage_system_settings',
            'view_logs',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // ========================================
        // CREATE ROLES & ASSIGN PERMISSIONS
        // ========================================

        // 1. SUPER ADMIN - Full Access
        $superAdmin = Role::firstOrCreate(['name' => 'super_admin']);
        $superAdmin->givePermissionTo(Permission::all());

        // 2. PREMIUM USER - Access to premium themes + portfolio management
        $premiumUser = Role::firstOrCreate(['name' => 'premium_user']);
        $premiumUser->givePermissionTo([
            'manage_own_portfolio',
            'access_premium_themes',
            'view_analytics',
        ]);

        // 3. FREE USER - Basic access only
        $freeUser = Role::firstOrCreate(['name' => 'free_user']);
        $freeUser->givePermissionTo([
            'manage_own_portfolio',
        ]);

        // ========================================
        // CREATE DEFAULT SUPER ADMIN USER
        // ========================================
        $admin = User::firstOrCreate(
            ['email' => 'admin@detech.com'],
            [
                'name' => 'admin',
                'full_name' => 'Super Administrator',
                'password' => bcrypt('admin123'), // Change this!
                'description' => 'System Administrator',
            ]
        );

        $admin->assignRole('super_admin');

        $this->command->info('✅ Roles and Permissions seeded successfully!');
        $this->command->info('📧 Super Admin: admin@detech.com');
        $this->command->info('🔑 Password: admin123 (CHANGE THIS!)');
    }
}