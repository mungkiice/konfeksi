@extends('layouts.app')
@section('page', 'Ubah Password')
@section('content')
<section class="tracking_box_area section_gap">
    <div class="container">
        <div class="tracking_box_inner">
            <p style="text-align: center;">Pastikan untuk menjaga keamanan informasi pribadi anda.</p>
            <form class="row tracking_form" action="/user/password/edit" method="post" novalidate="novalidate" style="margin: auto;">
                @csrf
                <div class="col-md-12 form-group">
                    <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Password Lama" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password Lama'">
                    @if ($errors->has('old_password'))
                    <strong class="error-message-form">{{ $errors->first('old_password') }}</strong>
                    @endif
                </div>
                <div class="col-md-12 form-group">
                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Password Baru" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password Baru'">
                    @if ($errors->has('new_password'))
                    <strong class="error-message-form">{{ $errors->first('new_password') }}</strong>
                    @endif
                </div>
                <div class="col-md-12 form-group">
                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" placeholder="Konfirmasi Password Baru" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Konfirmasi Password Baru'">
                </div>
                <div class="col-md-12 form-group">
                    <button type="submit" value="submit" class="primary-btn">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection