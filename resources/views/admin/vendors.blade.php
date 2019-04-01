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
							<th>Deskripsi</th>
							<th>Gambar</th>
							<th>Tindakan</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td style="white-space: normal">								{{$user->nama}}
							</td>
							<td style="white-space: normal">
								{{$user->email}}
							</td>
							<td style="white-space: normal">
								{{$user->nomor_telepon}}
							</td>
							<td style="white-space: normal">
								{{$user->vendor->alamat}}
							</td>
							<td style="white-space: normal">
								{{$user->vendor->deskripsi}}
							</td>
							<td style="max-width: 200px;">
								<img src="/storage/{{$user->vendor->image->path}}" style="width: 100%; border-radius: 0; height: auto">
							</td>
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
										<form class="forms-sample" method="POST" action="/admin/vendors/{{$user->id}}">
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
<script src="{{ asset('assets/js/shared/data-table.js') }}"></script>
@endsection