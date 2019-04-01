@extends('layouts.app')

@section('page', 'Profil Vendor')

@section('content')
<!--================Single Product Area =================-->
<div class="product_image_area">
	<div class="container">
		<div class="row s_product_inner">
			<div class="col-lg-6">
				<div class="s_Product_carousel">
					<div class="single-prd-item">
						<img class="img-fluid" src="/img/category/s-p1.jpg" alt="">
					</div>
					<div class="single-prd-item">
						<img class="img-fluid" src="/img/category/s-p1.jpg" alt="">
					</div>
					<div class="single-prd-item">
						<img class="img-fluid" src="/img/category/s-p1.jpg" alt="">
					</div>
				</div>
			</div>
			<div class="col-lg-5 offset-lg-1">
				<div class="s_product_text">
					<h3>Konveksi Abu Janda</h3>
					<ul class="list">
						<li><a class="active" href="#"><span style="width: 120px;">Alamat</span> : Jalan Sumbersari 2 No.51 Lowokwaru</a></li>
						<li><a href="#"><span style="width: 120px;">Nomor Telepon</span> : 081289596040</a></li>
					</ul>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

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
					<div class="col-lg-3 col-md-4">
						<div class="single-product" style="height: 350px; overflow: hidden;">
							<img class="img-fluid" src="/img/product/p1.jpg" alt="">
							<div class="product-details">
								<h6>addidas New Hammer sole
								for Sports person</h6>
								<p style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
				<div class="row">
					<div class="col-lg-6">
						<div class="row total_rate">
							<div class="col-6">
								<div class="box_total">
									<h5>Overall</h5>
									<h4>4.0</h4>
									<h6>(03 Reviews)</h6>
								</div>
							</div>
							<div class="col-6">
								<div class="rating_list">
									<h3>Based on 3 Reviews</h3>
									<ul class="list">
										<li><a href="#">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
										<li><a href="#">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i	class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
										<li><a href="#">3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
										<li><a href="#">2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
										<li><a href="#">1 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="review_list">
							<div class="review_item">
								<div class="media">
									<div class="d-flex">
										<img src="img/product/review-1.png" alt="">
									</div>
									<div class="media-body">
										<h4>Blae Ruiz</h4>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
									dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
								commodo</p>
							</div>
							<div class="review_item">
								<div class="media">
									<div class="d-flex">
										<img src="img/product/review-2.png" alt="">
									</div>
									<div class="media-body">
										<h4>Blake Ruiz</h4>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
									dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
								commodo</p>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="review_box">
							<h4>Add a Review</h4>
							<p>Your Rating:</p>
							<ul class="list">
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
							</ul>
							<p>Outstanding</p>
							<form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" class="form-control" id="name" name="name" placeholder="Your Full name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Full name'">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="email" class="form-control" id="email" name="email" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" class="form-control" id="number" name="number" placeholder="Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="form-control" name="message" id="message" rows="1" placeholder="Review" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Review'"></textarea></textarea>
									</div>
								</div>
								<div class="col-md-12 text-right">
									<button type="submit" value="submit" class="primary-btn">Submit Now</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Product Description Area =================-->
@endsection