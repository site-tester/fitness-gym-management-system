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
            Permission::create(['name' => $permission, 'guard_name' => 'web']);
        }

        $this->command->info('Permissions seeded successfully.');

        $adminPermissions = Permission::all();
        $this->command->info('Admin permissions: ' . implode(', ', $adminPermissions->pluck('name')->toArray()));

        $trainerPermissions = [
            'manage-users',
            'manage-clients',
            'manage-bookings',
            'manage-payments',
            'manage-gym',
            'manage-gym-workouts',
            'manage-gym-services',
            'manage-gym-inventory',
            'manage-gym-equipment',
        ];

        $this->command->info('Trainer permissions: ' . implode(', ', $trainerPermissions));

        $adminRole = Role::where('name', 'admin')->first();
        $adminRole->givePermissionTo($adminPermissions);

        $trainerRole = Role::where('name', 'trainer')->first();
        $trainerRole->givePermissionTo($trainerPermissions);
    }
}
