<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Adoption extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'age',
        'description',
        'is_adopted',
        'listed_by',
    ];

    protected static function boot(): void
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::creating(function ($model){
            $model->listed_by = \Auth::user()->id;
        });
    }

    /**
     * Get the user who listed the adoption.
     *
     * @return BelongsTo
     */
    public function listedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'listed_by');
    }

    public function adopt(): HasOne
    {
        return $this->hasOne(Adopt::class, 'adoption_id');
    }
}
