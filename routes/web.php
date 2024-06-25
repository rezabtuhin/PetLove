<?php

use App\Livewire\Register;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('/', function (){
        return view('onboard');
    });

    Route::get('/login', Register::class)->name('login');
});

