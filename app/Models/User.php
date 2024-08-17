<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    const ROLE_ADMIN = 'ADMIN';
    const ROLE_VENDOR = 'VENDOR';
    const ROLE_CLINIC = 'CLINIC';
    const ROLE_NGO = 'NGO';

    public function isAdmin(): bool
    {
        return \Auth::user()->role == self::ROLE_ADMIN;
    }

    public function isVendor(): bool
    {
        return \Auth::user()->role == self::ROLE_VENDOR;
    }


    public function isNgo(): bool
    {
        return \Auth::user()->role == self::ROLE_NGO;
    }

    public function isClinic(): bool
    {
        return \Auth::user()->role == self::ROLE_CLINIC;
    }
    protected $fillable = [
        'name',
        'email',
        'password',
        'oauth_id',
        'oauth_type',
        'avatar',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'oauth_id',
        'oauth_type'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function additionalInfo(): HasOne
    {
        return $this->hasOne(AdditionalInfo::class);
    }

    public function pet(): HasMany
    {
        return $this->hasMany(Pet::class);
    }

    public function item(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function missing(): HasMany
    {
        return $this->hasMany(Missing::class);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        $allowedRoles = ['ADMIN', 'VENDOR', 'CLINIC', 'NGO'];

        return in_array(\Auth::user()->role, $allowedRoles);
    }
}
