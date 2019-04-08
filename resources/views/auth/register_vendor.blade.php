@extends('layouts.app')
@section('page', 'Registrasi Vendor')
@section('custom-css')
<style type="text/css">
    textarea.form-control{
        border: none;
        border-bottom: 1px solid #ccc;
    }
</style>
@endsection
@section('content')
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="/img/login.jpg" alt="">
                    <div class="hover">
                        <!-- <h4>Belum punya akun?</h4>
                        <p>Segera buat akun baru dan dapatkan hak akses untuk segala fitur.</p>
                        <a class="primary-btn" href="/register">Buat Akun</a> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Daftar Akun Vendor</h3>
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
                            <textarea class="form-control" id="address" name="address" placeholder="Alamat Konveksi" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alamat Konveksi'"></textarea>
                            @if ($errors->has('address'))
                            <strong class="error-message-form">{{ $errors->first('address') }}</strong>
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <textarea class="form-control" id="address" name="address" placeholder="Kota" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alamat Konveksi'"></textarea>
                            @if ($errors->has('address'))
                            <strong class="error-message-form">{{ $errors->first('address') }}</strong>
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <textarea class="form-control" id="address" name="address" placeholder="Provinsi" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alamat Konveksi'"></textarea>
                            @if ($errors->has('address'))
                            <strong class="error-message-form">{{ $errors->first('address') }}</strong>
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <!-- <input type="text" class="form-control" id="description" name="description" placeholder="Deskripsi Konveksi" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Deskripsi Konveksi'"> -->
                            <textarea class="form-control" id="description" name="description" placeholder="Deskripsi Konveksi" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Deskripsi Konveksi'"></textarea>
                            @if ($errors->has('description'))
                            <strong class="error-message-form">{{ $errors->first('description') }}</strong>
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="file" name="photo" placeholder="Foto Konveksi">
                            @if ($errors->has('photo'))
                            <strong class="error-message-form">{{ $errors->first('photo') }}</strong>
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
