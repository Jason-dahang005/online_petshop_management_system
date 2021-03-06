<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
    <img src="/adminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Admin</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="/adminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
          <a href="{{ route('admin.admin-profile') }}" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ url('/admin/dashboard') }}" class="nav-link {{  request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        {{-- <li class="nav-item">
          <a href="{{ url('/admin/admin-home-slider-component') }}" class="nav-link {{  request()->routeIs('admin.admin-home-slider-component') ? 'active' : '' }}">
            <i class="nav-icon fas fa-sliders-h"></i>
            <p>Home Slider</p>
          </a>
        </li> --}}

        <li class="nav-item">
            <a href="{{ url('/admin/user-component') }}" class="nav-link {{  request()->routeIs('admin.user-component') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>Users</p>
          </a>
        </li>


        <li class="nav-item">
            <a href="{{ url('/admin/product-category-component') }}" class="nav-link {{  request()->routeIs('admin.product-category-component') ? 'active' : '' }}">
            <i class="nav-icon fas fa-sitemap"></i>
            <p>Category</p>
          </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('/admin/product-component') }}" class="nav-link {{  request()->routeIs('admin.product-component') ? 'active' : '' }}">
            <i class="nav-icon fas fa-shopping-bag"></i>
            <p>Product</p>
          </a>
        </li>
        
        {{-- <li class="nav-item">
          <a href="{{ url('/admin/admin-coupons-component') }}" class="nav-link {{ request()->routeIs('admin.admin-coupons-component') ? 'active' : '' }}">
            <i class="nav-icon fas fa-ticket-alt"></i>
            <p>Coupons</p>
          </a>
        </li> --}}

        <li class="nav-item">
          <a href="{{ url('/admin/order-component') }}" class="nav-link {{ 'admin/order-component' == request()->path() ? 'active' : '' }}">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>Orders</p>
          </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('/admin/inventory-component') }}" class="nav-link {{ 'admin/inventory-component' == request()->path() ? 'active' : '' }}">
            <i class="nav-icon fas fa-boxes"></i>
            <p>Inventory</p>
          </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('/admin/sales-component') }}" class="nav-link {{ 'admin/sales-component' == request()->path() ? 'active' : '' }}">
            <i class="nav-icon fas fa-money-bill"></i>
            <p>Sales</p>
          </a>
        </li>
{{-- 
        <li class="nav-item">
            <a href="{{ url('/admin/contact-component') }}" class="nav-link {{ 'admin/contact-component' == request()->path() ? 'active' : '' }}">
            <i class="nav-icon fas fa-envelope"></i>
            <p>Messages</p>
          </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('/admin/contact-component') }}" class="nav-link {{ 'admin/contact-component' == request()->path() ? 'active' : '' }}">
            <i class="nav-icon fas fa-cog"></i>
            <p>Settings</p>
          </a>
        </li> --}}

        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
          <form id="logout-form" method="POST" action="{{ route('logout') }}">
              @csrf
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
