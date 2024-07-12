<?php

namespace App\Models\Chats;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user1_id', 'user2_id', 'slug',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($conversation) {
            $conversation->slug = (string) Str::uuid();
        });
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function participants()
    {
        return $this->hasMany(ConversationParticipant::class);
    }

}
