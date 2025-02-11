<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'manage-users',
            'manage-clients',
            'manage-trainers',
            'manage-bookings',
            'manage-payments',
            'manage-payment-methods',
            'manage-gym',
            'manage-gym-workouts',
            'manage-gym-services',
            'manage-gym-inventory',
            'manage-gym-equipment',
            'manage-contact-inbox',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        $this->command->info('Permissions seeded successfully.');

        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $trainerRole = Role::firstOrCreate(['name' => 'trainer', 'guard_name' => 'web']);

        // Assign permissions correctly
        $adminPermissions = Permission::all();
        $trainerPermissions = Permission::whereIn('name', [
            'manage-users',
            'manage-clients',
            'manage-bookings',
            // 'manage-payments',
            'manage-gym',
            'manage-gym-workouts',
            // 'manage-gym-services',
            // 'manage-gym-inventory',
            // 'manage-gym-equipment',
        ])->get();

        $adminRole->syncPermissions($adminPermissions); // Give all permissions to admin
        $trainerRole->syncPermissions($trainerPermissions); // Give only selected ones to trainer

        $this->command->info('Roles and permissions assigned successfully.');
    }
}
