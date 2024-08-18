<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- CSS -->
  @include('backend.admin.layout.css') <!-- Ensure this file is in backend/admin/layout.css -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Header -->
  @include('backend.admin.layout.header') <!-- Ensure this file is in backend/admin/layout/header.blade.php -->

  <!-- Sidebar -->
  @include('backend.admin.layout.slidebar') <!-- Ensure this file is in backend/admin/layout/slidebar.blade.php -->

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    @yield('content') <!-- This will be replaced with the content of child views -->
  </div>

  <!-- Footer -->
  @include('backend.admin.layout.footer') <!-- Ensure this file is in backend/admin/layout/footer.blade.php -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>

</div>
<!-- ./wrapper -->
@include('backend.admin.layout.script') <!-- Ensure this file is in backend/admin/layout/script.blade.php -->
</body>
</html>
