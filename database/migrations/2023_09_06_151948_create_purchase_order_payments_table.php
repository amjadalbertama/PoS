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
        Schema::create('purchase_order_payments', function (Blueprint $table) {
            $table->uuid('purchase_order_payment_id')->primary();

            $table->uuid('purchase_order_id');
            $table->foreign('purchase_order_id')->references('purchase_order_id')->on('purchase_orders')->onDelete('cascade');

            $table->string('payment_type', 40);
            $table->decimal('payment_amount', 15, 2);
            $table->decimal('cash_refund', 15, 2)->default(0.00);
            $table->timestamp('payment_time')->default(now());
            $table->string('reference_code', 40)->default('');
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order_payments');
    }
};
