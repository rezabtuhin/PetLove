<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Volunteer extends Model
{
    use HasFactory;
    protected $fillable = ['institution', 'person'];

    public function institution(): BelongsTo
    {
        return $this->belongsTo(User::class, 'institution');
    }

    public function person(): BelongsTo
    {
        return $this->belongsTo(User::class, 'person');
    }
}
