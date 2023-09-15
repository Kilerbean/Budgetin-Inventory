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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('Material_Code');
            $table->string('Type_of_Material');
            $table->string('Type_of_Budget');
            $table->string('Name_of_Material');
            $table->string('Catalog_Number');
            $table->string('Manfaktur');
            $table->double('Quantity');
            $table->string('Quantity_unit');
            $table->string('packingsize');
            $table->string('packingsize_unit');
            $table->double('Safety_Stock');
            $table->double('Maximum_Stock');
            $table->double('Harga');
            $table->boolean('Status')->default(1);

            $table->date('Expire_Date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
