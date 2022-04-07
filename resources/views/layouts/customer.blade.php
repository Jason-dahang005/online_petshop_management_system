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
  {{ $slot }}
  @include('/include/customer/footer')
  @include('/include/customer/script')
  @livewireScripts()
</body>
</html>