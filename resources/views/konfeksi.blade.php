@extends('layouts.app')

@section('page', 'Profil Konfeksi')

@section('custom-css')
<style>
	.helper{
		display: inline-block;
		height: 100%;
		vertical-align: middle;
	}
</style>
@endsection

@section('content')
<!--================Single Product Area =================-->
<div class="product_image_area">
	<div class="container">
		<div class="row s_product_inner">
			<div class="col-lg-6" style="background: url('/storage/{{$konfeksi->gambar}}') center no-repeat;background-size: contain;">
			</div>
			<div class="col-lg-5 offset-lg-1">
				<div class="s_product_text">
					<h3>{{$konfeksi->user->nama}}</h3>
					<ul class="list">
						<li><a class="active" href="#" disabled><span style="width: 120px;">Alamat</span> : {{$konfeksi->alamat}}</a></li>
						<li><a class="active" href="#" disabled><span style="width: 120px;">Kota</span> : {{$konfeksi->kota}}</a></li>
						<li><a class="active" href="#" disabled><span style="width: 120px;">Nomor Telepon</span> : {{$konfeksi->user->nomor_telepon}}</a></li>
					</ul>
					<p>{{$konfeksi->deskripsi}}</p>

				</div>
			</div>
		</div>
	</div>
</div>
<section class="product_description_area">
	<div class="container">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Daftar Produk</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
				aria-selected="false">Ulasan</a>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
				<div class="row">
					@foreach($konfeksi->produks as $produk)
					<div class="col-lg-3 col-md-4">
						<div class="single-product" style="overflow: hidden; text-align: center;">
							<img class="img-fluid" src="/storage/{{$produk->gambar}}" style="height: 250px;">
							<div class="product-details">
								<a href="/produks/{{$produk->id}}">									
									<h6>{{$produk->nama}}</h6>
								</a>
								<p>Rp. {{number_format($produk->harga, 0)}}</p>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
				<div class="row">
					<div class="col-lg-6">
						<div class="row total_rate">
							<div class="col-6">
								<div class="box_total">
									<h5>Keseluruhan</h5>
									<h4>{{floor($konfeksi->ulasans()->avg('rating'))}}</h4>
									<h6>({{$konfeksi->ulasans()->count()}} Ulasan)</h6>
								</div>
							</div>
							<div class="col-6">
								<div class="rating_list">
									<h3>Berdasarkan {{$konfeksi->ulasans()->count()}} Ulasan</h3>
									<ul class="list">
										<li><a href="#">5 Star 
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i> {{$konfeksi->ulasans()->where('rating', 5)->count()}}</a>
										</li>
										<li><a href="#">4 Star 
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i> {{$konfeksi->ulasans()->where('rating', 4)->count()}}</a>
										</li>
										<li><a href="#">3 Star 
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i> {{$konfeksi->ulasans()->where('rating', 3)->count()}}</a>
										</li>
										<li><a href="#">2 Star 
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i> {{$konfeksi->ulasans()->where('rating', 2)->count()}}</a>
										</li>
										<li><a href="#">1 Star 
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i> {{$konfeksi->ulasans()->where('rating', 1)->count()}}</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="review_list">
							@foreach($konfeksi->ulasans()->latest()->take(5)->get() as $ulasan)
							<div class="review_item">
								<div class="media">
									<div class="d-flex">
										<img src="img/product/review-1.png" alt="">
									</div>
									<div class="media-body">
										<h4>{{$ulasan->user->nama}}</h4>
										@for ($i = 0; $i < 5; $i++)
										@if($ulasan->rating - $i >= 1)
										<i class="fa fa-star"></i>
										@else
										<i class="fa fa-star-o"></i>
										@endif
										@endfor
									</div>
								</div>
								<p>{{$ulasan->komentar}}</p>
							</div>
							@endforeach
						</div>
					</div>
					<div class="col-lg-6">
						<div class="review_box">
							<h4>Tambah Ulasan</h4>
							<form class="row contact_form" action="/ulasan" method="post" id="contactForm">
								@csrf
								<input type="hidden" name="konfeksi_id" value="{{$konfeksi->id}}">
								<div class="col-md-12">
									<div class="form-group">
										<input type="number" class="form-control" id="rating" name="rating" placeholder="Rating" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Rating'" min="1" max="5">		
										@if ($errors->has('rating'))
										<p style="color: red;">{{ $errors->first('rating') }}</p>
										@endif
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="form-control" name="komentar" id="komentar" rows="1" placeholder="Review" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Review'"></textarea></textarea>
									</div>
								</div>
								<div class="col-md-12 text-right">
									<button type="submit" value="submit" class="primary-btn">Kirim</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection