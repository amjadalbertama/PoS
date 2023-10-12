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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('product_id')->primary();
            $table->string('sku')->unique();
            $table->string('name');
            $table->string('barcode')->nullable()->unique();
            $table->string('description')->nullable();
            $table->decimal('default_purchase_price', 15, 2)->nullable()->default(0);
            $table->decimal('default_unit_price', 15, 2)->nullable()->default(0);
            $table->string('pic_filename')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('default_is_ppn')->default(0);
            $table->integer('category_id')->nullable();
            $table->foreign('category_id')->references('category_id')->on('categories');
            $table->integer('pack_id')->nullable();
            $table->foreign('pack_id')->references('pack_id')->on('packs');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
