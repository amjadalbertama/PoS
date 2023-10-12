<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\MenusTableSeeder;
use Database\Seeders\PacksTableSeeder;
use Database\Seeders\RolesTableSeeder;
use Database\Seeders\SuperAdminSeeder;
use Database\Seeders\BranchsTableSeeder;
use Database\Seeders\CategoryTableSeeder;
use Database\Seeders\ProductsTableSeeder;
use Database\Seeders\SuppliersTableSeeder;
use Database\Seeders\PermissionsTableSeeder;
use Database\Seeders\ProductTransationSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(MenusTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(SuperAdminSeeder::class);
        $this->call(PermissionsTableSeeder::class);

        $this->call(CategoryTableSeeder::class);
        $this->call(BranchsTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);
        $this->call(PacksTableSeeder::class);
        $this->call(ProductsTableSeeder::class);

        $this->call(ProductTransationSeeder::class);
    }
}
