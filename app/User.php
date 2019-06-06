<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'email', 'password', 'nomor_telepon', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hasRole($role)
    {
        return strtolower($this->role) == $role;
    }

    public function isKonfeksi()
    {
        return $this->role == 'Konfeksi';
    }

    public function isAdmin()
    {
        return $this->role == 'Admin';
    }

    public function konfeksi()
    {
        return $this->hasOne(Konfeksi::class);
    }

    public function pesanans()
    {
        return $this->hasMany(Pesanan::class);
    }

    public function pesans()
    {
        return $this->hasMany(Pesan::class);
    }
}
