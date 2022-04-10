<!DOCTYPE html>
<html>
  <!-- css here -->
  @include('layouts.head')
  <!-- /css here -->
  
@if (!Auth::check())
<body class="hold-transition sidebar-mini layout-top-nav">
@else
<body class="hold-transition sidebar-mini layout-fixed">
@endif
<div class="wrapper">

  <!-- Navbar -->
  @include('layouts.header')
  <!-- /.navbar -->

  @include('layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
    </div>

    <!-- Main content -->
    <section class="content">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    @include('layouts.footer')
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('layouts.javascript')
</body>
</html>