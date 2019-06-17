@extends('admin.layouts.app')

@section('content')
<div class="card">
	<div class="card-body">
		<h4 class="card-title">Data Artikel</h4>
		<div class="row">
			<a class="btn btn-success" href="/admin/artikel/create">Tambah Artikel</a>
			<div class="col-12">
				<table id="order-listing" class="table">
					<thead>
						<tr>
							<th>Judul</th>
							<th>Deskripsi</th>
							<th>Gambar</th>
							<th>Dibuat Pada</th>
							<th>Tindakan</th>
						</tr>
					</thead>
					<tbody>
						@foreach($artikels as $artikel)
						<tr>
							<td style="max-width: 100px; white-space: normal">
								{{$artikel->judul}}
							</td>
							<!-- <td style="max-width: 200px; text-overflow: ellipsis; break-word: break-word ; overflow: hidden">
							</td> -->
							<td style="max-width: 200px; white-space: normal">
								{{$artikel->deskripsi}}
							</td>
							<td style="max-width: 100px;">
								<img src="/storage/{{$artikel->gambar}}" style="width: 100%; border-radius: 0; height: auto">
							</td>
							<td>{{ date('d-m-Y', strtotime($artikel->created_at)) }}</td>
							<td>
								<a class="btn btn-warning" href="/admin/artikel/{{$artikel->id}}/edit" style="padding: 0.5rem;">Edit</a>
								<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$artikel->id}}" style="padding: 0.5rem;">Hapus</button>
							</td>
						</tr>
						<div class="modal fade" id="deleteModal-{{$artikel->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Apa anda yakin akan menghapus "{{$artikel->judul}}" ?</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-footer">
										<!-- <form class="forms-sample" method="POST" action="/admin/artikel/{{$artikel->id}}"> -->
											<!-- @csrf -->
											<!-- {{method_field('DELETE')}} -->
											<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tidak</button>
											<!-- <button type="submit" class="btn btn-danger" id="btn-update">Ya</button> -->
											<a href="/admin/artikel/{{$artikel->id}}" style="color: white;" class="btn btn-danger">Ya</a>

										<!-- </form> -->
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
<script src="{{ asset('assets/js/shared/file-upload.js') }}"></script>
<script src="{{ asset('assets/js/shared/iCheck.js') }}"></script>
<script src="{{ asset('assets/js/shared/typeahead.js') }}"></script>
<script src="{{ asset('assets/js/shared/select2.js') }}"></script>
@endsection