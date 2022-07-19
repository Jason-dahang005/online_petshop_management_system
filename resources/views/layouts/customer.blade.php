<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Online Petshop Management System</title>

  @include('/include/customer/style')
  @livewireStyles()
</head>
<body>
  <div class="preloader">
    <div class="preloader-inner">
      <div class="preloader-icon">
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  @include('/include/customer/header')
  @if (request()->routeIs('customer.order-history') || request()->routeIs('customer.cancel-order') || request()->routeIs('customer.profile') || request()->routeIs('customer.wishlist') || request()->routeIs('customer.my-order') || request()->routeIs('customer.user-change-password'))
    <div class="my-order-container">
      <div class="container" style="margin-top: .5in; margin-bottom: .5in;">
        <div class="row">
          <div class="col-lg-3 col-12">
            @livewire('customer.my-account-sidebar')
          </div>
          <div class="col-lg-9 col-12">
            {{ $slot }}
          </div>
        </div>
      </div>
    </div>
  @else
    {{ $slot }}
  @endif

  @include('/include/customer/footer')
  @include('/include/customer/script')
  @livewireScripts()
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <x-livewire-alert::scripts />
</body>
</html>