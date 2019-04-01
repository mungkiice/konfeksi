@extends('layouts.app')
@section('page', 'Login')
@section('content')
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="/img/login.jpg" alt="">
                    <div class="hover">
                        <h4>Belum punya akun?</h4>
                        <p>Segera buat akun baru dan dapatkan hak akses untuk segala fitur.</p>
                        <a class="primary-btn" href="/register">Buat Akun</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Log in to enter</h3>
                    <form class="row login_form" action="/login" method="post" id="contactForm" novalidate="novalidate">
                        @csrf
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                            @if ($errors->has('email'))
                            <strong class="error-message-form">{{ $errors->first('email') }}</strong>
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" id="pass" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="f-option2">Izinkan saya tetap login</label>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="primary-btn">Masuk</button>
                            <a href="/password/reset">Lupa Password?</a>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
