@component('mail::message')
# Verifikasi Akun Konfeksi

@component('mail::panel')
Selamat {{$konfeksi->user->nama}}, Anda telah resmi terdaftar sebagai penyedia jasa konfeksi pada Marketplace Konfeksi
@endcomponent

@component('mail::button', ['url' => $url])
Buka Aplikasi
@endcomponent
@endcomponent