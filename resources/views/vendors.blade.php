@extends('layouts.app')

@section('page', 'Daftar Vendor')

@section('content')
<div class="container" style="margin: 50px auto;">
	<div class="row">
		@foreach($vendors as $vendor)
		<div class="col-lg-3 col-md-4">
			<div class="single-product" style="height: 410px; overflow: hidden;">
				<img class="img-fluid" src="/storage/{{$vendor->image->path}}" alt="">
				<div class="product-details">
					<a href="/vendors/{{$vendor->id}}" style="">
						<h6>{{$vendor->user->nama}}</h6>
					</a>
					<p style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">{{$vendor->deskripsi}}</p>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection