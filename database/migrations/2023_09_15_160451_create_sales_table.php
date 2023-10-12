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
        Schema::create('sales', function (Blueprint $table) {
            $table->uuid('sale_id')->primary();
            $table->string('sale_number', 100);

            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users'); // Pastikan Anda memiliki tabel users
            $table->uuid('branch_id');
            $table->foreign('branch_id')->references('branch_id')->on('branches');

            $table->integer('status')->default(0);
            $table->boolean('is_print')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
