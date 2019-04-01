@extends('layouts.app')
@section('page', 'Request Link Reset')
@section('content')
<section class="tracking_box_area section_gap">
    <div class="container">
        <div class="tracking_box_inner">
            <p style="text-align: center;">Link untuk reset password akan dikirimkan ke email anda.</p>
            <form class="row tracking_form" action="/password/reset" method="post" novalidate="novalidate" style="margin: auto;">
                @csrf
                <div class="col-md-12 form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                    @if (session('status'))
                    <strong class="error-message-form">{{ session('status') }}</strong>
                    @endif
                    @if ($errors->has('email'))
                    <strong class="error-message-form">{{ $errors->first('email') }}</strong>
                    @endif
                </div>
                <div class="col-md-12 form-group">
                    <button type="submit" value="submit" class="primary-btn">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection