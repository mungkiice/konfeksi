@component('mail::message')
# Pesanan baru dari {{ $pesanan->user->nama }}

@component('mail::button', ['url' => $url])
Lihat Pesanan
@endcomponent
@endcomponent