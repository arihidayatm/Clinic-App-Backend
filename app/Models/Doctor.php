<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

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
