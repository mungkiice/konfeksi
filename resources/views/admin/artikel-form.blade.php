@extends('admin.layouts.app')

@section('content')
<div class="row">
	<div class="col-md-6 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Form Artikel</h4>
				<form class="forms-sample" method="POST" accept="/admin/artikel/create" enctype="multipart/form-data">
					@csrf
					<div class="form-group">		
						<label style="display: block;">Gambar Visual Kain</label>			
						<input type="file" class="dropify" name="gambar" />
						@if ($errors->has('gambar'))
						<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('gambar') }}</label>
						@endif
					</div>
					<div class="form-group">
						<label for="namaInput">Judul Artikel</label>
						<input type="text" class="form-control" id="namaINput" name="judul"> 
						@if ($errors->has('judul'))
						<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('judul') }}</label>
						@endif
					</div>
					<div class="form-group">
						<label for="deskripsiInput">Deskripsi Jenis Kain</label> 
						<textarea class="form-control" id="deskripsiInput" rows="4" name="deskripsi"></textarea> 
						@if ($errors->has('deskripsi'))
						<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('deskripsi') }}</label>
						@endif
					</div>
					<button type="submit" class="btn btn-success mr-2" style="float: right;">Simpan</button>
					<a href="/admin/artikel" class="btn btn-light">Cancel</a>
				</form>
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
@endsection