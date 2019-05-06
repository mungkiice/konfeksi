@component('mail::message')
# Konfirmasi Pembayaran untuk Pesanan #{{ $konfirmasiPembayaran->pesanan->kode_pesanan }}

@component('mail::button', ['url' => $url])
Buka Aplikasi
@endcomponent
@endcomponent