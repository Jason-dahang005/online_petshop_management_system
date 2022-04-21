<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title></title>
  @livewireStyles()
  @include('/include/delivery/style')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    @include('/include/delivery/topbar')
    @include('/include/delivery/sidebar')
    <div class="content-wrapper">
      <section class="content">
        <div class="container-fluid pt-3">
          {{ $slot }}
        </div>
      </section>
    </div>
  </div>
  @include('/include/delivery/footer')
  @include('/include/delivery/script')
  @livewireScripts()
  <script src="{{ asset('/js/delivery.js') }}"></script>
</body>
</html>