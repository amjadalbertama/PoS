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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->uuid('purchase_order_id')->primary();
            $table->string('po_number', 100);
            $table->string('note', 100)->nullable();
            $table->integer('status')->default(0);
            $table->boolean('is_print')->default(0);
            $table->timestamps();
            $table->timestamp('arrival_time')->nullable();
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users'); // Pastikan Anda memiliki tabel users
            $table->uuid('branch_id');
            $table->foreign('branch_id')->references('branch_id')->on('branches');
            $table->uuid('supplier_id');
            $table->foreign('supplier_id')->references('supplier_id')->on('suppliers');
            // Add any other foreign keys as needed
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
