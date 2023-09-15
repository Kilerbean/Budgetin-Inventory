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
        Schema::create('opnames', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->double('accuracy');
            $table->longText('data')->nullable();
            $table->timestamp('end_at');
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opnames');
    }
};
