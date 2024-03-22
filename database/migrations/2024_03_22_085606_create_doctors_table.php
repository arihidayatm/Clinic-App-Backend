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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            //doctor name
            $table->string('doctor_name');
            //birthday
            $table->date('doctor_birthday');
            //doctor email
            $table->string('doctor_email')->unique();
            //doctor phone
            $table->string('doctor_phone');
            //address
            $table->string('doctor_address');
            //sip
            $table->string('doctor_sip');
            //doctor speciality
            $table->string('doctor_specialist');
            //photo
            $table->string('doctor_photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
