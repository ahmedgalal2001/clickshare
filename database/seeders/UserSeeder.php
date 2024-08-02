<?php
// database/seeders/UserSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        $staffRole = Role::firstOrCreate(['name' => 'staff']);
        $nonStaffRole = Role::firstOrCreate(['name' => 'non-staff']);
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $managerRole = Role::firstOrCreate(['name' => 'manager']);

        // Create a staff user
        $staffUser = User::factory()->create([
            'name' => 'Staff User',
            'email' => 'staff@example.com',
            'password' => bcrypt('password'), // Ensure you hash the password
        ]);
        $staffUser->assignRole($staffRole);

        // Create a non-staff user
        $nonStaffUser = User::factory()->create([
            'name' => 'Non-Staff User',
            'email' => 'nonstaff@example.com',
            'password' => bcrypt('password'), // Ensure you hash the password
        ]);
        $nonStaffUser->assignRole($nonStaffRole);

        // Create an admin user
        $adminUser = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // Ensure you hash the password
        ]);
        $adminUser->assignRole($adminRole);

        // Create a manager user
        $managerUser = User::factory()->create([
            'name' => 'Manager User',
            'email' => 'manager@example.com',
            'password' => bcrypt('password'), // Ensure you hash the password
        ]);
        $managerUser->assignRole($managerRole);
    }
}
