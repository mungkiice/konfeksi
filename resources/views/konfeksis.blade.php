@extends('layouts.app')

@section('page', 'Daftar Konfeksi')

@section('content')
<div class="container" style="margin: 50px auto;">
	<div class="row">
		@foreach($konfeksis as $konfeksi)
		<div class="col-lg-3 col-md-4">
			<div class="single-product" style="height: 410px; overflow: hidden;">
				<img class="img-fluid" src="/storage/{{$konfeksi->gambar}}" style="width: 100%; height: 150px;">
				<div class="product-details">
					<a href="/konfeksis/{{$konfeksi->id}}" style="">
						<h6>{{$konfeksi->user->nama}}</h6>
					</a>
					<p style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">{{$konfeksi->deskripsi}}</p>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection