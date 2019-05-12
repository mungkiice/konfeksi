@extends('layouts.app')

@section('page', 'Detail Produk')

@section('custom-css')
<style>
	.s_Product_carousel { position: relative; }
	.s_Product_carousel .owl-next, .s_Product_carousel .owl-prev { 
		background:#333; 
		border-radius: 50%;
		width: 22px; 
		line-height:40px;
		height: 40px; 
		margin-top: -20px; 
		position: absolute; 
		text-align:center; 
		top: 50%; }
		.s_Product_carousel .owl-prev { left: 10px; }
		.s_Product_carousel .owl-next { right: 10px; }
	</style>
	@endsection

	@section('content')
	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<!-- <div class="col-lg-6"style="background: url('/storage/{{$produk->gambar}}') center no-repeat;background-size: contain;"> -->
				<div class="col-lg-6">		
					<img class="img-fluid" src="/storage/{{$produk->gambar}}" style="max-height: 400px; width: 50%; margin-left: 25%"></img>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3>{{$produk->nama}}</h3>
						<ul class="list mb-4">
							<li><a class="active" href="/konfeksis/{{$produk->konfeksi->id}}"><span style="width: 120px;">Vendor</span> : {{$produk->konfeksi->user->nama}}</a></li>
							<li><a href="#"><span style="width: 120px;">Kota</span> : {{$produk->konfeksi->kota}}</a></li>
							<li><a href="#"><span style="width: 120px;">Nomor Telepon</span> : {{$produk->konfeksi->user->nomor_telepon}}</a></li>
						</ul>
						<h4>Rp. {{ number_format($produk->harga, 0) }} /pcs</h4>
						<div class="card_area d-flex align-items-center">
							<a class="primary-btn" href="/pesan/{{$produk->id}}">Pesan</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<h2>Deskripsi Produk</h2>
			</ul>
			<div class="tab-content" id="myTabContent">
				{!! $produk->deskripsi !!}
			</div>
		</div>
	</section>
	@endsection