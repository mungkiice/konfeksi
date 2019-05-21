@component('mail::message')
# Konfirmasi Pembayaran untuk Pesanan #{{ $pesanan->kode_pesanan }}

Pembayaran telah dilakukan oleh {{$pesanan->user->nama}}

@component('mail::button', ['url' => $url])
Buka Website
@endcomponent
@endcomponent