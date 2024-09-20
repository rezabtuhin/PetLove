<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Adopt extends Model
{
    use HasFactory;
    protected $fillable = ['adoption_id', 'user_id'];

    /**
     * Get the adoption associated with this adopt.
     *
     * @return BelongsTo
     */
    public function adoption(): BelongsTo
    {
        return $this->belongsTo(Adoption::class, 'adoption_id');
    }

    /**
     * Get the user who adopted.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
