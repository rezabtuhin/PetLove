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

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function reviewsGiven(): HasMany
    {
        return $this->hasMany(Review::class, 'rated_by');
    }

    public function reviewsReceived(): HasMany
    {
        return $this->hasMany(Review::class, 'rated_to');
    }

    public function appointmentsMade(): HasMany
    {
        return $this->hasMany(Appointment::class, 'appointment_by');
    }

    /**
     * Get the appointments for the user (if the user is a clinic).
     */
    public function appointmentsReceived(): HasMany
    {
        return $this->hasMany(Appointment::class, 'appointment_in');
    }

    public function volunteerAsInstitution(): HasMany
    {
        return $this->hasMany(Volunteer::class, 'institution');
    }

    public function volunteerAsPerson(): HasMany
    {
        return $this->hasMany(Volunteer::class, 'person');
    }

    public function adoptionsListed(): HasMany
    {
        return $this->hasMany(Adoption::class, 'listed_by');
    }

    public function adoptions(): HasMany
    {
        return $this->hasMany(Adopt::class, 'user_id');
    }
}
