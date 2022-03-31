<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  @livewireStyles()
  @include('/include/admin/style')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    @include('/include/admin/topbar')
    @include('/include/admin/sidebar')
    <div class="content-wrapper">
      <section class="content">
        <div class="container-fluid pt-3">
          {{ $slot }}
        </div>
      </section>
    </div>
  </div>
  @include('/include/admin/footer')
  @include('/include/admin/script')
  @livewireScripts()
  <script src="{{ asset('/js/admin.js') }}"></script>
</body>
</html>