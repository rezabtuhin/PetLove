<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdditionalInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'bio',
        'phone',
        'gender',
        'location',
        'preferred_pet_service',
        'pet_interest',
        'preferred_communication',
    ];

    protected $casts = [
        'preferred_pet_service' => 'array',
        'pet_interest' => 'array',
        'preferred_communication' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
