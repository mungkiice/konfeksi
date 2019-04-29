@component('mail::message')
# Progres pesanan #{{ $statusPesanan->pesanan->kode_pesanan }}

@component('mail::panel')
{{ $statusPesanan->keterangan }}
@endcomponent
@endcomponent