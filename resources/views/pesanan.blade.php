@extends('layouts.app')

@section('page', 'Pesanan Saya')

@section('custom-css')
<style>
	td a.custom-btn{
		height: 40px;
		padding: 0px 10px;
		line-height: 38px;
		text-transform: uppercase;
		border-radius: 0;
		font-size: 10px;
		width: 100%;
		padding-bottom: 10px;
	}
</style>
@endsection

@section('content')
<section class="cart_area">
	<div class="container">
		<div class="cart_inner">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Kode Pesanan</th>
							<th scope="col">Produk</th>
							<th scope="col">Tanggal Selesai</th>
							<th scope="col">Status</th>
							<th scope="col">Tindakan</th>
						</tr>
					</thead>
					<tbody>
						@foreach($pesanans as $pesanan)
						<tr>
							<td>{{ $pesanan->kode_pesanan }}</td>
							<td>
								<div class="media">
									<img src="/storage/{{$pesanan->produk->gambar}}" style="max-width: 200px; height: auto" alt="">
									<div class="media-body">
										<p>{{$pesanan->produk->nama}}</p>
									</div>
								</div>
							</td>
							<td>
								@if($pesanan->tenggat_waktu)
								<h5>{{date('d M Y', strtotime($pesanan->tenggat_waktu))}}</h5>
								@endif
							</td>
							<td>
								@foreach($pesanan->statusPesanans()->latest()->get() as $status)
								- {{ $status->keterangan }} <br>
								@endforeach
							</td>
							<td style="width: 200px;">
								@if(optional($pesanan->penawaran)->status == 'terkirim')
								<a href="/penawaran/{{ $pesanan->kode_pesanan }}" class="primary-btn custom-btn">Lihat Penawaran</a>
								@endif
								@if(optional($pesanan->penawaran)->status == 'diterima')
								<a href="/pembayaran/{{ $pesanan->id }}" class="gray_btn custom-btn">Konfirmasi Pembayaran</a>
								@endif								
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
@endsection