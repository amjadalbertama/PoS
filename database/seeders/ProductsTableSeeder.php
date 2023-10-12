<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $json = File::get(database_path('seeders/product.json'));
        $data = json_decode($json, true);

        $categories = Category::pluck('category_id', 'category_name')->all();

        $faker = Factory::create();

        foreach ($data as $item) {
            $category_id = $categories[$item['category_name']] ?? null;
            $sku = $item['sku'];

            // Check if SKU already exists
            if (Product::where('sku', $sku)->exists()) {
                // Append 3-digit random number to SKU to make it unique
                $sku = $sku . Str::random(3);
                $is_active = false;
            } else {
                $is_active = true;
            }

            Product::firstOrCreate([
                'name' => $item['product_name'],
                'sku' => $sku, // Updated SKU
                'category_id' => $category_id,
                'barcode' => $faker->unique()->ean13,
                'description' => $faker->sentence,
                'default_unit_price' => $item['default_unit_price'] ?? 0,
                'default_purchase_price' => $item['default_purchase_price'] ?? 0,
                'pic_filename' => null,
                'pack_id' => 1,
                'is_active' => $is_active, // Updated is_active
                'default_is_ppn' => $item['default_is_ppn'],
            ]);
        }
    }
}
