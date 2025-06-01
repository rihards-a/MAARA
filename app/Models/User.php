<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'lifetime_subscription',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'lifetime_subscription'
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
            'lifetime_subscription' => 'boolean',
        ];
    }

    public function HasLifetime() : bool 
    {
        return (bool) $this->lifetime_subscription;
    }

    public function HasGoogleAccount() : bool 
    {
        return (bool) $this->google_id != null;
    }
    
    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}
