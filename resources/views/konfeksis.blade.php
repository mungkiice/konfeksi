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
	<input type="text" id="search-form" class="form-control mb-4" placeholder="Cari Konfeksi" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Car Konfeksi'" onkeyup="filter()">
	<div class="row" id="daftar-konfeksi" style="clear: both">
		@foreach($konfeksis as $konfeksi)
		<div class="col-lg-3 col-md-4 item-konfeksi">
			<div class="single-product" style="height: 410px; overflow: hidden;">
				<img class="img-fluid" src="/storage/{{$konfeksi->gambar}}" style="width: 100%; height: 150px;">
				<div class="product-details">
					<a href="/konfeksis/{{$konfeksi->id}}" style="">
						<h6>{{$konfeksi->user->nama}}</h6>
					</a>
					<p style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">{{$konfeksi->deskripsi}}</p>
					<div class="prd-bottom">
						<a href="" class="social-info">
							<span class="ti-star"></span>
							<p class="hover-text">add to bag</p>
						</a>
						<a href="" class="social-info">
							<span class="lnr lnr-heart"></span>
							<p class="hover-text">Wishlist</p>
						</a>
						<a href="" class="social-info">
							<span class="lnr lnr-sync"></span>
							<p class="hover-text">compare</p>
						</a>
						<a href="" class="social-info">
							<span class="lnr lnr-move"></span>
							<p class="hover-text">view more</p>
						</a>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection

@section('custom-js')
<script>
	function filter(){
    		// Declare variables
    		var input, filter, ul, li, a, i, txtValue;
    		input = document.getElementById('search-form');
    		filter = input.value.toUpperCase();
    		ul = document.getElementById("daftar-konfeksi");
    		li = ul.getElementsByClassName('item-konfeksi');

    		// Loop through all list items, and hide those who don't match the search query
    		for (i = 0; i < li.length; i++) {
    			a = li[i].getElementsByTagName("h6")[0];
    			txtValue = a.textContent || a.innerText;
    			if (txtValue.toUpperCase().indexOf(filter) > -1) {
    				li[i].style.display = "";
    			} else {
    				li[i].style.display = "none";
    			}
    		}
    	}
    </script>
    @endsection