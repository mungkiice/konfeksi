@extends('layouts.app')
@section('page', 'Reset Password')
@section('content')
<section class="tracking_box_area section_gap">
    <div class="container">
        <div class="tracking_box_inner">
            <p style="text-align: center;">Pastikan untuk menjaga keamanan informasi pribadi anda.</p>
            <form class="row tracking_form" action="/password/reset" method="post" novalidate="novalidate" style="margin: auto;">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">
                <div class="col-md-12 form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" value="{{ $email ?? old('email') }}">
                    @if ($errors->has('email'))
                    <strong class="error-message-form">{{ $errors->first('email') }}</strong>
                    @endif
                </div>
                <div class="col-md-12 form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password Baru" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password Baru'">
                    @if ($errors->has('password'))
                    <strong class="error-message-form">{{ $errors->first('password') }}</strong>
                    @endif
                </div>
                <div class="col-md-12 form-group">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password Baru" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Konfirmasi Password Baru'">
                </div>
                <div class="col-md-12 form-group">
                    <button type="submit" value="submit" class="primary-btn">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
