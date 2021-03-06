@extends('layouts.app')

@section('page', 'Pemesanan')

@section('custom-css')
<style>
	.form-group label{
		font-size: 1.1rem;
	}
	.switch-wrap p {
		margin-bottom: 5px;
	}
	.form-alamat {
		display: none;
	}
	input[type=number]::-webkit-inner-spin-button, 
	input[type=number]::-webkit-outer-spin-button { 
		-webkit-appearance: none; 
		margin: 0; 
	}
	input[type=date]::-webkit-inner-spin-button, 
	input[type=date]::-webkit-outer-spin-button { 
		-webkit-appearance: none; 
		margin: 0; 
	}
</style>
@endsection

@section('content')
<section class="sample-text-area" style="padding-top: 50px;">
	<div class="container">
		<div class="section-top-border">
			<div class="row">
				<div class="col-lg-3 col-md-3"></div>
				<div class="col-lg-6 col-md-6">
					<div class="comment-form">
						<h3 class="mb-30">Form Pemesanan</h3>
						<form action="/pesan" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label for="namaProduk">Produk</label>
								<div class="row">
									<div class="col-md-6">
										<img src="/storage/{{$produk->gambar}}" style="width: 100%;margin: auto;display: block">
									</div>
									<div class="col-md-6">
										<label style="text-align: left;font-size: 0.8rem;display:block;">Nama</label>
										<input id="namaProduk" type="text" name="first_name" class="form-control" value="{{$produk->nama}}" disabled>
										<label style="text-align: left;font-size: 0.8rem;display:block;">Harga</label>
										<input id="hargaProduk" type="text" name="first_name" class="form-control" value="Rp. {{number_format($produk->harga,0)}}/pcs" disabled style="text-align: right;">
										<label style="text-align: left;font-size: 0.8rem;display:block;">Konfeksi</label>
										<input id="namaKonfeksi" type="text" name="first_name" class="form-control" value="{{$produk->konfeksi->user->nama}}" disabled>
										<label style="text-align: left;font-size: 0.8rem;display:block;">Kota</label>
										<input id="kotaKonfeksi" type="text" name="first_name" class="form-control" value="{{$produk->konfeksi->kota}}" disabled>
									</div>
								</div>
								<input type="hidden" name="produk_id" value="{{$produk->id}}">
								@if ($errors->has('produk_id'))
								<p style="color: red;">{{ $errors->first('produk_id') }}</p>
								@endif
							</div>
							<div class="form-group">		
								<label style="display: block;">File Desain Pakaian</label>			
								<input type="file" class="dropify" name="file_desain" />
								@if ($errors->has('file_desain'))
								<p style="color: red;">{{ $errors->first('file_desain') }}</p>
								@endif
							</div>
							<div class="form-group">
								<label for="inputNama">Jumlah Pakaian Setiap Ukuran</label>
								<div class="row">
									<div class="col-lg-3 col-md-3 mb-3">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">S</span>
											</div>
											<input type="number" class="form-control" placeholder="0" style="width: 1%; padding: 8px; text-align: right;" name="small">
										</div>
									</div>
									<div class="col-lg-3 col-md-3 mb-3">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">M</span>
											</div>
											<input type="number" class="form-control" placeholder="0" style="width: 1%; padding: 8px; text-align: right;" name="medium">
										</div>
									</div>
									<div class="col-lg-3 col-md-3 mb-3">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">L</span>
											</div>
											<input type="number" class="form-control" placeholder="0" style="width: 1%; padding: 8px; text-align: right;" name="large">
										</div>
									</div>
									<div class="col-lg-3 col-md-3 mb-3">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">XL</span>
											</div>
											<input type="number" class="form-control" placeholder="0" style="width: 1%; padding: 8px; text-align: right;" name="extra_large">
										</div>
									</div>
								</div>
								@if ($errors->has('jumlah'))
								<p style="color: red;">{{ $errors->first('jumlah') }}</p>
								@endif
							</div>
							<div class="form-group">
								<label for="inputcatatan">Catatan </label>
								<textarea id="inputcatatan" class="form-control" rows="4" name="catatan" placeholder="contoh:bahan pakaian, ukuran, dll."></textarea>
								@if ($errors->has('catatan'))
								<p style="color: red;">{{ $errors->first('catatan') }}</p>
								@endif
							</div>
							<!-- <div class="form-group">
								<p style="text-align: left;color: red;margin-bottom: 0">* Pesanan regular, tanggal selesai ditentukan konfeksi</p>
								<p style="text-align: left;color: red">* Pesanan express, pelanggan dapat menentukan tanggal selesai</p>
							</div>
							<div class="form-group">
								<div class="switch-wrap d-flex justify-content-between">
									<p>Paket ekspres</p>
									<div class="confirm-switch">
										<input type="checkbox" id="switch-express" name="is_express">
										<label for="switch-express"></label>
									</div>
								</div>
								<div class="form-express" style="display: none;">
									<label for="inputNama">Tenggat Waktu Pengerjaan</label>
									<input id="inputNama" type="date" class="form-control" name="tanggal_selesai">
									@if ($errors->has('tanggal_selesai'))
									<p style="color: red;">{{ $errors->first('tanggal_selesai') }}</p>
									@endif
								</div>
							</div> -->
							<div class="form-group">
								<div class="switch-wrap d-flex justify-content-between">
									<p>Barang diambil dilokasi konveksi</p>
									<div class="primary-switch">
										<input type="radio" id="switch-ambil" name="is_expedition" checked>
										<label for="switch-ambil"></label>
									</div>
								</div>
								<div class="switch-wrap d-flex justify-content-between">
									<p>Barang dikirim dengan ekspedisi</p>
									<div class="primary-switch">
										<input type="radio" id="switch-dikirim" name="is_expedition">
										<label for="switch-dikirim"></label>
									</div>
								</div>
								<div class="form-alamat">
									<label for="inputAlamat">Alamat Penerima Barang</label>
									<textarea id="inputAlamat" class="form-control" rows="4" name="alamat"></textarea>
									<label for="inputKota">Kota/Kabupaten</label>
									<select id="inputKota" class="form-control js-example-basic-single" name="kota" style="display: block;width: 100%;">
										@foreach($kotas as $kota)
										<option value="{{$kota['city_id']}}">{{$kota['type'] .' ' .$kota['city_name']}}</option>
										@endforeach
									</select>
									<label for="inputKurir">Jenis Pengiriman</label>
									<select id="inputKurir" class="form-control" name="kurir" style="display: block;width: 100%;">
									</select>
								</div>
							</div>
							<button type="submit" class="genric-btn primary circle mt-4">Pesan</button>
						</form>
					</div>
				</div>
				<div class="col-lg-3 col-md-3"></div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('custom-js')
<script src="{{ asset('assets/js/shared/formpickers.js') }}"></script>
<script src="{{ asset('assets/js/shared/select2.js') }}"></script>
<script src="{{ asset('assets/js/shared/dropify.js') }}"></script>
<script>
	$("input[type='radio'][name='is_expedition']").change(function(){
		if ($(this).attr('id') == 'switch-ambil' && $(this).is(':checked')) {
			$('.form-alamat').hide();
		}else{
			$('.form-alamat').show();
		}
	});
	$("input[type='checkbox'][name='is_express']").change(function(){
		if ($(this).attr('id') == 'switch-express' && $(this).is(':checked')) {
			$('.form-express').show();
		}else{
			$('.form-express').hide();
		}
	});
	$('select#inputKota').on('change', function(){
		kota = this.value;
		$('#inputKurir').empty();
		$.get('/kurir/{{$produk->konfeksi->kota_id}}/' + kota , function(data){
			for (var i = 0; i < data.length; i++) {
				var kurir = data[i].code;
				for (var j = 0; j < data[i].costs.length; j++) {
					var jenis = data[i].costs[j];
					$('select#inputKurir').append($('<option></option>').attr('value', kurir + ' ' + jenis.service).text(kurir.toUpperCase() + ' ' + jenis.service + ' est.' + jenis.cost[0].etd + ' hari Rp.' + jenis.cost[0].value));
				}
			}
		});
	});
</script>
@endsection