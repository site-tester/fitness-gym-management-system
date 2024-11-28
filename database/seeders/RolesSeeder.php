<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $guardname = 'web';

        // Create roles if they don't exist
        if (!Role::where('name', 'superadmin')->exists()) {
            Role::create(['name' => 'superadmin', 'guard_name' => $guardname]);
        }
        if (!Role::where('name', 'admin')->exists()) {
            Role::create(['name' => 'admin', 'guard_name' => $guardname]);
        }
        if (!Role::where('name', 'trainer')->exists()) {
            Role::create(['name' => 'trainer', 'guard_name' => $guardname]);
        }
        if (!Role::where('name', 'member')->exists()) {
            Role::create(['name' => 'member', 'guard_name' => $guardname]);
        }
    }
}
