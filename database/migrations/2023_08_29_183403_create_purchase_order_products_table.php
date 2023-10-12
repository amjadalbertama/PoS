<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('purchase_order_products', function (Blueprint $table) {
            $table->uuid('purchase_order_product_id')->primary();
            $table->integer('quantity')->default(0);
            $table->decimal('purchase_price', 15, 2)->nullable();
            $table->decimal('discount', 15, 2)->nullable();
            $table->tinyInteger('is_ppn')->default(0);

            $table->uuid('product_id');
            $table->foreign('product_id')->references('product_id')->on('products');

            $table->integer('pack_id')->default(1);
            $table->foreign('pack_id')->references('pack_id')->on('packs');

            $table->uuid('purchase_order_id');
            $table->foreign('purchase_order_id')->references('purchase_order_id')->on('purchase_orders');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order_products');
    }
};
