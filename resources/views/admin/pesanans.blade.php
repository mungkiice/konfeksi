@extends('admin.layouts.app')

@section('content')
<div class="card">
	<div class="card-body">
		<h4 class="card-title">Data Pesanan</h4>
		<div class="row">
			<div class="col-12">
				<table id="order-listing" class="table">
					<thead>
						<tr>
							<th>Pemesan</th>
							<th>Kode</th>
							<th>Produk</th>
							<th>Tenggat Waktu</th>
							<th>Biaya</th>
							<th>Deskripsi</th>
							<th>Jumlah</th>
							<!-- <th>Alamat</th> -->
							<th>Status</th>
							<th>Tindakan</th>
						</tr>
					</thead>
					<tbody>
						@foreach($pesanans as $pesanan)
						<tr>
							<td style="white-space: normal">
								{{$pesanan->user->nama}}
							</td>
							<td style="white-space: normal;">
								{{$pesanan->kode_pesanan}}
							</td>
							<td style="white-space: normal">
								{{$pesanan->produk->nama}}
							</td>
							<td>{{ date('d-m-Y', strtotime($pesanan->tenggat_waktu)) }}</td>
							<td style="text-align: right;">Rp. {{number_format($pesanan->biaya)}}</td>
							<td style="max-width: 200px; white-space: normal">
								{{$pesanan->deskripsi}}
							</td>
							<td>
								@foreach(json_decode($pesanan->jumlah) as $key => $value)
								{{$key .' : '. $value}}<br>
								@endforeach
							</td>
							<td style="white-space: normal;">{{optional($pesanan->statusPesanans()->latest()->first())->keterangan}}</td>
							<td>
								<a class="btn btn-primary mb-1" href="/konfeksi/penawaran/{{$pesanan->id}}/create" style="padding: 0.5rem;">Buat Penawaran</a><br>
								@if($pesanan->statusPesanans()->count() > 1)
								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#statusModal-{{$pesanan->id}}" style="padding: 0.5rem;">Perbarui Status</button>
								@endif
							</td>
						</tr>
						<div class="modal fade" id="statusModal-{{$pesanan->id}}" tabindex="-1" role="dialog" aria-labelledby="statusModal" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Form status pesanan #{{$pesanan->kode_pesanan}} ?</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form class="forms-sample" method="POST" action="/konfeksi/pesanan/{{$pesanan->id}}">
											@csrf
										<div class="modal-body">
											<div class="form-group">
												<label>Keterangan Status</label>
												<input class="form-control" type="text" name="keterangan">
												@if ($errors->has('keterangan'))
												<p style="color: red;">{{ $errors->first('keterangan') }}</p>
												@endif
											</div>
										</div>
										<div class="modal-footer">
											<!-- <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Kembali</button> -->
											<button type="submit" class="btn btn-primary" id="btn-update">Simpan</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

@section('custom-js')
<script>
	(function ($) {
		'use strict';
		$(function () {
			$('#order-listing').DataTable({
				"aLengthMenu": [
				[5, 10, 15, -1],
				[5, 10, 15, "All"]
				],
				"scrollY": 310,
				"iDisplayLength": 10,
				"bLengthChange": false,
				"language": {
					search: "Sort By :"
				}
			});
			$('#order-listing').each(function () {
				var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Sort');
      // search_input.removeClass('form-control-sm');
      // var s = datatable.closest('.dataTables_wrapper').find(".dataTables_filter").append('<button type="button" class="btn btn-primary ml-2">New Record</button>');
  });
		});
	})(jQuery);
</script>
<script src="{{ asset('assets/js/shared/file-upload.js') }}"></script>
<script src="{{ asset('assets/js/shared/iCheck.js') }}"></script>
<script src="{{ asset('assets/js/shared/typeahead.js') }}"></script>
<script src="{{ asset('assets/js/shared/select2.js') }}"></script>
<script src="{{ asset('assets/js/shared/owl-carousel.js') }}"></script>
@endsection