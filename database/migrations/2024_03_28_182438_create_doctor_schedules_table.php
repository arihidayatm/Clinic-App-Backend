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
        Schema::create('doctor_schedules', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('doctor_id')->constrained();
            $table->foreignId('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            //day
            $table->string('day');
            //time
            $table->string('time');
            //status
            $table->string('status')->default('active');
            //note
            $table->string('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_schedules');
    }
};
