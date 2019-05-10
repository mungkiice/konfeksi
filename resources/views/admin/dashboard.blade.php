@extends('admin.layouts.app')
@section('content')
<div class="row">
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
		<div class="card card-statistics">
			<div class="card-body">
				<div class="clearfix">
					<div class="float-left">
						<i class="mdi mdi-star text-warning icon-lg"></i>
					</div>
					<div class="float-right">
						<p class="mb-0 text-right">Rating</p>
						<div class="fluid-container">
							<h3 class="font-weight-medium text-right mb-0">{{round(Auth::user()->konfeksi->ulasans()->avg('rating'))}}</h3>
						</div>
					</div>
				</div>
				<p class="text-muted mt-3 mb-0">
					<i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> 65% lower growth
				</p>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
		<div class="card card-statistics">
			<div class="card-body">
				<div class="clearfix">
					<div class="float-left">
						<i class="mdi mdi-folder text-primary icon-lg"></i>
					</div>
					<div class="float-right">
						<p class="mb-0 text-right">Total Penawaran</p>
						<div class="fluid-container">
							<h3 class="font-weight-medium text-right mb-0">{{App\Penawaran::whereIn('pesanan_id',Auth::user()->konfeksi->pesanans->pluck('id'))->count()}}</h3>
						</div>
					</div>
				</div>
				<p class="text-muted mt-3 mb-0">
					<i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Product-wise sales 
				</p>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
		<div class="card card-statistics">
			<div class="card-body">
				<div class="clearfix">
					<div class="float-left">
						<i class="mdi mdi-square-inc-cash text-success icon-lg"></i>
					</div>
					<div class="float-right">
						<p class="mb-0 text-right">Total Pesanan</p>
						<div class="fluid-container">
							<h3 class="font-weight-medium text-right mb-0">{{Auth::user()->konfeksi->pesanans()->count()}}</h3>
						</div>
					</div>
				</div>
				<p class="text-muted mt-3 mb-0">
					<i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Weekly Sales 
				</p>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
		<div class="card card-statistics">
			<div class="card-body">
				<div class="clearfix">
					<div class="float-left">
						<i class="mdi mdi-tshirt-crew text-info icon-lg"></i>
					</div>
					<div class="float-right">
						<p class="mb-0 text-right">Total Produk</p>
						<div class="fluid-container">
							<h3 class="font-weight-medium text-right mb-0">{{Auth::user()->konfeksi->produks()->count()}}</h3>
						</div>
					</div>
				</div>
				<p class="text-muted mt-3 mb-0">
					<i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Product-wise sales
				</p>
			</div>
		</div>
	</div>
</div>
<!-- <div class="row">
	<div class="col-md-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-center mb-4">
					<h2 class="card-title mb-0">Product Analysis</h2>
					<div class="wrapper d-flex">
						<div class="d-flex align-items-center mr-3">
							<span class="dot-indicator bg-success"></span>
							<p class="mb-0 ml-2 text-muted">Product</p>
						</div>
						<div class="d-flex align-items-center">
							<span class="dot-indicator bg-primary"></span>
							<p class="mb-0 ml-2 text-muted">Resources</p>
						</div>
					</div>
				</div>
				<div class="chart-container">
					<canvas id="dashboard-area-chart" height="80"></canvas>
				</div>
			</div>
		</div>
	</div>
</div> -->
@endsection

@section('custom-js')
<script src="{{ asset('assets/js/demo_1/dashboard.js') }}"></script>
@endsection