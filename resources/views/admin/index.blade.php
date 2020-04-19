<!DOCTYPE html>
<html>
<head>
  @include('admin/layouts/head')
</head>
<body>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <!-- Navbar -->
      @include('admin/layouts/header')

      <!-- Main Sidebar Container -->
      @include('admin/layouts/menu-left')

      @include('admin/layouts/content')
      <!-- /.content-wrapper -->
      @include('admin/layouts/footer')
    
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>

    @include('admin/layouts/scripts')
    @include('admin/layouts/js')
</body>
</html>