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
        Schema::create('product_quantities', function (Blueprint $table) {
            $table->uuid('product_id');
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->uuid('branch_id');
            $table->foreign('branch_id')->references('branch_id')->on('branches');
            $table->integer('quantity')->default(0);
            $table->decimal('purchase_price', 15, 2)->nullable();
            $table->decimal('unit_price', 15, 2)->nullable();
            $table->tinyInteger('is_ppn')->default(0);
            $table->primary(['product_id', 'branch_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_quantities');
    }
};
