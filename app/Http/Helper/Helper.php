<?php

namespace App\Http\Helper;

use Auth;

class Helper
{
    public static function getImage(): string
    {
        $classNames = 'w-10 h-10 rounded-full';
        if (Auth::user()->oauth_type || Auth::user()->avatar){
            return '
                <img class="'.$classNames.'" src="'.asset(Auth::user()->avatar).'" alt="user photo"/>';
        }
        else{
            return '
            <div class="'.$classNames.' bg-gray-600 flex items-center justify-center">
                <p class="text-lg font-black ">'.Auth::user()->name[0].'</p>
            </div>
            ';
        }
    }

}
