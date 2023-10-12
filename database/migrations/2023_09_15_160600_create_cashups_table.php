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
        Schema::create('cashups', function (Blueprint $table) {
            $table->uuid('cashup_id')->primary();

            $table->uuid('branch_id');
            $table->foreign('branch_id')->references('branch_id')->on('branches');

            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users'); // Pastikan Anda memiliki tabel users

            $table->timestamp('open_date')->default(now());
            $table->timestamp('close_date')->nullable();
            $table->decimal('open_amount_cash', 15, 2);
            $table->decimal('transfer_amount_cash', 15, 2);
            $table->integer('note');
            $table->decimal('closed_amount_cash', 15, 2);
            $table->decimal('closed_amount_card', 15, 2);
            $table->decimal('closed_amount_check', 15, 2);
            $table->decimal('closed_amount_total', 15, 2);
            $table->string('description', 255);
            $table->integer('deleted')->default(0);
            $table->decimal('closed_amount_due', 15, 2);
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashups');
    }
};
