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
        Schema::create('auditcalibrations', function (Blueprint $table) {
            $table->id();
            $table->string('instrumentid');
            $table->string('instrumentname');
            $table->integer('tipe_data');
            $table->integer('frekuensicalibration')->nullable();
            $table->boolean('needcalibration')->nullable();
            $table->date('lastcalibration')->nullable();
            $table->date('nextcalibration')->nullable();
            $table->string('calibrationby')->nullable();
            $table->string('location')->nullable();
            $table->string('serviceby')->nullable();
            $table->string('requestor')->nullable();
            $table->date('breakdowndate')->nullable();
            $table->string('problem')->nullable();
            $table->boolean('Status')->nullable();
            $table->date('startservicedate')->nullable();
            $table->date('finishservice')->nullable();
            $table->string('rootcause')->nullable();
            $table->string('preventiveaction')->nullable();
            $table->boolean('changepart')->nullable();
            $table->string('nowo')->nullable();
            $table->string('reason_overdue')->nullable();
            $table->string('reason_breakdown')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auditcalibrations');
    }
};
