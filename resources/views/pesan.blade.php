@extends('layouts.app')

@section('page', 'Pemesanan')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.addons.css') }}">
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
						<h4>Leave a Reply</h4>
						<form action="#">
							<div class="form-group">
								<label for="inputNama">Produk</label>
								<input id="inputNama" type="text" name="first_name" class="form-control" value="{{$produk->nama}}" disabled>
								<input type="hidden" name="produk_id" value="{{$produk->id}}">
							</div>
							<div class="form-group">		
								<label style="display: block;">Gambar Visual Kain</label>			
								<input type="file" class="dropify" name="gambar" />
								@if ($errors->has('gambar'))
								<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('image') }}</label>
								@endif
							</div>
							<div class="form-group">
								<label for="inputNama">Jumlah Pakaian           </label>
								<input id="inputNama" type="text" name="first_name" class="form-control">
							</div>
							<div class="form-group">
								<label for="inputDeskripsi">Deskripsi Pesanan</label>
								<textarea id="inputDeskripsi" class="form-control" rows="4"></textarea>
							</div>
							<div class="form-group">
								<label for="inputNama">Tenggat Waktu Pengerjaan</label>
								<input id="inputNama" type="date" name="first_name" class="form-control">
							</div>
							<div class="form-group">
								<!-- <label for="confirm-switch mb-3" style="font-size: 1.1rem;">Pengambilan Barang</label> -->
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
							</div>
							<div class="form-group form-alamat">
								<label for="inputDeskripsi">Alamat Penerima Barang</label>
								<textarea id="inputDeskripsi" class="form-control" rows="4" name="alamat"></textarea>
							</div>
							<button type="submit" class="genric-btn primary circle mt-4" style="float: right;">Kirim</button>
						</form>
					</div>
					<h3 class="mb-30">Form Pemesanan</h3>

				</div>
				<div class="col-lg-3 col-md-3"></div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('custom-js')
<script src="{{ asset('assets/vendors/js/vendor.bundle.addons.js') }}"></script>
<script src="{{ asset('assets/js/shared/dropify.js') }}"></script>
<script>

	$("input[type='radio']").change(function(){
		if ($(this).attr('id') == 'switch-ambil' && $(this).is(':checked')) {
			$('.form-alamat').hide();
		}else{
			$('.form-alamat').show();
		}
	});
</script>
@endsection