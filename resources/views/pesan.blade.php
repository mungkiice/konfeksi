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
								<label for="inputNama">Produk</label>
								<input id="inputNama" type="text" name="first_name" class="form-control" value="{{$produk->nama}}" disabled>
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
							</div>
							<div class="form-group">
								<label for="inputDeskripsi">Deskripsi Pesanan</label>
								<textarea id="inputDeskripsi" class="form-control" rows="4" name="deskripsi"></textarea>
								@if ($errors->has('deskripsi'))
								<p style="color: red;">{{ $errors->first('deskripsi') }}</p>
								@endif
							</div>
							<div class="form-group">
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
									<input id="inputNama" type="date" class="form-control" name="tenggat_waktu">
									@if ($errors->has('tenggat_waktu'))
									<p style="color: red;">{{ $errors->first('tenggat_waktu') }}</p>
									@endif
								</div>
							</div>
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
									<label for="inputDeskripsi">Alamat Penerima Barang</label>
									<textarea id="inputDeskripsi" class="form-control" rows="4" name="alamat"></textarea>
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
</script>
@endsection