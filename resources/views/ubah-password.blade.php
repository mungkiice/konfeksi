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
                    <input type="password" class="form-control" id="password_lama" name="password_lama" placeholder="Password Lama" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password Lama'">
                    @if ($errors->has('password_lama'))
                    <strong class="error-message-form">{{ $errors->first('password_lama') }}</strong>
                    @endif
                </div>
                <div class="col-md-12 form-group">
                    <input type="password" class="form-control" id="password_baru" name="password_baru" placeholder="Password Baru" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password Baru'">
                    @if ($errors->has('password_baru'))
                    <strong class="error-message-form">{{ $errors->first('password_baru') }}</strong>
                    @endif
                </div>
                <div class="col-md-12 form-group">
                    <input type="password" class="form-control" id="password_baru_confirmation" name="password_baru_confirmation" placeholder="Konfirmasi Password Baru" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Konfirmasi Password Baru'">
                </div>
                <div class="col-md-12 form-group">
                    <button type="submit" value="submit" class="primary-btn">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection