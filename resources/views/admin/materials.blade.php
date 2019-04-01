@extends('admin.layouts.app')
@section('content')
<div class="card">
	<div class="card-body">
		<h4 class="card-title">Data Info Jenis Kain</h4>
		<div class="row">
			<div class="col-12">
				<table id="order-listing" class="table">
					<thead>
						<tr>
							<th>Order #</th>
							<th>Nama</th>
							<th>Deskripsi</th>
							<th>Gambar</th>
							<th>Dibuat Pada</th>
							<th>Tindakan</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Edinburgh</td>
							<td>Deskripsi panjang</td>
							<td>2012/08/03</td>
							<td><img src=""></td>
							<td>
								<button type="button" class="btn btn-warning" style="padding: 0.5rem;">Move</button>
								<button type="button" class="btn btn-primary" style="padding: 0.5rem;">Update OTP</button>
								<button type="button" class="btn btn-success" style="padding: 0.5rem;">List Voucher</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
@section('custom-js')
<script src="{{ asset('assets/js/shared/data-table.js') }}"></script>
@endsection