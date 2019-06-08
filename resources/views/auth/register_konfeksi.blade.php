<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Market Konfeksi | Register</title>
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
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.css') }}">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
</head>
<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                      <h2 class="text-center mb-4">Register Konfeksi</h2>
                      <div class="auto-form-wrapper">
                    <a class="navbar-brand logo_h" href="/" style="display: block;"><img src="/img/logo.png" alt="" style="margin: auto;display: block;"></a>
                        <form action="/register/konfeksi" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Nama</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Nama Konfeksi" name="nama">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <!-- <i class="mdi mdi-check-circle-outline"></i> -->
                                        </span>
                                    </div>
                                </div>
                                @if ($errors->has('nama'))
                                <p style="color: red;">{{ $errors->first('nama') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Email</label>
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
                                <label>Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Password" name="password">
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
                                <label>Konfirmasi Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Konfirmasi Password" name="password_confirmation">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <!-- <i class="mdi mdi-check-circle-outline"></i> -->
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon/Whatsapp</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="Nomor Telepon" name="nomor_telepon">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <!-- <i class="mdi mdi-check-circle-outline"></i> -->
                                        </span>
                                    </div>
                                </div>
                                @if ($errors->has('nomor_telepon'))
                                <p style="color: red;">{{ $errors->first('nomor_telepon') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <div class="input-group" style="height: auto;">
                                    <textarea class="form-control" rows="2" placeholder="Alamat Konfeksi" name="alamat" style="padding-top: 1rem; padding-bottom: 1rem; height: auto; line-height: 14px;"></textarea>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <!-- <i class="mdi mdi-check-circle-outline"></i> -->
                                        </span>
                                    </div>
                                </div>
                                @if ($errors->has('alamat'))
                                <p style="color: red;">{{ $errors->first('alamat') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Kota</label>
                                <div class="input-group" style="height: auto">
                                    <select class="form-control js-example-basic-single" name="kota">
                                        @foreach($kotas as $kota)
                                        <option value="{{$kota['city_id']}}">{{$kota['type'] . ' ' . $kota['city_name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <div class="input-group" style="height: auto">
                                    <textarea class="form-control" rows="4" placeholder="Deksripsi Konfeksi" name="deskripsi" style="padding-top: 1rem; padding-bottom: 1rem; height: auto; line-height: 14px;"></textarea>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <!-- <i class="mdi mdi-check-circle-outline"></i> -->
                                        </span>
                                    </div>
                                </div>
                                @if ($errors->has('deskripsi'))
                                <p style="color: red;">{{ $errors->first('deskripsi') }}</p>
                                @endif
                            </div>  
                            <div class="form-group">        
                                <label style="display: block;">Gambar Konfeksi</label>         
                                <input type="file" class="dropify" name="gambar" />
                                @if ($errors->has('gambar'))
                                <label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('gambar') }}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn submit-btn btn-block" style="background-color: #FFA100; color: white;">Register</button>
                            </div>
                            <div class="text-block text-center my-3">
                                <span class="text-small font-weight-semibold">Ingin mendaftar sebagai pelanggan ?</span>
                                <a href="/register" class="text-black text-small">Buat akun pelanggan</a>
                            </div>
                            <div class="text-block text-center my-3">
                                <span class="text-small font-weight-semibold">Sudah punya akun ?</span>
                                <a href="/login" class="text-black text-small">Login</a>
                            </div>
                        </form>
                    </div>
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
<script src="{{ asset('assets/js/shared/select2.js') }}"></script>
<!-- endinject -->
<script src="{{ asset('assets/js/shared/dropify.js') }}"></script>
</body>
</html>

