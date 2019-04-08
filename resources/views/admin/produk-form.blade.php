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
				<form class="forms-sample" method="POST" action="/vendor/produk" enctype="multipart/form-data">
					@csrf
<!-- 					<div class="form-group">						
						<div class="images">
							<div class="pic">
								add
							</div>
						</div>
						@if ($errors->has('gambar'))
						<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('gambar') }}</label>
						@endif
					</div> -->
					<div class="form-group">
						<label for="namaInput">Nama Produk</label>
						<input type="text" class="form-control" id="namaINput" name="nama"> 
						@if ($errors->has('nama'))
						<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('code') }}</label>
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
						<label for="deskripsiInput">Deskripsi Produk</label> 
						<!-- <textarea class="form-control" id="deskripsiInput" rows="4" name="deskripsi"></textarea>  -->
						<div id="summernoteExample">
							<h4>The standard Lorem Ipsum passage, used since the 1500s</h4>
							<img src="{{ asset('assets/images/samples/300x300/1.jpg') }}" class="ml-2 mb-2 w-25" alt="sample image">
							<p class="text-justify"> "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." </p>
							<p class="text-justify"> "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?" </p>
						</div>
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
