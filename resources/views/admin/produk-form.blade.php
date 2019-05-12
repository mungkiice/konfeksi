@extends('admin.layouts.app')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('assets/vendors/summernote/dist/summernote-bs4.css') }}">
@endsection

@section('content')
<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Form Produk</h4>
				<form class="forms-sample" method="POST" action="/konfeksi/produk" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="namaInput">Nama Produk</label>
						<input type="text" class="form-control" id="namaINput" name="nama"> 
						@if ($errors->has('nama'))
						<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('nama') }}</label>
						@endif
					</div>
					<div class="form-group">
						<label for="hargaInput">Harga Produk per piece</label>
						<input type="number" class="form-control" name="harga">
						@if ($errors->has('harga'))
						<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('harga') }}</label>
						@endif
					</div>
					<div class="form-group">		
						<label style="display: block;">Gambar Visual Produk</label>			
						<input type="file" class="dropify" name="gambar" />
						@if ($errors->has('gambar'))
						<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('gambar') }}</label>
						@endif
					</div>
					<div class="form-group">
						<label for="deskripsiInput">Deskripsi Produk <span style="color: red;font-size: 0.6rem;">* berisi size chart,bahan,dll</span></label> 
						<textarea id="summernoteExample" name="deskripsi"></textarea>
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
