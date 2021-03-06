<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/fav.png">
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
  <title>{{ config('app.name', 'Market Konfeksi')}}</title>
  <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
  <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.addons.css') }}">
  </head>

  <body>
    <!-- Start Header Area -->
    @include('layouts.nav')
    <!-- End Header Area -->

    <!-- start banner Area -->
    <section class="banner-area">
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
          <div class="col-lg-12">
            <div class="active-banner-slider owl-carousel">
              <!-- single-slide -->
              <div class="row single-slide align-items-center d-flex">
                <div class="col-lg-5 col-md-6">
                  <div class="banner-content">
                    <h1>Marketplace <br>Konfeksi!</h1>
                    <p>Tempat vendor - vendor konfeksi terpercaya yang dapat anda pesan secara online.</p>
                  </div>
                </div>
                <div class="col-lg-7">
                  <div class="banner-img">
                    <img class="img-fluid" src="img/banner/t-shirt.png" alt="">
                  </div>
                </div>
              </div>
              <!-- single-slide -->
              <div class="row single-slide align-items-center d-flex">
                <div class="col-lg-5 col-md-6">
                  <div class="banner-content">
                    <h1>Marketplace <br>Konfeksi!</h1>
                    <p>Tempat vendor - vendor konfeksi terpercaya yang dapat anda pesan secara online.</p>
                  </div>
                </div>
                <div class="col-lg-7">
                  <div class="banner-img">
                    <img class="img-fluid" src="img/banner/t-shirt.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End banner Area -->

      <!-- start features Area -->
      <section class="features-area section_gap">
        <div class="container">
          <div class="row features-inner">
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="single-features">
                <div class="f-icon">
                  <img src="img/tshirt.svg" alt="" style="max-width: 25%">
                </div>
                <h6>Pesan</h6>
                <p>Pesan pakaian sesuai keinginan</p>
              </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="single-features">
                <div class="f-icon">
                  <img src="img/comment.svg" alt="" style="max-width: 25%">
                </div>
                <h6>Chat</h6>
                <p>Diskusi dengan konfeksi</p>
              </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="single-features">
                <div class="f-icon">
                  <i class="fa fa-chat"></i>
                  <img src="img/money.svg" alt="" style="max-width: 25%">
                </div>
                <h6>Bayar</h6>
                <p>Pembayaran mudah</p>
              </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="single-features">
                <div class="f-icon">
                  <img src="img/shipping.svg" alt="" style="max-width: 25%">
                </div>
                <h6>Terima Barang</h6>
                <p>Ambil ditempat atau dikirim</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- end features Area -->
      
      <!-- start product Area -->
      <section class="active-product-area section_gap">
        <!-- single product slide -->
        <div class="single-product-slider">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-6 text-center">
                <div class="section-title">
                  <h1>Jenis Kain</h1>
                  <p>Berikut merupakan jenis - jenis kain dalam industri tekstil dan karakteristiknya.</p>
                </div>
              </div>
            </div>
            <div class="row">
              <!-- single product -->
              @foreach($artikels as $artikel)
              <div class="col-lg-4 col-md-6">
                <div class="single-product">
                  <img class="img-fluid" src="/storage/{{$artikel->gambar}}" style="width: 100%; height: 200px;">
                  <div class="product-details">
                    <h4 class="mb-20">{{$artikel->judul}}</h4>
                    <p style="text-align: justify;">{{$artikel->deskripsi}}</p>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        <!-- single product slide -->
      </section>
      <!-- end product Area -->

      <!-- start footer Area -->
      @include('layouts.footer')
      <!-- End footer Area -->

      <script src="js/vendor/jquery-2.2.4.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
      crossorigin="anonymous"></script>
      <script src="js/vendor/bootstrap.min.js"></script>
      <script src="js/jquery.ajaxchimp.min.js"></script>
      <script src="js/jquery.nice-select.min.js"></script>
      <script src="js/jquery.sticky.js"></script>
      <script src="js/nouislider.min.js"></script>
      <script src="js/countdown.js"></script>
      <script src="js/jquery.magnific-popup.min.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <!--gmaps Js-->
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
      <script src="js/gmaps.min.js"></script>
      <script src="js/main.js"></script>
      <script src="{{ asset('assets/vendors/js/vendor.bundle.addons.js') }}"></script>
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
                // buttons: {
                //   cancel: {
                //     text: "Cancel",
                //     value: null,
                //     visible: true,
                //     className: "btn btn-danger",
                //     closeModal: true,
                //   },
                //   confirm: {
                //     text: "OK",
                //     value: true,
                //     visible: true,
                //     className: "btn btn-primary",
                //     closeModal: true
                //   }
                // }
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
    </body>
    </html>