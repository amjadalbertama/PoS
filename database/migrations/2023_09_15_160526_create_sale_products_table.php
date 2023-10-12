<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sale_products', function (Blueprint $table) {
            $table->uuid('sale_product_id')->primary();

            $table->uuid('sale_id');
            $table->foreign('sale_id')->references('sale_id')->on('sales');

            $table->uuid('product_id');
            $table->foreign('product_id')->references('product_id')->on('products');

            $table->integer('quantity')->default(0);
            $table->decimal('purchase_price', 15, 2)->nullable();
            $table->decimal('unit_price', 15, 2)->nullable();
            $table->decimal('discount', 15, 2)->nullable();
            $table->tinyInteger('is_ppn')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_products');
    }
};
