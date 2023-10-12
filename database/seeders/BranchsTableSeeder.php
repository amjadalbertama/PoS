<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BranchsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::firstOrCreate([
            'name' => 'warehouse',
            'type' => true,
        ]);

        Branch::firstOrCreate([
            'name' => 'cabang 1',
        ]);

	Branch::factory(30)->create();
    }
}
