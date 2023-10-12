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
        Schema::create('distribution_ins', function (Blueprint $table) {
            $table->uuid('distribution_in_id')->primary();
            $table->string('di_number', 100);

            $table->uuid('purchase_order_id')->nullable();
            $table->foreign('purchase_order_id')->references('purchase_order_id')->on('purchase_orders')->onDelete('cascade');

            $table->uuid('distribution_out_id')->nullable();
            $table->foreign('distribution_out_id')->references('distribution_out_id')->on('distribution_outs')->onDelete('cascade');

            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users'); // Pastikan Anda memiliki tabel users

            $table->uuid('branch_id');
            $table->foreign('branch_id')->references('branch_id')->on('branches');

            $table->boolean('type');
            $table->integer('status')->default(0);
            $table->boolean('is_print')->default(0);
            $table->timestamps();

            // Add any other foreign keys as needed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distribution_ins');
    }
};
