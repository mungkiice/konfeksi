@extends('admin.layouts.app')

@section('content')
<div class="card">
	<div class="card-body">
		<h4 class="card-title">Data Vendor</h4>
		<div class="row">
			<div class="col-12">
				<table id="order-listing" class="table">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Email</th>
							<th>Nomor Telepon</th>
							<th>Alamat</th>
							<th>Gambar</th>
							<th>Valid</th>
							<th>Tindakan</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td style="white-space: normal">								
								{{$user->nama}}
							</td>
							<td style="white-space: normal; max-width: 100px;">
								{{$user->email}}
							</td>
							<td style="white-space: normal">
								{{$user->nomor_telepon}}
							</td>
							<td style="white-space: normal">
								{{$user->vendor->alamat}}
							</td>
							<td>
								@if($user->vendor->valid)
								<label class="badge badge-success">Valid</label>
								@else
								<label class="badge badge-warning">Belum Valid</label>
								@endif
							</td>
							<td style="max-width: 200px;">
								<img src="/storage/{{$user->vendor->image->path}}" style="width: 100%; border-radius: 0; height: auto">
							</td>
							<td>
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalValid-{{$user->id}}" style="padding: 0.5rem;">Valid</button>
								<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus-{{$user->id}}" style="padding: 0.5rem;">Hapus</button>
							</td>
						</tr>
						<div class="modal fade" id="modalValid-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="hapusModal" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Apakah anda yakin ingin menghapus user "{{$user->nama}}" ?</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-footer">
										<form class="forms-sample" method="POST" action="/admin/vendor/{{$user->vendor->id}}">
											@csrf
											<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Kembali</button>
											<button type="submit" class="btn btn-primary" id="btn-update">Ya</button>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="modal fade" id="modalHapus-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="hapusModal" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Apakah anda yakin ingin menghapus user "{{$user->nama}}" ?</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-footer">
										<form class="forms-sample" method="POST" action="/admin/vendor/{{$user->vendor->id}}">
											@csrf
											{{method_field('DELETE')}}
											<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Kembali</button>
											<button type="submit" class="btn btn-danger" id="btn-update">Hapus</button>
										</form>
									</div>
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
@endsection