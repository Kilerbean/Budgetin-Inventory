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
            $table->double('Quantity');
            $table->string('Quantity_unit');
            $table->string('packingsize');
            $table->string('packingsize_unit');
            $table->double('Prices');
            $table->double('Total');
            $table->string('Propose');
            $table->string('No_PO')->nullable();
            $table->date('PO_Date');
            $table->date('Expire_Date')->nullable();
            $table->integer('tipe_transaksi')->default(1);
            $table->boolean('Status')->default(0);
            $table->string('no_batch')->nullable();
            $table->string('request_by');
            $table->string('input_by');
            $table->string('reason')->nullable();
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
