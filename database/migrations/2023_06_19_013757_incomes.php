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
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->string('No_PR');
            $table->string('Catalog_Number');
            $table->string('Type_of_Material');
            $table->string('Name_of_Material');
            $table->bigInteger('Quantity');
            $table->string('Unit');
            $table->bigInteger('Prices');
            $table->bigInteger('Total');
            $table->string('Propose');
            $table->string('No_PO');
            $table->date('PO_Date');
            $table->date('Expire_Date');
            $table->integer('tipe_transaksi')->nullable();
            $table->boolean('Status')->default('false');
            $table->string('no_batch');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
