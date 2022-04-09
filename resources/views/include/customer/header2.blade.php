
    <!-- Start Header Area -->
    <header class="header navbar-area">
      <!-- Start Header Middle -->
      <div class="header-middle">
          <div class="container">
              <div class="row align-items-center">
                  <div class="col-lg-3 col-md-3 col-7">
                      <!-- Start Header Logo -->
                      <a class="navbar-brand" href="{{ route('/') }}">
                          <img src="{{ asset('/systemLogos/logo.png') }}" alt="Logo">
                      </a>
                      <!-- End Header Logo -->
                  </div>
                  <div class="col-lg-5 col-md-7 d-xs-none">
                      <!-- Start Main Menu Search -->
                      <div class="main-menu-search">
                          <!-- navbar search start -->
                          @livewire('customer.header-search')
                          <!-- navbar search Ends -->
                      </div>
                      <!-- End Main Menu Search -->
                  </div>
                  <div class="col-lg-4 col-md-2 col-5">
                      <div class="middle-right-area">
                          <div class="nav-hotline">
                              <i class="lni lni-phone"></i>
                              <h3>Hotline:
                                  <span>(+100) 123 456 7890</span>
                              </h3>
                          </div>
                          <div class="navbar-cart">
                              <div class="wishlist">
                                @livewire('customer.wishlist-count')
                              </div>
                              <div class="cart-items">
                                @livewire('customer.cart-count')
                              </div>
                              <div class="auth-user">
                                <a href="" class="main-btn">
                                  @guest
                                  <i class="lni lni-user"></i>
                                  @endguest
          
                                  @auth
                                    {{ Auth::user()->name }}
                                  @endauth
                                </a>
                                <div class="auth-user-options">
                                  <ul class="option-list">
                                    @guest
                                      <li><a href="{{ route('login') }}">Login</a></li>
                                      <li><a href="{{ route('register') }}">Register</a></li>
                                    @endguest
          
                                    @auth
                                      <li><a href="">Profile</a></li>
                                      <li><a href="">Orders</a></li>
                                      <li><a href="">Wishlist</a></li>
                                      <li><a href="">Followed Stores</a></li>
                                      {{-- <li><a href="{{ route('logout') }}">Logout</a></li> --}}
                                      <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >Logout</a></li>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                      </form>
                                    @endauth
                                  </ul>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- End Header Middle -->
  </header>
  <!-- End Header Area -->