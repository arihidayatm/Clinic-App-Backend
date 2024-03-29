<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorScheduleController;

Route::get('/', function () {
    return view('pages.auth.login');
});

// Route::get('/login', function () {
//     return view('pages.auth.login');
// });

Route::middleware(['auth'])->group(function(){
    Route::get('home',function(){
        return  view('dashboard');
    })->name('home');

    Route::resource('users', UserController::class);

    //doctor
    Route::resource('doctors', DoctorController::class);
    //doctor-schedule
    Route::resource('doctor-schedules', DoctorScheduleController::class);
});
