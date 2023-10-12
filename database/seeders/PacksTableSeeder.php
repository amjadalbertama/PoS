<?php

namespace Database\Seeders;

use App\Models\Pack;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PacksTableSeeder extends Seeder
{
    public function run()
    {
        Pack::firstOrCreate([
            'name' => 'Piece',
            'quantities_per_pack' => 1,
        ]);

        Pack::firstOrCreate([
            'name' => 'Dozen',
            'quantities_per_pack' => 12,
        ]);

        Pack::firstOrCreate([
            'name' => 'Box',
            'quantities_per_pack' => 24,
        ]);

    }
}
