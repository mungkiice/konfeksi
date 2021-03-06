@extends('admin.layouts.app')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('assets/vendors/summernote/dist/summernote-bs4.css') }}">
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12 col-md-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Form Jenis Kain</h4>
				<form class="forms-sample" method="POST" action="/konfeksi/produk/{{$produk->id}}" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="form-group">		
						<label style="display: block;">Gambar Produk</label>	
						<img class="img-fluid mb-2" src="/storage/{{$produk->gambar}}" style="width: 25%;margin-left: 37%;"></img>	
						<input type="file" class="dropify" name="gambar" />
						@if ($errors->has('gambar'))
						<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('gambar') }}</label>
						@endif
					</div>
					<div class="form-group">
						<label for="namaInput">Nama Produk</label>
						<input type="text" class="form-control" id="namaINput" name="nama" value="{{$produk->nama}}"> 
						@if ($errors->has('nama'))
						<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('code') }}</label>
						@endif
					</div>
					<div class="form-group">
						<label for="hargaInput">Harga Produk per piece</label>
						<input type="number" class="form-control" name="harga" value="{{$produk->harga}}">
						@if ($errors->has('harga'))
						<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('harga') }}</label>
						@endif
					</div>
					<div class="form-group">
						<label for="deskripsiInput">Deskripsi Produk</label> 
						<textarea id="summernoteExample" name="deskripsi">{{$produk->deskripsi}}</textarea> 
						@if ($errors->has('deskripsi'))
						<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('deskripsi') }}</label>
						@endif
					</div>
					<button type="submit" class="btn btn-success mr-2" style="float: right;">Simpan</button>
					<button class="btn btn-light">Cancel</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('custom-js')
<script src="{{ asset('assets/js/shared/file-upload.js') }}"></script>
<script src="{{ asset('assets/js/shared/iCheck.js') }}"></script>
<script src="{{ asset('assets/js/shared/typeahead.js') }}"></script>
<script src="{{ asset('assets/js/shared/select2.js') }}"></script>
<script src="{{ asset('assets/js/shared/dropify.js') }}"></script>
<script src="{{ asset('assets/vendors/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/vendors/tinymce/themes/modern/theme.js') }}"></script>
<script src="{{ asset('assets/vendors/summernote/dist/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('assets/js/shared/editorDemo.js') }}"></script>
@endsection