<?php

use App\Http\Controllers\Auth\ChatController;
use App\Http\Controllers\Auth\ClinicController;
use App\Http\Controllers\Auth\HomeController;
use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\MissingController;
use App\Http\Controllers\NgoController;
use App\Livewire\Login;
use App\Livewire\Register;
use App\Models\Cart;
use Illuminate\Support\Facades\Route;
use App\Models\User;


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
    Route::get('/profile', function (){ return view('auth.profile'); })->name('profile');
    Route::get('/logout', [SocialLoginController::class, 'logout'])->name('logout');
    Route::get('/chats', [ChatController::class, 'index'])->name('chats');
    Route::get('/chats/{slug}', [ChatController::class, 'conversation'])->name('conversation');
    Route::get("/start-chat/{id}", [ChatController::class, 'startChat'])->name('start-chat');
    Route::get('/missing', [MissingController::class, 'index'])->name('missing.pets');
    Route::post('/missing/create', [MissingController::class, 'create'])->name('missing.create');
    Route::get('/shop', function () { return view('auth.shop'); })->name('shop');
    Route::get('/cart', function () { return view('auth.cart'); })->name('cart');
    Route::get('/clinic', [ClinicController::class, 'index'])->name('clinic');
    Route::get('/clinic/{id}', [ClinicController::class, 'clinic']);
    Route::post('/clinic/{id}', [ClinicController::class, 'post']);
    Route::post('/clinic/appointment/{id}', [ClinicController::class, 'appointment']);
    Route::get('/ngo', [NgoController::class, 'index']);
    Route::get('/ngo/{id}', [NgoController::class, 'ngo']);
    Route::post('/ngo/{id}', [NgoController::class, 'create']);
    Route::get('/ngo/adoption/{id}', [NgoController::class, 'adoption']);
    Route::post('/ngo/adopt/{id}', [NgoController::class, 'adopt']);
    Route::get('/consultant', function () {
        $consultants = User::where('role', 'CONSULTANT')
            ->where('id', '!=', Auth::user()->id)
            ->get();
        return view('auth.consultant', compact('consultants'));
    });

    Route::get('/payment', function (){
        return view('auth.payment.payment');
    });

    Route::post('/otp', function (\Illuminate\Support\Facades\Request $request){
        return redirect('/otp');
    });

    Route::get('/otp', function(){
        return view('auth.payment.otp');
    });

    Route::post('/pin', function(){
        return redirect('/pin');
    });

    Route::get('/pin', function (){
        $items = Cart::with('item')->where(['user_id' => \Auth::user()->id])->where('is_paid', 0)->get();
        $total = 0; $sub_total = 0; $tax = 0;
        foreach ($items as $item){
            $sub_total += ($item->item->price * $item->amount);
        }
        $total = $sub_total - $tax;
        return view('auth.payment.pin', compact('total'));
    });

    Route::post('/paid', function (){
        Cart::where('user_id', \Illuminate\Support\Facades\Auth::user()->id)
            ->where('is_paid', 0)
            ->update(['is_paid' => 1]);

        return redirect('/shop')->with('great', 'Thanks for shopping with us');
    });
});
