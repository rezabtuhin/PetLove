<?php

namespace App\Livewire;

use App\Events\MessageSendEvent;
use App\Models\Chats\Conversation;
use App\Models\Chats\Message;
use App\Models\User;
use DateTime;
use Livewire\Attributes\On;
use Livewire\Component;

class Chat extends Component
{

    public $sender_id;
    public $receiver_id;

    public $message = "";

    public $conversation_id;

    public string $slug = "";

    public $messages = [];

    public $detailed_conversations = array();
    public function render()
    {
        return view('livewire.chat');
    }


    public $user = "";
    public function mount($slug)
    {

        $this->slug = $slug;

        $conversation = Conversation::where('slug', $slug)->firstOrFail();
        $this->conversation_id = $conversation->id;
        if ($conversation->user1_id === auth()->id()) {
            $this->user = User::findOrFail($conversation->user2_id);
        } else {
            $this->user = User::findOrFail($conversation->user1_id);
        }


        $this->sender_id = auth()->user()->id;
        $this->receiver_id = $this->user->id;

        $messages = Message::where('conversation_id', $this->conversation_id)->get();
        foreach ($messages as $message) {
            $this->appendChatMessages($message);
        }

        $this->loadConversations();
    }

    public function sendMessage()
    {

        $chatMessage = new Message();
        $chatMessage->conversation_id = $this->conversation_id;
        $chatMessage->sender_id = $this->sender_id;
        $chatMessage->receiver_id = $this->receiver_id;
        $chatMessage->content = $this->message;
        $chatMessage->save();
        $this->appendChatMessages($chatMessage);
        broadcast(new MessageSendEvent($chatMessage))->toOthers();

        $this->message = "";
    }


    #[On('echo-private:chat-channel.{sender_id},MessageSendEvent')]
    public function listenForMessage($event)
    {
        $chatMessage = Message::whereId($event['message']['id'])->first();
        $this->appendChatMessages($chatMessage);
    }
    /**
     * @throws \Exception
     */
    public function appendChatMessages($message)
    {
        $date = new DateTime($message->created_at);
        $sent_at = $date->format('F j, Y, g:i a');

        $this->messages[] = [
            'id' => $message->id,
            'sender_id' => $message->sender_id,
            'receiver_id' => $message->receiver_id,
            'content' => $message->content,
            'sent_at' => $sent_at,
        ];
    }


    /**
     * @throws \Exception
     */
    public function loadConversations()
    {
        $userId = auth()->user()->id;

        $conversations = Conversation::where('user1_id', $userId)->orWhere('user2_id', $userId)->get();
        $dc = array();
        foreach ($conversations as $conversation) {
            $message = Message::select('messages.id as message_id', 'conversation_id', 'sender_id', 'receiver_id', 'content', 'is_read', 'messages.created_at as sent_at', 'slug')
                ->join('conversations as c', 'messages.conversation_id', '=', 'c.id')
                ->where('conversation_id', $conversation->id)
                ->orderBy('messages.created_at', 'DESC')
                ->limit(1)
                ->first();



            $dc[] = $message;
        }

        if (count($dc) > 1 && !empty($dc[1])){
            usort($dc, function($a, $b) {
                return strtotime($b->sent_at) - strtotime($a->sent_at);
            });
        }

        if ($dc[0]){
            foreach ($dc as $sm) {
                if (!empty($sm)){
                    $date = new DateTime($sm->sent_at);
                    $this->detailed_conversations[] = [
                        'm_id' => $sm->message_id,
                        'c_id' => $sm->conversation_id,
                        'user_id' => $sm->sender_id == $userId ? $sm->receiver_id : $sm->sender_id,
                        'content' => $sm->content,
                        'sent_at' => $date->format('F j, Y, g:i a'),
                        'slug' => $sm->slug,
                    ];
                }
            }
        }
    }
}
