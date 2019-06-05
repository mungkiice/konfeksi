<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Market Konfeksi | Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/puse-icons-feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.addons.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/shared/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
</head>
<body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
                <div class="auto-form-wrapper">
                    <a class="navbar-brand logo_h" href="/" style="display: block;"><img src="/img/logo.png" alt="" style="margin: auto;display: block;"></a>
                  <form action="/login" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="label">Email</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Email" name="email">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <!-- <i class="mdi mdi-check-circle-outline"></i> -->
                                </span>
                            </div>
                        </div>
                        @if ($errors->has('email'))
                        <p style="color: red;">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" placeholder="******" name="password">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <!-- <i class="mdi mdi-check-circle-outline"></i> -->
                                </span>
                            </div>
                        </div>
                        @if ($errors->has('password'))
                        <p style="color: red;">{{ $errors->first('password') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn submit-btn btn-block" style="background-color: #FFA100; color: white;">Login</button>
                    </div>

                    <div class="text-block text-center my-3">
                        <span class="text-small font-weight-semibold">Belum punya akun ?</span>
                        <a href="/register" class="text-black text-small">Buat akun</a>
                    </div>
                </form>
            </div>
            <p class="footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets/vendors/js/vendor.bundle.addons.js') }}"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="{{ asset('assets/js/shared/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/shared/hoverable-collapse.js') }}"></script>
<script src="{{ asset('assets/js/shared/misc.js') }}"></script>
<script src="{{ asset('assets/js/shared/settings.js') }}"></script>
<script src="{{ asset('assets/js/shared/todolist.js') }}"></script>
<!-- endinject -->
</body>
</html>