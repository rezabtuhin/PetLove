<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'vendor_id',
        'name',
        'description',
        'price',
        'category',
        'image',
    ];

    protected static function boot(): void
    {
        parent::boot(); // TODO: Change the autogenerated stub
        static::creating(function ($model){
            if (empty($model->vendor_id)){
                $model->vendor_id = \Auth::user()->id;
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
