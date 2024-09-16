<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_by',
        'appointment_in',
        'appointment_date',
    ];

    // Relationships
    public function userWhoMadeAppointment(): BelongsTo
    {
        return $this->belongsTo(User::class, 'appointment_by');
    }

    public function clinic(): BelongsTo
    {
        return $this->belongsTo(User::class, 'appointment_in');
    }
}
