  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('adminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Delivery</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('/delivery/main') }}" class="nav-link {{ 'delivery/main' == request()->path() ? 'active' : '' }}">
              <i class="nav-icon fas fa-home"></i>
              <p>Home</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/delivery/delivery-profile') }}" class="nav-link {{ 'delivery/delivery-profile' == request()->path() ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>Profile</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('delivery.delivery-list') }}" class="nav-link {{ 'delivery/delivery-list' == request()->path() ? 'active' : '' }}">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>Delivery List</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('delivery.delivery-history') }}" class="nav-link {{ 'delivery/delivery-history' == request()->path() ? 'active' : '' }}">
              <i class="nav-icon fas fa-history"></i>
              <p>Delivery History</p>
            </a>
          </li>  
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>logout</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>