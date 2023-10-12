<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductDummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'code' => 'BA001',
            'name' => 'Natadecoco',
            'category' => 'Minuman',
            'unit' => 'bungkus',
            'price' => 15000,
            'stock' => 31,
        ]);

        Product::create([
            'code' => 'BA002',
            'name' => 'Mie Instan',
            'category' => 'Makanan Cepat Saji',
            'unit' => 'bungkus',
            'price' => 5000,
            'stock' => 11,
        ]);
    }
}
