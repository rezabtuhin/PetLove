<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rated_by',
        'rated_to',
        'rating',
        'comment',
    ];

    /**
     * Get the user who gave the review (rated_by).
     */
    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'rated_by');
    }

    /**
     * Get the clinic that the review is for (rated_to).
     */
    public function clinic(): BelongsTo
    {
        return $this->belongsTo(User::class, 'rated_to');
    }
}
