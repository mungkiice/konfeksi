@extends('admin.layouts.app')

@section('content')
<div class="row">
	<div class="col-md-6 grid-margin">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Buat Penawaran Baru</h4>
				<form class="forms-sample" method="POST" accept="/admin/penawaran/create" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="namaInput">Tanggal Selesai</label>
						<div id="datepicker-popup" class="input-group date datepicker">
							<input type="text" class="form-control" name="tanggal_selesai">
							<span class="input-group-addon input-group-append border-left">
								<span class="mdi mdi-calendar input-group-text"></span>
							</span>
						</div>
						@if ($errors->has('tanggal_selesai'))
						<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('tanggal_selesai') }}</label>
						@endif
					</div>
					<div class="form-group">
						<label for="namaInput">Biaya Tambahan (optional)</label>
						<input type="number" class="form-control" id="namaINput" name="biaya" style="text-align: right;"> 
						@if ($errors->has('biaya'))
						<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('biaya') }}</label>
						@endif
					</div>
					<div class="form-group">
						<label for="catatanInput">Catatan (optional)</label> 
						<textarea class="form-control" id="catatanInput" rows="4" name="catatan"></textarea> 
						@if ($errors->has('catatan'))
						<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('catatan') }}</label>
						@endif
					</div>
					<div class="form-group">		
						<label style="display: block;">Gambar Desain (optional)</label>			
						<input type="file" class="dropify" name="gambar" />
						@if ($errors->has('gambar'))
						<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('gambar') }}</label>
						@endif
					</div>
					<button type="submit" class="btn btn-success mr-2" style="float: right;">Kirim</button>
					<a href="/konfeksi/pesanan" class="btn btn-light">Kembali</a>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6 grid-margin" style="overflow-y: auto; height: 670px;">
		<h6>Histori Penawaran</h6>
		@foreach($pesanan->penawarans()->latest()->get() as $penawaran)
		<div class="card mb-2">
			<div class="card-body">
				<h4 class="card-title">Penawaran {{date('d M Y', strtotime($penawaran->created_at))}} - <span style="color: {{$penawaran->status == 'terkirim' ? 'blue' : ($penawaran->status == 'diterima' ? 'green' : 'red')}};">{{$penawaran->status}}</span></h4>
				<div class="form-group row">
					<label class="col-form-label col-sm-5">Tanggal Selesai</label>
					<div class="col-sm-7">
						<input class="form-control" type="text" name="" value="{{date('d M Y', strtotime($penawaran->tanggal_selesai))}}" disabled>
					</div>					
				</div>
				<div class="form-group row">
					<label class="col-form-label col-sm-5">Biaya</label>
					<div class="col-sm-7">
						<input class="form-control" type="text" name="" value="Rp. {{number_format($penawaran->biaya,0)}}" disabled style="text-align: right;">
					</div>					
				</div>
				<div class="form-group row">
					<label class="col-form-label col-sm-5">Catatan</label>
					<div class="col-sm-7">
						<textarea class="form-control" rows="5" disabled>{{$penawaran->catatan}}</textarea>
					</div>					
				</div>
				@if($penawaran->gambar)
				<div class="form-group row">
					<label class="col-sm-5 col-form-label" style="display: block">Gambar</label>
					<div class="col-sm-7">						
						<img src="/storage/{{$penawaran->gambar}}" style="width: 50%;margin: auto;display: block;">
					</div>
				</div>
				@endif
			</div>
		</div>
		@endforeach
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