<?php

namespace App;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable, CanResetPassword;
    protected $fillable = [
        'nama', 'email', 'password', 'nomor_telepon', 'role'
    ];
    protected $hidden = [
        'password', 
    ];
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

    // verified
    public static function buatPelanggan($nama, $email, $password, $nomorTelepon)
    {
        $user = static::query()->create([
            'nama' => $nama,
            'email' => $email,
            'password' => Hash::make($password),
            'nomor_telepon' => $nomorTelepon,
        ]);
        return $user;
    }

    // verified
    public static function buatKonfeksi($nama, $email, $password, $nomorTelepon, $alamat, $kota, $deskripsi, $gambar)
    {   
        $user = static::query()->create([
            'nama' => $nama,
            'email' => $email,
            'password' => Hash::make($password),
            'nomor_telepon' => $nomorTelepon,
            'role' => 'Konfeksi'
        ]);
        Konfeksi::buat($user->id, $alamat, $kota, $deskripsi, $gambar);
        return $user;
    }

    // verified
    public function updatePassword($passwordBaru)
    {
        $this->update([
            'password' => bcrypt($passwordBaru)
        ]);
    }
}
