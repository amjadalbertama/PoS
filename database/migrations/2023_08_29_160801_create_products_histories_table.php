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
        Schema::create('product_histories', function (Blueprint $table) {
            $table->uuid('product_history_id')->primary();
            $table->uuid('product_id');
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users'); // Pastikan Anda memiliki tabel users
            $table->text('note');
            $table->uuid('branch_id');
            $table->foreign('branch_id')->references('branch_id')->on('branches');
            $table->integer('quantity')->default(0);
            $table->timestamps(); // Menambah kolom timestamps
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_histories');
    }
};
