@extends('admin.layouts.app')

@section('custom-css')
<style>
	.images {
		display: flex;
		flex-wrap:  wrap;
		margin-top: 20px;
	}
	.images .img,
	.images .pic {
		flex-basis: 31%;
		margin-bottom: 10px;
		border-radius: 4px;
	}
	.images .img {
		width: 112px;
		height: 93px;
		background-size: cover;
		margin-right: 10px;
		background-position: center;
		display: flex;
		align-items: center;
		justify-content: center;
		cursor: pointer;
		position: relative;
		overflow: hidden;
	}
	.images .img:nth-child(3n) {
		margin-right: 0;
	}
	.images .img span {
		display: none;
		text-transform: capitalize;
		z-index: 2;
	}
	.images .img::after {
		content: '';
		width: 100%;
		height: 100%;
		transition: opacity .1s ease-in;
		border-radius: 4px;
		opacity: 0;
		position: absolute;
	}
	.images .img:hover::after {
		display: block;
		background-color: #000;
		opacity: .5;
	}
	.images .img:hover span {
		display: block;
		color: #fff;
	}
	.images .pic {
		background-color: #F5F7FA;
		align-self: center;
		text-align: center;
		padding: 40px 0;
		text-transform: uppercase;
		color: #848EA1;
		font-size: 12px;
		cursor: pointer;
	}
</style>
@endsection

@section('content')
<div class="row">
	<div class="col-md-6 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Form Produk</h4>
				<form class="forms-sample" method="POST" action="/vendor/produk" enctype="multipart/form-data">
					@csrf
<!-- 					<div class="form-group">						
						<div class="images">
							<div class="pic">
								add
							</div>
						</div>
						@if ($errors->has('gambar'))
						<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('gambar') }}</label>
						@endif
					</div> -->
					<div class="form-group">		
						<label style="display: block;">Gambar Visual Produk</label>			
						<input type="file" class="dropify" name="gambar" />
						@if ($errors->has('gambar'))
						<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('gambar') }}</label>
						@endif
					</div>
					<div class="form-group">
						<label for="namaInput">Nama Produk</label>
						<input type="text" class="form-control" id="namaINput" name="nama"> 
						@if ($errors->has('nama'))
						<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('code') }}</label>
						@endif
					</div>
					<div class="form-group">
						<label for="deskripsiInput">Deskripsi Produk</label> 
						<textarea class="form-control" id="deskripsiInput" rows="4" name="deskripsi"></textarea> 
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
	
</div>
@endsection

@section('custom-js')
<script src="{{ asset('assets/js/shared/file-upload.js') }}"></script>
<script src="{{ asset('assets/js/shared/iCheck.js') }}"></script>
<script src="{{ asset('assets/js/shared/typeahead.js') }}"></script>
<script src="{{ asset('assets/js/shared/select2.js') }}"></script>
<script src="{{ asset('assets/js/shared/dropify.js') }}"></script>
<script>
	(function ($) {
		$(document).ready(function () {

			uploadImage()
			submit()

			var way = 0
			var queue = []
			var fullStock = 10
			var speedCloseNoti = 1000

			function uploadImage() {
				var button = $('.images .pic')
				var uploader = $('<input type="file" accept="image/*"/>')
				var images = $('.images')
				var i = 0;
				button.on('click', function () {
					// var uploader = $('<input type="file" accept="image/*"/>');
					// images.prepend('<input id="file-'+i+'"  style="display:none" type="file" name="gambar[]"');	
					// var uploader = $('#file-'+i);
					uploader.click()
				})

				uploader.on('change', function () {
					var reader = new FileReader()
					reader.onload = function(event) {
						images.prepend('<div class="img" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"><span>remove</span></div>');
						i++;
						images.prepend('<input style="display:none" type="file" name="gambar[]" value="" url="'+event.target.result+'"/>');	
					}
					reader.readAsDataURL(uploader[0].files[0]);
				})

				images.on('click', '.img', function () {
					$(this).remove()
				})

			}

			function submit() {  
				var button = $('#send')

				button.on('click', function () {
					if(!way) {
						var deskripsi = $('#namaInput')
						var deskripsi  = $('#deskripsiInput')
						var images = $('.images .img')
						var imageArr = []


						for(var i = 0; i < images.length; i++) {
							imageArr.push({url: $(images[i]).attr('rel')})
						}

						var newStock = {
							title: title.val(),
							category: cate.val(),
							images: imageArr,
							type: 1
						}

						saveToQueue(newStock)
					} else {
						var topic = $('#topic')
						var message = $('#msg')

						var newStock = {
							title: topic.val(),
							message: message.val(),
							type: 2
						}

						saveToQueue(newStock)
					}
				})
			}

		})
	})(jQuery)
</script>
@endsection