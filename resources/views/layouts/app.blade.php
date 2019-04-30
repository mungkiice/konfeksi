<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="/img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Site Title -->
    <title>{{config('app.name', 'Market Konfeksi')}} | @yield('page')</title>

    <link rel="stylesheet" href="/css/linearicons.css">
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" href="/css/themify-icons.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/nice-select.css">
    <link rel="stylesheet" href="/css/nouislider.min.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.addons.css') }}">
    @yield('custom-css')
</head>

<body>
    <div id="flash-message" style="text-align: center;width: 100%;z-index: 10; ">
        <strong id="flash-header"></strong> <span id="flash-body"></span>
        <button type="button" class="close" onclick="document.getElementById('flash-message').style.display = 'none';">
            <span class="glyphicon glyphicon-remove"></span>
        </button>
    </div>
    <!-- Start Header Area -->
    @include('layouts.nav')
    <!-- End Header Area -->

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Halaman @yield('page')</h1>
                    <nav class="d-flex align-items-center" style="float: right;">
                        <a href="/">Beranda<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">@yield('page')</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    @yield('content')
    <!-- start footer Area -->
    @include('layouts.footer')
    <!-- End footer Area -->


    <script src="/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
    crossorigin="anonymous"></script>
    <script src="/js/vendor/bootstrap.min.js"></script>
    <script src="/js/jquery.ajaxchimp.min.js"></script>
    <script src="/js/jquery.nice-select.min.js"></script>
    <script src="/js/jquery.sticky.js"></script>
    <script src="/js/nouislider.min.js"></script>
    <script src="/js/jquery.magnific-popup.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="{{ asset('assets/vendors/js/vendor.bundle.addons.js') }}"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="/js/gmaps.min.js"></script>
    <script src="/js/main.js"></script>
    <script>
        (function($) {
          showSwal = function(type, message) {
            'use strict';
            if (type === 'flash') {
              swal({
                title: 'Sukses!',
                text: message,
                icon: 'success',
                timer: 2000,
                button: false
            })

          }else if (type === 'confirmation') {
              swal({
                title: 'Konfirmasi',
                text: message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3f51b5',
                cancelButtonColor: '#ff4081',
                confirmButtonText: 'Great ',
                buttons: {
                  cancel: {
                    text: "Cancel",
                    value: null,
                    visible: true,
                    className: "btn btn-danger",
                    closeModal: true,
                },
                confirm: {
                    text: "OK",
                    value: true,
                    visible: true,
                    className: "btn btn-primary",
                    closeModal: true
                }
            }
        })
          } else if (type === 'custom-html') {
              swal({
                content: {
                  element: "input",
                  attributes: {
                    placeholder: "Type your password",
                    type: "password",
                    class: 'form-control'
                },
            },
            button: {
              text: "OK",
              value: true,
              visible: true,
              className: "btn btn-primary"
          }
      })
          }
      }

  })(jQuery);
</script>
@if(session("flash"))
<script type="text/javascript">
    showSwal('flash', "{{session('flash')}}");
</script>
@endif
@yield('custom-js')
</body>
</html>