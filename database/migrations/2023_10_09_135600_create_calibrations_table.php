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
            $table->string('frekuensikalibrasi');
            $table->boolean('needcalibration');
            $table->date('lastcalibration');
            $table->date('nextcalibration');
            $table->string('calibrationby');
            $table->integer('yearofinvestment');
            $table->string('location');
            $table->string('serviceby');
            $table->string('requestor');
            $table->date('breakdowndate');
            $table->date('startbreakdown');
            $table->date('dateofcreate');
            $table->string('problem');
            $table->boolean('Status');
            $table->date('startservicedate');
            $table->date('finishservice');
            $table->string('rootcause');
            $table->string('preventiveaction');
            $table->boolean('changepart');
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
