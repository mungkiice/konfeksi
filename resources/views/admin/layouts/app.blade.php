<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{config('app.name', 'Market Konfeksi')}} | Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/font-awesome/css/font-awesome.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/puse-icons-feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.addons.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('assets/css/shared/style.css') }}">
  <link rel="stylesheet" href="{{asset('css/admin-chat.css')}}">
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.css') }}">
  <!-- End Layout styles -->
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
  @yield('custom-css')
</head>
<body>
  <div id="app" class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('admin.layouts.nav')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      @include('admin.layouts.theme-setting')
      @include('admin.layouts.right-sidebar')
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      @include('admin.layouts.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        @if(Auth::user()->isKonfeksi())
        <konfeksi-chat-box :user="{{Auth::user()}}"></konfeksi-chat-box>
        <button class="btn btn-info" id="btn-chat" style="position: fixed;right: 15%;bottom: 5%;border-radius: 100px;padding: 15px 50px;font-weight: bold;z-index: 5"><i class="mdi mdi-chat-processing"></i>Chat</button>
        @endif
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019 <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i>
            </span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <script src="{{ asset('js/app.js') }}"></script>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('assets/vendors/js/vendor.bundle.addons.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('assets/js/shared/off-canvas.js') }}"></script>
  <script src="{{ asset('assets/js/shared/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('assets/js/shared/misc.js') }}"></script>
  <script src="{{ asset('assets/js/shared/settings.js') }}"></script>
  <script src="{{ asset('assets/js/shared/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- swal popup -->
  @yield('custom-js')
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
    $('#btn-chat').click(function(){
      $('#chat-box').toggle();
    });
    $('#UserDropdown').click(function(){
      $('#UserDropdownMenu').toggle();
    });
    $('#UserSettingsDropdown').click(function(){
      $('#UserSettingsDropdownMenu').toggle();
    })
  </script>
  @if(session("flash"))
  <script type="text/javascript">
    showSwal('flash', "{{session('flash')}}");
  </script>
  @endif
</body>
</html>