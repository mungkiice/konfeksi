@extends('admin.layouts.app')

@section('content')
<div class="card">
	<div class="card-body">
		<h4 class="card-title">Data ulasan</h4>
		<div class="row">
			<div class="col-12">
				<table id="order-listing" class="table">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Rating</th>
							<th>Komentar</th>
						</tr>
					</thead>
					<tbody>
						@foreach($ulasans as $ulasan)
						<tr>
							<td style="max-width: 100px; white-space: normal">
								{{$ulasan->user->nama}}
							</td>
							<td>
								@for ($i = 0; $i < 5; $i++)
								@if($i < $ulasan->rating)
								<i class="menu-icon mdi mdi-star" style="color: orange;"></i>
								@else
								<i class="menu-icon mdi mdi-star-outline" style="color: orange;"></i>
								@endif
								@endfor
							</td>
							<td style="white-space: normal">
								{{$ulasan->komentar}}
							</td>
						</tr>
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