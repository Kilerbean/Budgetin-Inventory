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
        Schema::create('usages', function (Blueprint $table) {
            $table->id();
            $table->string('Catalog_Number');
            $table->string('Type_of_Material');
            $table->string('Name_of_Material');
            $table->bigInteger('Quantity');
            $table->string('Unit');
            $table->string('Open_By');
            $table->date('Expire_Date');
            $table->boolean('Status')->default('false');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usages');
    }
};
