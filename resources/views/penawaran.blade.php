@extends('layouts.app')

@section('page', 'Penawaran')

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
<link rel="stylesheet" type="text/css" href="/css/custom-chat.css">
@endsection

@section('content')
<section class="sample-text-area" style="padding-top: 50px;">
	<div class="container">
		<div class="section-top-border">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="comment-form">
						<h3 style="padding-bottom: 20px;">Penawaran untuk Pesanan #{{ $pesanan->kode_pesanan }}</h3>
<!-- 						<div class="form-group">
							<label for="namaProduk">Produk</label>
							<div class="row">
								<div class="col-md-6">
									<img src="/storage/{{$pesanan->produk->gambar}}" style="width: 100%;margin: auto;display: block">
								</div>
								<div class="col-md-6">
									<label style="text-align: left;font-size: 0.8rem;display:block;">Nama</label>
									<input id="namaProduk" type="text" name="first_name" class="form-control" value="{{$pesanan->produk->nama}}" disabled>
									<label style="text-align: left;font-size: 0.8rem;display:block;">Harga</label>
									<input id="hargaProduk" type="text" name="first_name" class="form-control" value="Rp. {{number_format($pesanan->produk->harga,0)}}/pcs" disabled style="text-align: right;">
									<label style="text-align: left;font-size: 0.8rem;display:block;">Konfeksi</label>
									<input id="namaKonfeksi" type="text" name="first_name" class="form-control" value="{{$pesanan->produk->konfeksi->user->nama}}" disabled>
									<label style="text-align: left;font-size: 0.8rem;display:block;">Kota</label>
									<input id="kotaKonfeksi" type="text" name="first_name" class="form-control" value="{{$pesanan->produk->konfeksi->kota}}" disabled>
								</div>
							</div>
						</div> -->
						<div class="list-penawaran container" style="height:585px;overflow: hidden auto;">
							@foreach($penawarans as $key => $penawaran)
							<div class="row" style="border: 5px solid white;padding: 10px;margin-bottom: 10px;">
								<div class="col-md-12 col-lg-12">
									<h4 style="margin-bottom: 10px;">{{date('d M Y', strtotime($penawaran->created_at))}}</h4>
								</div>
								<div class="col-md-6 col-lg-6" style="background: url('/storage/{{$penawaran->gambar ?: $penawaran->pesanan->file_desain}}') center no-repeat;background-size: contain;">
								</div>
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
										<label for="inputNama">Tanggal Selesai</label>
										<input id="inputNama" type="text" name="first_name" class="form-control" value="{{ date('d M Y', strtotime($penawaran->tanggal_selesai)) }}">
									</div>
									<div class="form-group">
										<label for="inputNama">Biaya Tambahan</label>
										<input id="inputNama" type="text" name="first_name" class="form-control" value="Rp. {{ number_format($penawaran->biaya,0) }}">
									</div>
									<div class="form-group">
										<label for="inputcatatan">Catatan</label>
										<textarea id="inputcatatan" class="form-control" rows="4" name="catatan">{{ $penawaran->catatan }}</textarea>
									</div>
								</div>
								<div class="col-md-12 col-lg-12">
									@if($penawaran->status == 'terkirim' && $key == $penawarans->keys()->first())
									<form style="display: inline-block;" onsubmit="return submitForm('{{$penawaran->id}}', 'diterima')">
										@csrf
										<button class="genric-btn primary circle ">Setuju</button>
									</form>
									<form style="display: inline-block;" onsubmit="return submitForm('{{$penawaran->id}}', 'ditolak')">
										@csrf
										<button type="submit" class="genric-btn gray_btn circle ">Tolak</button>
									</form>
									@elseif($penawaran->status == 'diterima' && $key == $penawarans->keys()->first())
									<button class="genric-btn success circle ">Telah Diterima</button>
									@elseif($penawaran->status == 'ditolak' && $key == $penawarans->keys()->first())
									<button class="genric-btn danger circle">Telah Ditolak</button>
									@endif
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-6">
					<div class="messaging">
						<div class="inbox_msg">
							<h3 class="text-center" style="background-color: #FAF9FF;padding: 20px;">Diskusi</h3>
							<div class="mesgs">
								<div class="msg_history">
									<div class="incoming_msg">
										<div class="incoming_msg_img"> 
											<img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
										</div>
										<div class="received_msg">
											<div class="received_withd_msg">
												<p>Test which is a new approach to have all
												solutions</p>
												<span class="time_date"> 11:01 AM    |    June 9</span>
											</div>
										</div>
										<div class="outgoing_msg">
											<div class="sent_msg">
												<p>Test which is a new approach to have all
												solutions</p>
												<span class="time_date"> 11:01 AM    |    June 9</span> 
											</div>
										</div>
										<div class="incoming_msg">
											<div class="incoming_msg_img"> 
												<img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
											</div>
											<div class="received_msg">
												<div class="received_withd_msg">
													<p>Test, which is a new approach to have</p>
													<span class="time_date"> 11:01 AM    |    Yesterday</span>
												</div>
											</div>
										</div>
										<div class="outgoing_msg">
											<div class="sent_msg">
												<p>Apollo University, Delhi, India Test</p>
												<span class="time_date"> 11:01 AM    |    Today</span> 
											</div>
										</div>
										<div class="incoming_msg">
											<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
											<div class="received_msg">
												<div class="received_withd_msg">
													<p>We work directly with our designers and suppliers,
														and sell direct to you, which means quality, exclusive
													products, at a price anyone can afford.</p>
													<span class="time_date"> 11:01 AM    |    Today</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="type_msg">
									<div class="input_msg_write">
										<button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
										<input type="text" class="write_msg" placeholder="Type a message" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('custom-js')
<script src="{{ !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
<script>
	function submitForm(penawaranId, status) {
        // Kirim request ajax
        $.post("/penawaran/"+penawaranId+'/konfirmasi',
        {
        	_method: 'POST',
        	_token: '{{ csrf_token() }}',
        	status: status
        },
        function (data, status) {
        	if (data.snap_token != null) {
        		snap.pay(data.snap_token, {
        			onSuccess: function (result) {
        				showSwal('flash', 'Penawaran berhasil disetujui');
        				// $.post('/notification/handler', {result}, function(data){
        				// 	showSwal('flash', 'Penawaran berhasil disetujui');
        				// });
        				// console.log(result);
        				setTimeOut(function(){
        					window.location.reload();
        				}, 2000);
        			},
        			onPending: function (result) {
        				showSwal('flash', 'Penawaran berhasil disetujui');
        				// console.log(result);
        				setTimeOut(function(){
        					window.location.reload();
        				}, 2000);
        			},
        			onError: function (result) {
        				showSwal('confirmation', 'Transaksi error');
        				// console.log(result);
        				setTimeOut(function(){
        					window.location.reload();
        				}, 2000);
        			}
        		});
        	}else{
        		showSwal('flash', 'Penawaran berhasil ditolak');
        		setTimeOut(function(){
        			window.location.reload();
        		}, 2000);
        	}
        });
        return false;
    }
</script>
@endsection