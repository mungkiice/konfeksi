<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile not-navigation-link">
      <div class="nav-link">
        <div class="user-wrapper">
          <div class="profile-image">
            <img src="{{ asset('assets/images/faces/face8.jpg') }}" alt="profile image">
          </div>
          <div class="text-wrapper">
            <p class="profile-name">{{ Auth::user()->nama }}</p>
            <ul class="nav navbar-nav">
              <li class="nav-item dropdown">
                <a href="#" class="nav-link d-flex user-switch-dropdown-toggler" id="UsersettingsDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                  <small class="designation text-muted">{{ Auth::user()->role }}</small>
                  <span class="status-indicator online"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-left navbar-dropdown" aria-labelledby="UsersettingsDropdown">
                  @if(Auth::user()->isKonfeksi())
                  <a class="dropdown-item" href="/user/password/edit"> Ubah Password </a>
                  @endif
                  <a class="dropdown-item" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"> Logout </a>

                  <form id="logout-form" action="/logout" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{Auth::user()->isAdmin() ? '/admin' : '/konfeksi'}}">
        <i class="menu-icon mdi mdi-view-dashboard"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    @if(Auth::user()->isAdmin())
    <li class="nav-item">
      <a class="nav-link" href="/admin/konfeksi">
        <i class="menu-icon mdi mdi-account-network"></i>
        <span class="menu-title">Konfeksi</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/admin/artikel">
        <i class="menu-icon mdi mdi-newspaper"></i>
        <span class="menu-title">Artikel Jenis Kain</span>
      </a>
    </li>
    @else
    <li class="nav-item">
      <a class="nav-link" href="/konfeksi/produk">
        <i class="menu-icon mdi mdi-tshirt-crew"></i>
        <span class="menu-title">Produk</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/konfeksi/pesanan">
        <i class="menu-icon mdi mdi-note-multiple"></i>
        <span class="menu-title">Pesanan</span>
      </a>
    </li>
    @endif
  </ul>
</nav>