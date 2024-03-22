<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    // $table->id();
    // //doctor name
    // $table->string('doctor_name');
    // //birthday
    // $table->date('doctor_birthday');
    // //doctor email
    // $table->string('doctor_email')->unique();
    // //doctor phone
    // $table->string('doctor_phone');
    // //address
    // $table->string('doctor_address');
    // //sip
    // $table->string('doctor_sip');
    // //doctor speciality
    // $table->string('doctor_specialist');
    // //photo
    // $table->string('doctor_photo');

    protected $filable = [
        'doctor_name',
        'doctor_birthday',
        'doctor_email',
        'doctor_phone',
        'doctor_address',
        'doctor_sip',
        'doctor_specialist',
        'doctor_photo',
    ];
}
