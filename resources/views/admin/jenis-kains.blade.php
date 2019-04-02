@extends('admin.layouts.app')

@section('content')
<div class="card">
	<div class="card-body">
		<h4 class="card-title">Data Info Jenis Kain</h4>
		<div class="row">
			<a class="btn btn-success" href="/admin/jeniskain/create">Tambah Info Jenis Kain</a>
			<div class="col-12">
				<table id="order-listing" class="table">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Deskripsi</th>
							<th>Gambar</th>
							<th>Dibuat Pada</th>
							<th>Tindakan</th>
						</tr>
					</thead>
					<tbody>
						@foreach($jenisKains as $jenisKain)
						<tr>
							<td style="max-width: 100px; white-space: normal">
								{{$jenisKain->nama}}
							</td>
							<!-- <td style="max-width: 200px; text-overflow: ellipsis; break-word: break-word ; overflow: hidden">
							</td> -->
							<td style="max-width: 200px; white-space: normal">
								{{$jenisKain->deskripsi}}
							</td>
							<td style="max-width: 100px;">
								<img src="/storage/{{optional($jenisKain->image)->path}}" style="width: 100%; border-radius: 0; height: auto">
							</td>
							<td>{{ date('d-m-Y', strtotime($jenisKain->created_at)) }}</td>
							<td>
								<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal-{{$jenisKain->id}}" style="padding: 0.5rem;">Edit</button>
								<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$jenisKain->id}}" style="padding: 0.5rem;">Hapus</button>
							</td>
						</tr>
						<div class="modal fade" id="deleteModal-{{$jenisKain->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Apa anda yakin akan menghapus "{{$jenisKain->nama}}" ?</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-footer">
										<form class="forms-sample" method="POST" action="/admin/jeniskain/{{$jenisKain->id}}">
											@csrf
											{{method_field('DELETE')}}
											<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tidak</button>
											<button type="submit" class="btn btn-danger" id="btn-update">Ya</button>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="modal fade" id="editModal-{{$jenisKain->id}}" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Form Pembaruan {{$jenisKain->nama}} ?</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form class="forms-sample" method="POST" action="/admin/jeniskain/{{$jenisKain->id}}" enctype="multipart/form-data">
										@csrf
										@method('PUT')
										<div class="modal-body">
											<div class="form-group">
												<img class="img-fluid mb-2" src="/storage/{{optional($jenisKain->image)->path}}" style="width: 50%; margin-left: 25%;">
												<label style="display: block;">Gambar Visual Kain</label>
												<input type="file" class="file-upload-default" name="gambar">
												<div class="input-group col-xs-12">
													<input type="text" class="form-control file-upload-info" disabled>
													<span class="input-group-append">
														<button class="file-upload-browse btn btn-info" type="button">Upload</button>
													</span>
												</div>
												@if ($errors->has('image'))
												<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('image') }}</label>
												@endif
											</div>
											<div class="form-group">
												<label for="namaInput">Nama Produk</label>
												<input type="text" class="form-control" id="namaINput" name="nama" value="{{$jenisKain->nama}}"> 
												@if ($errors->has('nama'))
												<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('nama') }}</label>
												@endif
											</div>
											<div class="form-group">
												<label for="deskripsiInput">Deskripsi Produk</label> 
												<textarea class="form-control" id="deskripsiInput" rows="4" name="deskripsi">{{$jenisKain->deskripsi}}</textarea> 
												@if ($errors->has('deskripsi'))
												<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('deskripsi') }}</label>
												@endif
											</div>
										</div>
										<div class="modal-footer">
											<button class="btn btn-light" data-miss="modal">Kembali</button>
											<button type="submit" class="btn btn-success mr-2" style="float: right;">Simpan</button>
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
@endsection