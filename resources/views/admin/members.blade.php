@extends('admin.layouts.app')

@section('content')
<div class="card">
	<div class="card-body">
		<h4 class="card-title">Data Member</h4>
		<div class="row">
			<div class="col-12">
				<table id="order-listing" class="table">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Email</th>
							<th>Nomor Telepon</th>
							<th>Tindakan</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td style="max-width: 100px; white-space: normal">
								{{$user->nama}}
							</td>
							<td style="max-width: 200px; white-space: normal">
								{{$user->email}}
							</td>
							<td>{{$user->nomor_telepon}}</td>
							<td>
								<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus-{{$user->id}}" style="padding: 0.5rem;">Hapus</button>
							</td>
						</tr>

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
										<form class="forms-sample" method="POST" action="/admin/members/{{$user->id}}">
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