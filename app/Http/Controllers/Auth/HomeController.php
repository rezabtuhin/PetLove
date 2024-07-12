<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;

class HomeController extends Controller
{

    public function home()
    {

        $users = User::where("id", "!=", auth()->user()->id)->get();
//        dd($users);
        return view('auth.home', compact('users'));
    }
}
