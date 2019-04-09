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
				<div class="col-lg-6">
					<img class="img-fluid" src="/storage/{{$produk->gambar}}" style="max-height: 400px; width: 50%; margin-left: 25%"></img>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3>{{$produk->nama}}</h3>
						<ul class="list mb-4">
							<li><a class="active" href="#"><span style="width: 120px;">Vendor</span> : {{$produk->konfeksi->user->nama}}</a></li>
							<li><a href="#"><span style="width: 120px;">Nomor Telepon</span> : {{$produk->konfeksi->user->nomor_telepon}}</a></li>
						</ul>
<!-- 						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
						<div class="card_area d-flex align-items-center">
							<a class="primary-btn" href="/pesan/{{$produk->id}}">Pesan</a>
							<!-- <a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
							<a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a> -->
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
				<!-- <li class="nav-item">
					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
				</li> -->

			</ul>
			<div class="tab-content" id="myTabContent">
<!-- 				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					<p>{!! $produk->deskripsi !!}</p>
				</div> -->
				{!! $produk->deskripsi !!}
			</div>
		</div>
	</section>
	@endsection