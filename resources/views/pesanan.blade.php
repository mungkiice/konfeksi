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
						@foreach($pesanans as $key => $pesanan)
						<tr class="list-pesanan">
							<td class="kode-pesanan" id="kode-{{$key}}">{{ $pesanan->kode_pesanan }}</td>
							<td>
								<div class="media">
									<img src="/storage/{{$pesanan->produk->gambar}}" style="max-width: 200px; height: auto" alt="">
									<div class="media-body">
										<p>{{$pesanan->produk->nama}}</p>
									</div>
								</div>
							</td>
							<td>
								@if($pesanan->tanggal_selesai)
								<h5>{{date('d M Y', strtotime($pesanan->tanggal_selesai))}}</h5>
								@endif
							</td>
							<td id="status-pesanan-{{$key}}">
								@foreach($pesanan->statusPesanans as $status)
								- {{ ucwords($status->keterangan) }} <br>
								@endforeach
							</td>
							<td style="width: 200px;">
								<a href="/pesanansaya/{{$pesanan->kode_pesanan}}/cetak" class="gray_btn custom-btn">Cetak Bukti Pemesanan</a>
								<a href="/penawaran/{{ $pesanan->kode_pesanan }}" class="primary-btn custom-btn">Lihat Penawaran</a>
								<a href="#" onclick="return bayar('{{$pesanan->kode_pesanan}}')" class="gray_btn custom-btn">Pembayaran</a>
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

@section('custom-js')
<script src="{{ !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
<script>
	$(document).ready(function(){
		$('.kode-pesanan').each(function(){
			// $(this).hide();
			let id = $(this).attr('id').match(/\d+/)[0];
			console.log(id);
			$.get('/checkpoint/'+$(this).text(), function(data){
				for (var i = 0; i < data.length; i++) {
					$('#status-pesanan-'+id).append('- '+data[i].message+'<br>');
				}
			})
		});
	});
</script>
<script>
	function bayar(kodePesanan){
		$.get('/pembayaran/'+kodePesanan, function (data, status) {
            snap.pay(data.snap_token, {
                onSuccess: function (result) {
                	showSwal('flash', 'Transaksi berhasil');
                	setTimeOut(function(){
                		window.location.reload();
                	}, 2000);
                },
                onPending: function (result) {
                    showSwal('flash', 'Transaksi pending');
                	setTimeOut(function(){
                		window.location.reload();
                	}, 2000);
                },
                onError: function (result) {
                    showSwal('confirmation', 'Transaksi error');
                	setTimeOut(function(){
                		window.location.reload();
                	}, 2000);
                }
            });
        });
        return false;
	}
</script>
@endsection