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
@endsection

@section('content')
<section class="sample-text-area" style="padding-top: 50px;">
	<div class="container">
		<div class="section-top-border">
			<div class="row">
				<div class="col-lg-3 col-md-3"></div>
				<div class="col-lg-6 col-md-6">
					<div class="comment-form">
						<h3 class="mb-30">Penawaran untuk #{{ $penawaran->pesanan->kode_pesanan }}</h3>
						<div class="form-group">
							<label for="inputNama">Produk</label>
							<input id="inputNama" type="text" name="first_name" class="form-control" value="{{ $penawaran->pesanan->produk->nama }}">
						</div> 
						<div class="form-group">
							<label for="inputNama">Tanggal Selesai</label>
							<input id="inputNama" type="text" name="first_name" class="form-control" value="{{ date('d M Y', strtotime($penawaran->tenggat_waktu)) }}">
						</div>
						<div class="form-group">
							<label for="inputNama">Biaya</label>
							<input id="inputNama" type="text" name="first_name" class="form-control" value="Rp. {{ number_format($penawaran->biaya,0) }}">
						</div>
						<div class="form-group">
							<label for="inputDeskripsi">Deskripsi</label>
							<textarea id="inputDeskripsi" class="form-control" rows="4" name="deskripsi">{{ $penawaran->deskripsi }}</textarea>
						</div>
						<form co method="POST" action="/penawaran/{{$penawaran->id}}/terima" style="display: inline-block;">
							@csrf
							<button type="submit" class="genric-btn primary circle mt-4">Terima</button>
						</form>
						<form method="POST" action="/penawaran/{{$penawaran->id}}/tolak" style="display: inline-block;">
							@csrf
							<button type="submit" class="genric-btn gray_btn circle mt-4">Tolak</button>
						</form>
					</div>
				</div>
				<div class="col-lg-3 col-md-3"></div>
			</div>
		</div>
	</div>
</section>
@endsection