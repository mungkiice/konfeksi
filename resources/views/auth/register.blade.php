@extends('layouts.app')
@section('page', 'Registrasi Member')
@section('content')
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="/img/login.jpg" alt="">
                    <div class="hover">
                        <h4>Ingin mendaftarkan konveksi anda?</h4>
                        <p>Segera buat akun khusus vendor konveksi dan dapatkan manfaatnya.</p>
                        <a class="primary-btn" href="/register/vendor">Buat Akun Vendor</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Daftar Akun Member</h3>
                    <form class="row login_form" action="/register" method="post" id="contactForm" novalidate="novalidate">
                        @csrf
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama'">
                            @if ($errors->has('name'))
                            <strong class="error-message-form">{{ $errors->first('name') }}</strong>
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                            @if ($errors->has('email'))
                            <strong class="error-message-form">{{ $errors->first('email') }}</strong>
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" id="pass" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                            @if ($errors->has('password'))
                            <strong class="error-message-form">{{ $errors->first('password') }}</strong>
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" id="pass_c" name="password_confirmation" placeholder="Konfirmasi Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Konfirmasi Password'">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Nomor Telepon" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nomor Telepon'">
                            @if ($errors->has('phone_number'))
                            <strong class="error-message-form">{{ $errors->first('phone_number') }}</strong>
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="primary-btn">Daftar</button>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
