<?php

use Illuminate\Support\Facades\Route;

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
});
