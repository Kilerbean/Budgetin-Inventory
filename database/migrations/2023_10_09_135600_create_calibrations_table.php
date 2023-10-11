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
        Schema::create('calibrations', function (Blueprint $table) {
            $table->id();
            $table->string('instrumentid');
            $table->string('serialnumber');
            $table->string('instrumentname');
            $table->string('frekuensicalibration');
            $table->boolean('needcalibration');
            $table->date('lastcalibration');
            $table->date('nextcalibration');
            $table->string('calibrationby');
            $table->integer('yearofinvestment');
            $table->string('location');
            $table->string('serviceby')->nullable();
            $table->string('requestor')->nullable();
            $table->date('breakdowndate')->nullable();
            $table->date('startbreakdown')->nullable();
            $table->date('dateofcreate')->nullable();
            $table->string('problem')->nullable();
            $table->boolean('Status')->nullable();
            $table->date('startservicedate')->nullable();
            $table->date('finishservice')->nullable();
            $table->string('rootcause')->nullable();
            $table->string('preventiveaction')->nullable();
            $table->boolean('changepart')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calibrations');
    }
};
