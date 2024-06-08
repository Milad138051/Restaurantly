<!DOCTYPE html>
<html lang="en">

<head>
@include('admin.layouts.head-tag')
@yield('head-tag')
</head>


<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->

  @include('admin.layouts.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.layouts.sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">داشبورد</h1>
          </div><!-- /.col -->
          {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item active">داشبورد سوم</li>
            </ol>
          </div><!-- /.col --> --}}
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">

      @yield('content')
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->

  @include('admin.layouts.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

@include('admin.layouts.script')
@yield('script')

<section class="toast-wrapper flex-row-reverse">
  @include('admin.alerts.toast.success')
  @include('admin.alerts.toast.error')
</section>


@include('admin.alerts.sweetalert.success')
@include('admin.alerts.sweetalert.error')
<!-- jQuery -->

</body>
</html>
