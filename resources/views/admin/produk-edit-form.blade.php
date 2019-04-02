@extends('admin.layouts.app')

@section('content')
<div class="row">
	<div class="col-lg-6 col-md-6 grid-margin">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Form Jenis Kain</h4>
				<form class="forms-sample" method="POST" action="/vendor/produk/{{$produk->id}}">
					@csrf
					@method('PUT')
<!-- 					<div class="form-group">
						<label style="display: block;">Gambar Visual Kain</label>
						<input type="file" class="file-upload-default" name="gambar">
						<div class="input-group col-xs-12">
							<input type="text" class="form-control file-upload-info" disabled>
							<span class="input-group-append">
								<button class="file-upload-browse btn btn-info" type="button">Upload</button>
							</span>
						</div>
						@if ($errors->has('gambar'))
						<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('image') }}</label>
						@endif
					</div> -->
					<div class="form-group">
						<label for="namaInput">Nama Produk</label>
						<input type="text" class="form-control" id="namaINput" name="nama" value="{{$produk->nama}}"> 
						@if ($errors->has('nama'))
						<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('code') }}</label>
						@endif
					</div>
					<div class="form-group">
						<label for="deskripsiInput">Deskripsi Produk</label> 
						<textarea class="form-control" id="deskripsiInput" rows="4" name="deskripsi">{{$produk->deskripsi}}</textarea> 
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
	<div class="col-lg-6 col-md-6 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Gambar Produk</h4>
				<form method="POST" action="/vendor/produk/{{$produk->id}}/tambahGambar" enctype="multipart/form-data">
					@csrf
					<div class="form-group">		
						<input type="file" class="dropify" name="gambar" />
						@if ($errors->has('gambar'))
						<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('gambar') }}</label>
						@endif
					</div>
					<button type="submit" class="btn btn-success" style="width: 100%"><i class="fa fa-plus"></i><span>Tambah Gambar</span></button>	
				</form>
				<table class="table">
					<thead>
						<tr>
							<th>Gambar</th>
							<th>Ditambahkan pada</th>
							<th>Tindakan</th>
						</tr>
					</thead>
					<tbody>
						@foreach($produk->images as $image)
						<tr>
							<td style="width: 100px;">
								<img class="img-fluid" src="/storage/{{$image->path}}" style="width: 100%; border-radius: 0; height: auto">
							</td>
							<td>{{ date('d-m-Y', strtotime($image->created_at)) }}</td>
							<td>
								<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$image->id}}" style="padding: 0.5rem;">Hapus</button>
							</td>
						</tr>
						<div class="modal fade" id="deleteModal-{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Apa anda yakin akan menghapus gambar ini ?</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-footer">
										<form class="forms-sample" method="POST" action="/vendor/produk/{{$produk->id}}/{{$image->id}}/hapusGambar">
											@csrf
											{{method_field('DELETE')}}
											<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tidak</button>
											<button type="submit" class="btn btn-danger" id="btn-update">Ya</button>
										</form>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</tbody>
				</table>
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
@endsection