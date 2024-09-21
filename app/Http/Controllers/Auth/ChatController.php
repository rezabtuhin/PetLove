<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Chats\Conversation;
use App\Models\Chats\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $conversation = Message::where(
            function ($query) use ($userId) {
                $query->where('sender_id', $userId)
                    ->orWhere('receiver_id', $userId);
            }
        )->orderBy('created_at', 'desc')
            ->first();

        if ($conversation){
            $slug = Conversation::where('id', $conversation->conversation_id)->pluck('slug');
            return view('auth.all-chats', compact('slug'));
        }
        return redirect()->back()->with('warning', "You do not have any conversation yet");
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
