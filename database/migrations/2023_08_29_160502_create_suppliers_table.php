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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->uuid('supplier_id')->primary();
            $table->string('company_name');
            $table->string('agency_name');
            $table->string('account_number')->nullable();
            $table->string('tax_id')->default('');
            $table->string('phone', 20)->nullable(); // tambahan kolom phone
            $table->string('email', 50)->nullable(); // tambahan kolom email
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps(); // timestamps ditambahkan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
