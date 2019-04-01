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

                  <a class="dropdown-item mt-2"> Manage Accounts </a>
                  @if(Auth::user()->isVendor())
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
      <a class="nav-link" href="{{Auth::user()->isAdmin() ? '/admin' : '/vendor'}}">
        <i class="menu-icon mdi mdi-view-dashboard"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/admin/members">
        <i class="menu-icon mdi mdi-account-multiple"></i>
        <span class="menu-title">Member</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/admin/vendors">
        <i class="menu-icon mdi mdi-account-network"></i>
        <span class="menu-title">Vendor</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/admin/jeniskain">
        <i class="menu-icon mdi mdi-newspaper"></i>
        <span class="menu-title">Info Jenis Kain</span>
      </a>
    </li>
  </ul>
</nav>