@props(['user'])

@php
    $user_avatar = '';

    if ($user->oauth_type) {
        $user_avatar = '<img class="w-10 h-10 rounded-full" src="'.$user->avatar.'" alt="user photo">';
    } else {
        if ($user->avatar) {
            $user_avatar = '<img class="w-10 h-10 rounded-full" src="'.$user->avatar.'" alt="user photo">';
        } else {
            $user_avatar = '
            <div class="bg-gray-400 w-10 h-10 rounded-full flex items-center justify-center">
                <p class="text-lg font-black ">' . $user->name[0] . '</p>
            </div>
            ';
        }
    }
@endphp

{!! $user_avatar !!}
