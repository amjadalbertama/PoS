<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat peran "superadmin"
        Role::firstOrCreate(['name' => 'superadmin']);

        // Membuat peran "manager"
        Role::firstOrCreate(['name' => 'manager']);

        // Membuat peran "supervisor"
        Role::firstOrCreate(['name' => 'supervisor']);

        // Membuat peran "staff"
        Role::firstOrCreate(['name' => 'staff']);

        // Membuat peran "warehouse"
        Role::firstOrCreate(['name' => 'warehouse']);

        // Membuat peran "finance"
        Role::firstOrCreate(['name' => 'finance']);
        //
    }
}
