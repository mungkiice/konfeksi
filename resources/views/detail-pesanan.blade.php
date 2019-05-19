@extends('admin.layouts.app')

@section('content')
<div class="row">
	<div class="col-md-6 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Pesanan <span style="color: blue">#{{$pesanan->kode_pesanan}}</span></h4>
				<div class="form-group row">
					<label class="col-form-label col-sm-5">Produk</label>
					<div class="col-sm-7">
						<input class="form-control" type="text" value="{{$pesanan->produk->nama}}" disabled>
					</div>
				</div>
				<div class="form-group row">
					<label for="namaInput" class="col-sm-5 col-form-label">Tenggat Waktu</label>
					<div class="col-sm-7">							
						<input type="text" class="form-control" value="{{date('d M Y', strtotime($pesanan->tenggat_waktu))}}" disabled>
					</div>
				</div>
				<div class="form-group row">
					<label for="namaInput" class="col-sm-5 col-form-label">Biaya</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="namaINput" name="biaya" style="text-align: right;" value="Rp. {{number_format($pesanan->biaya, 0)}}" disabled>
					</div>
				</div>
				<div class="form-group row">
					<label for="deskripsiInput" class="col-form-label col-sm-5">Deskripsi</label>
					<div class="col-sm-7">						
						<textarea class="form-control" id="deskripsiInput" rows="4" name="deskripsi" disabled>{{$pesanan->deskripsi}}</textarea>
					</div> 
				</div>
				<div class="form-group row">
					<label class="col-form-label col-sm-5">Jumlah</label>
					<div class="col-sm-7">
						<textarea class="form-control" rows="8" disabled>
							@foreach(json_decode($pesanan->jumlah) as $key => $value)
							{{$key .'  :  '. $value}}
							@endforeach
						</textarea>
					</div>					
				</div>
				<div class="form-group">		
					<label style="display: block;">Gambar Desain</label>	
					<img class="img-fluid" src="/storage/{{$pesanan->file_desain}}" style="width: 50%; margin: auto;display: block;">		
				</div>
				<div class="form-group">
					<label>Keterangan : {{$pesanan->alamat ? 'Barang dikirim' : 'Barang diambil'}}</label>
				</div>
				@if($pesanan->alamat)
				<div class="form-group row">
					<label class="col-form-label col-sm-5">Alamat Penerima</label>
					<div class="col-sm-7">						
						<input type="text" class="form-control" disabled value="{{$pesanan->alamat}}">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-form-label col-sm-5">Jenis Pengiriman</label>
					<div class="col-sm-7">						
						<input type="text" class="form-control" disabled value="{{$pesanan->kurir}}">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-form-label col-sm-5">Nomor Resi</label>
					<div class="col-sm-7">						
						<input type="text" class="form-control" disabled value="{{$pesanan->nomor_resi}}">
					</div>
				</div>
				@endif
				<a href="/konfeksi/pesanan" class="btn btn-secondary">Kembali</a>
			</div>
		</div>
	</div>
	<div class="col-md-6 grid-margin">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Data Pemesan</h4>
				<div class="form-group row">
					<label class="col-form-label col-sm-5">Nama</label>
					<div class="col-sm-7">
						<input class="form-control" type="text" value="{{$pesanan->user->nama}}" disabled>
					</div>					
				</div>
				<div class="form-group row">
					<label class="col-form-label col-sm-5">Email</label>
					<div class="col-sm-7">
						<input class="form-control" type="text" value="{{$pesanan->user->email}}" disabled>
					</div>					
				</div>
				<div class="form-group row">
					<label class="col-form-label col-sm-5">Nomor Telepon</label>
					<div class="col-sm-7">
						<input class="form-control" type="text" value="{{$pesanan->user->nomor_telepon}}" disabled>
					</div>					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('custom-js')
<!-- <script src="{{ asset('assets/js/shared/file-upload.js') }}"></script> -->
<script src="{{ asset('assets/js/shared/iCheck.js') }}"></script>
<script src="{{ asset('assets/js/shared/typeahead.js') }}"></script>
<script src="{{ asset('assets/js/shared/select2.js') }}"></script>
<script src="{{ asset('assets/js/shared/formpickers.js') }}"></script>
@endsection