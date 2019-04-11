@extends('layouts.app')

@section('page', 'Daftar Konfeksi')

@section('custom-css')
<style>
	#search-form{
		font-size: 14px;
		line-height: 29px;
		border: 0px;
		float: right;
		width: 300px;
		font-weight: 300;
		color: #fff;
		padding-left: 20px;
		border-radius: 45px;
		z-index: 0;
		background: #ffba00;
	}
</style>
@endsection

@section('content')
<div class="container" style="margin: 20px auto;">
	<input type="text" id="search-form" class="form-control mb-4" placeholder="Search Posts" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'">
	<div class="row" style="clear: both">
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