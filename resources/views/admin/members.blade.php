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
							<th>Nama</th>
							<th>Email</th>
							<th>Nomor Telepon</th>
							<th>Tindakan</th>
						</tr>
					</thead>
					<tbody>
						@foreach($members as $member)
						<tr>
							<td style="max-width: 100px; white-space: normal">
								{{$member->nama}}
							</td>
							<td style="max-width: 200px; white-space: normal">
								{{$member->email}}
							</td>
							<td>{{$member->nomor_telepon}}</td>
							<td>
								<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal" style="padding: 0.5rem;">Edit</button>
								<button type="button" class="btn btn-danger" style="padding: 0.5rem;">Hapus</button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit Info Jenis Kain</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="forms-sample">
            <div class="modal-body">
                @csrf
                <div class="form-group">
                	<input class="form-control" type="text" name="nama" value="">
                </div>
                <div class="form-group">
                	<textarea class="form-control" name="deskripsi"><script>this.data('deskripsi')</script></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" id="btn-update">Simpan</button>
            </div>
        </form>
    </div>
</div>
</div>
@endsection

@section('custom-js')
<script src="{{ asset('assets/js/shared/data-table.js') }}"></script>
@endsection