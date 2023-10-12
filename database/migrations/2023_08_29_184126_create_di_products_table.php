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
        Schema::create('distribution_in_products', function (Blueprint $table) {
            $table->uuid('distribution_in_product_id')->primary();
            $table->uuid('distribution_in_id');
            $table->foreign('distribution_in_id')->references('distribution_in_id')->on('distribution_ins')->onDelete('cascade');


            $table->uuid('product_id');
            $table->foreign('product_id')->references('product_id')->on('products');


            $table->integer('pack_id')->default(1);
            $table->foreign('pack_id')->references('pack_id')->on('packs');

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
        Schema::dropIfExists('distribution_in_products');
    }
};
