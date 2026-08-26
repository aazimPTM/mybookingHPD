<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name', 'email',
        'phone', 'office_no', 'password',
        'is_super', 'is_admin', 'is_active',
        'description',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_super' => 'boolean',
            'is_admin' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function isSuper(): bool {
        return $this->is_super === true;
    }

    public function isAdmin(): bool {
        return $this->is_admin === true;
    }

    public function hasVerifiedEmail(): bool {
        if ($this->isAdmin() || $this->isSuper()) {
            return true;
        }
        return !is_null($this->email_verified_at);
    }

    public function bookings() {
        return $this->hasMany(Booking::class);
    }
}
