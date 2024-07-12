<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Chats\Conversation;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('auth.all-chats');
    }

    public function conversation($slug)
    {
        return view('auth.all-chats', ['slug' => $slug]);
    }

    public function startChat($id)
    {
        $conversation = Conversation::where(function ($query) use ($id) {
            $query->where('user1_id', auth()->id())
                ->where('user2_id', $id);
        })->orWhere(function ($query) use ($id) {
            $query->where('user1_id', $id)
                ->where('user2_id', auth()->id());
        })->first();

        if (!$conversation) {
            $conversation = Conversation::create([
                'user1_id' => auth()->id(),
                'user2_id' => $id,
            ]);
        }
        return redirect()->route('conversation', ['slug' => $conversation->slug]);
    }

}
