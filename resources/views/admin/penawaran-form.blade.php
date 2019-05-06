@extends('admin.layouts.app')

@section('content')
<div class="row">
	<div class="col-md-6 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Form Jenis Kain</h4>
				<form class="forms-sample" method="POST" accept="/admin/penawaran/create" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="namaInput">Tenggat Waktu</label>
						<div id="datepicker-popup" class="input-group date datepicker">
							<input type="text" class="form-control" name="tenggat_waktu">
							<span class="input-group-addon input-group-append border-left">
								<span class="mdi mdi-calendar input-group-text"></span>
							</span>
						</div>
						@if ($errors->has('tenggat_waktu'))
						<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('tenggat_waktu') }}</label>
						@endif
					</div>
					<div class="form-group">
						<label for="namaInput">Biaya</label>
						<input type="number" class="form-control" id="namaINput" name="biaya" style="text-align: right;"> 
						@if ($errors->has('biaya'))
						<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('biaya') }}</label>
						@endif
					</div>
					<div class="form-group">
						<label for="deskripsiInput">Deskripsi</label> 
						<textarea class="form-control" id="deskripsiInput" rows="4" name="deskripsi"></textarea> 
						@if ($errors->has('deskripsi'))
						<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('deskripsi') }}</label>
						@endif
					</div>
					<div class="form-group">		
						<label style="display: block;">Gambar Desain</label>			
						<input type="file" class="dropify" name="gambar" />
						@if ($errors->has('gambar'))
						<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('gambar') }}</label>
						@endif
					</div>
					<button type="submit" class="btn btn-success mr-2" style="float: right;">Kirim</button>
					<a href="/konfeksi/pesanan" class="btn btn-light">Cancel</a>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Data Pesanan #{{$pesanan->kode_pesanan}} - <span style="color: red">{{$pesanan->tenggat_waktu ? 'Ekspres' : 'Reguler'}}</span> - <span style="color: blue;">{{$pesanan->alamat ? 'Barang Dikirim' : 'Barang Diambil'}}</span></h4>
				<div class="form-group row">
					<label class="col-form-label col-sm-3">Pemesan</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="" value="{{$pesanan->user->nama}}" disabled>
					</div>					
				</div>
				<div class="form-group row">
					<label class="col-form-label col-sm-3">Produk</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="" value="{{$pesanan->produk->nama}}" disabled>
					</div>					
				</div>
				<div class="form-group row">
					<label class="col-form-label col-sm-3">Tenggat Waktu</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="" value="{{$pesanan->tenggat_waktu}}" disabled>
					</div>					
				</div>
				<div class="form-group row">
					<label class="col-form-label col-sm-3">Deskripsi</label>
					<div class="col-sm-9">
						<textarea class="form-control" rows="5" disabled>{{$pesanan->deskripsi}}</textarea>
					</div>					
				</div>
				<div class="form-group row">
					<label class="col-form-label col-sm-3">Jumlah</label>
					<div class="col-sm-9">
						<textarea class="form-control" rows="10" disabled>
							@foreach(json_decode($pesanan->jumlah) as $key => $value)
							{{$key .'  :  '. $value}}
							@endforeach
						</textarea>
					</div>					
				</div>
				<div class="form-group row">
					<label class="col-form-label col-sm-3">Alamat</label>
					<div class="col-sm-9">
						<textarea class="form-control" rows="2" disabled>{{$pesanan->alamat}}</textarea>
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
<script src="{{ asset('assets/js/shared/dropify.js') }}"></script>
<script src="{{ asset('assets/js/shared/formpickers.js') }}"></script>
@endsection