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
        Schema::table('calibrations', function (Blueprint $table) {
            $table->date('jadwalkalibrasi')->nullable();
            $table->string('reason_overdue')->nullable();

        });
    }




    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 
    }
};
