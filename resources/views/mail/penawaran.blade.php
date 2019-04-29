@component('mail::message')
# Penawaran dari {{ $penawaran->pesanan->produk->konfeksi->user->nama }}

@component('mail::button', ['url' => $url])
Lihat penawaran
@endcomponent
@endcomponent