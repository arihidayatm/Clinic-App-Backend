<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
});

