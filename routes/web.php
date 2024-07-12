<?php

use App\Http\Controllers\Auth\ChatController;
use App\Http\Controllers\Auth\HomeController;
use App\Http\Controllers\Auth\SocialLoginController;
use App\Livewire\Login;
use App\Livewire\Register;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('/', function (){
        return view('onboard');
    });

    Route::get('/register', Register::class)->name('register');
    Route::get('/login', Login::class)->name('login');


    Route::prefix('auth')->group(function () {
        Route::get('{provider}/redirect', [SocialLoginController::class, 'redirect'])->name('auth.redirect');
        Route::get('{provider}/callback', [SocialLoginController::class, 'handleCallback'])->name('auth.callback');
    });

});


Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('/logout', [SocialLoginController::class, 'logout'])->name('logout');
    Route::get('/chats', [ChatController::class, 'index'])->name('chats');
    Route::get('/chats/{slug}', [ChatController::class, 'conversation'])->name('conversation');
    Route::get("/start-chat/{id}", [ChatController::class, 'startChat'])->name('start-chat');
});
