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
        Schema::create('audits', function (Blueprint $table) {
            $table->id();
            $table->string('change_by');
            $table->string('activity');
            $table->string('recordid');
            $table->string('sourcetable');
            $table->string('sourcefield');
            $table->longText('beforevalue');
            $table->longText('aftervalue');
            $table->timestamps();
        });
    }

    // 'created_at'=>now(),
    // 'change_by'=>$change_by,
    // 'activity'=>$activity,
    // 'recordid' => $recordid,
    // 'sourcetable' => $table,
    // 'sourcefield' => $field,
    // 'beforevalue' => $before,
    // 'aftervalue' => $after,

    /**
     * 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audits');
    }
};
