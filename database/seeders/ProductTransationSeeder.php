<?php

namespace Database\Seeders;

use App\Http\Controllers\Api\DistributionOutController;
use App\Models\User;
use App\Models\Branch;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\PurchaseOrder;
use App\Models\DistributionIn;
use App\Models\GenerateNumber;
use App\Models\ProductHistory;
use App\Models\DistributionOut;
use App\Models\ProductQuantity;
use App\Models\ProductSupplier;
use Illuminate\Database\Seeder;
use App\Models\PurchaseOrderProduct;
use App\Models\DistributionInProduct;
use App\Models\DistributionOutProduct;
use Illuminate\Support\Facades\Factory; // Tambahkan ini
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class ProductTransationSeeder extends Seeder
{
    public function run()
    {
        // Pilih product_id yang sama untuk semua entitas
        $products = Product::all();
        $suppliers = Supplier::first();
        $branchM = Branch::where('type', 1)->first();
        $branch = Branch::where('type', 0)->first();
        $user = User::first();

        $date = date('dmy');
        $supplier_id = $suppliers->supplier_id;

        $date = date('dmy');
        $nextPurchaseOrderNumber = GenerateNumber::getNextNumber('PO');

        // Menyusun nomor pesanan
        $purchaseOrderNumber = 'PO/' . $supplier_id . '-' . $date . '/' . str_pad($nextPurchaseOrderNumber, 5, '0', STR_PAD_LEFT);

        // Simpan nomor pesanan ke dalam database
        GenerateNumber::updateOrCreate(
            ['category' => 'PO'],
            ['no' => $nextPurchaseOrderNumber]
        );

        $nextNumber = GenerateNumber::getNextNumber('DI');

        // Menyusun nomor pesanan
        $diNumber = 'DI/0-' . $date . '/' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

        // Simpan nomor pesanan ke dalam database
        GenerateNumber::updateOrCreate(
            ['category' => 'DI'],
            ['no' => $nextNumber]
        );

        // Buat purchase order
        $purchaseOrder = PurchaseOrder::create([
            'supplier_id' => $supplier_id,
            'user_id' => $user->id,
            'branch_id' => $branchM->branch_id,
            'po_number' => $purchaseOrderNumber,
            'note' => 'PO',
            'status' => 0,
        ]);

        $distributionIn = DistributionIn::create([
            'purchase_order_id' => $purchaseOrder->purchase_order_id,
            'user_id' => $user->id,
            'branch_id' => $branchM->branch_id,
            'di_number' => $diNumber,
            'type' => 0,
            'status' => 0,
        ]);

        // Buat purchase order products untuk setiap produk
        foreach ($products as $product) {
            $base = 100; // Kelipatan yang diinginkan (misalnya, 100)
            $minMultiple = 5; // Kelipatan minimum (misalnya, 1)
            $maxMultiple = 10; // Kelipatan maksimum (misalnya, 2)
            $randomMultiple = rand($minMultiple, $maxMultiple);
            $quantity = $base * $randomMultiple;


            PurchaseOrderProduct::create([
                'purchase_order_id' => $purchaseOrder->purchase_order_id,
                'product_id' => $product->product_id,
                'pack_id' => 1,
                'quantity' => $quantity,
                'purchase_price' => $product->default_purchase_price
            ]);

            // Buat di_product untuk setiap produk yang terkait dengan distribution_in yang sama
            DistributionInProduct::create([
                'distribution_in_id' => $distributionIn->distribution_in_id,
                'product_id' => $product->product_id,
                'pack_id' => 1,
                'quantity' => $quantity,
                'unit_price' => $product->default_unit_price,
                'purchase_price' => $product->default_purchase_price
            ]);

            ProductQuantity::updateOrCreate(
                [
                    'product_id' => $product->product_id,
                    'branch_id' => $branchM->branch_id,
                ],
                [
                    'quantity' => $quantity,
                    'unit_price' => $product->default_unit_price,
                    'purchase_price' => $product->default_purchase_price,
                ]
            );

            ProductSupplier::updateOrCreate(
                [
                    'product_id' => $product->product_id,
                    'supplier_id' => $supplier_id
                ],
                [
                    'purchase_price' => $product->default_purchase_price,
                ]
            );
        }

        $nextNumberDO = GenerateNumber::getNextNumber('DO');

        // Menyusun nomor pesanan
        $doNumber = 'DO/' . $date . '/' . str_pad($nextNumberDO, 5, '0', STR_PAD_LEFT);

        // Simpan nomor pesanan ke dalam database
        GenerateNumber::updateOrCreate(
            ['category' => 'DO'],
            ['no' => $nextNumberDO]
        );

        $distributionOut = DistributionOut::create([
            'user_id' => $user->id,
            'branch_id' => $branchM->branch_id,
            'do_number' => $doNumber
        ]);

        $nextNumber1 = GenerateNumber::getNextNumber('DI');

        // Menyusun nomor pesanan
        $diNumber1 = 'DI/1-' . $date . '/' . str_pad($nextNumber1, 5, '0', STR_PAD_LEFT);

        // Simpan nomor pesanan ke dalam database
        GenerateNumber::updateOrCreate(
            ['category' => 'DI'],
            ['no' => $nextNumber1]
        );

        $distributionIn2 = DistributionIn::create([
            'distribution_out_id' => $distributionOut->distribution_out_id,
            'user_id' => $user->id,
            'branch_id' => $branch->branch_id,
            'di_number' => $diNumber1,
            'type' => 1,
            'status' => 0,
        ]);


        foreach ($products as $product) {
            $base = 100; // Kelipatan yang diinginkan (misalnya, 100)
            $minMultiple = 1; // Kelipatan minimum (misalnya, 1)
            $maxMultiple = 5; // Kelipatan maksimum (misalnya, 2)
            $randomMultiple = rand($minMultiple, $maxMultiple);
            $newquantity = $base * $randomMultiple;

            DistributionOutProduct::create([
                'distribution_out_id' => $distributionOut->distribution_out_id,
                'product_id' => $product->product_id,
                'pack_id' => 1,
                'quantity' => $newquantity,
                'purchase_price' => $product->default_purchase_price
            ]);

            // Buat di_product untuk setiap produk yang terkait dengan distribution_in yang sama
            DistributionInProduct::create([
                'distribution_in_id' => $distributionIn2->distribution_in_id,
                'product_id' => $product->product_id,
                'pack_id' => 1,
                'quantity' => $newquantity,
                'unit_price' => $product->default_unit_price,
                'purchase_price' => $product->default_purchase_price
            ]);

            //minus quantity from warehouse
            ProductQuantity::where('branch_id', $branchM->branch_id)
            ->where('product_id', $product->product_id)
            ->decrement('quantity', $newquantity);

            //add quantity to cabang 1
            ProductQuantity::updateOrCreate(
                [
                    'product_id' => $product->product_id,
                    'branch_id' => $branch->branch_id,
                ],
                [
                    'quantity' => $newquantity,
                    'unit_price' => $product->default_unit_price,
                    'purchase_price' => $product->default_purchase_price,
                ]
            );

        }
    }
}
