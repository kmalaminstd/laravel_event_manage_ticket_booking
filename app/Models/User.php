<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function socialAccounts(){
        return $this->hasMany(SocialAccount::class);
    }

    public function event(){
        return $this->hasMany(Event::class);
    }

    public function media(){
        return $this->belongsTo(Media::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }

    public function ticket(){
        return $this->hasMany(Ticket::class);
    }

    public function isAdmin(){
        return $this->role === "admin";
    }

    public function isOrganizer(){
        return $this->role === "organizer";
    }

    public function isUser(){
        return $this->role === "user";
    }

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
}
