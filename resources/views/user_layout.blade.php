<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    {{-- <link rel="shortcut icon" href="{{URL::to('backend/img/tms.png')}}"> --}}
    <title>E-Voting | @yield('title')</title>

    @include('admin.includes.style')
    
    {{-- @stack editables --}}
    @stack('editable-css')

    {{-- @stack data tables --}}
    @stack('datatable-css')
  </head>
  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar -->
      @include('user.includes.sidebar')
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Topbar -->
          @include('user.includes.navbar')
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          @yield('user_content')
          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        @include('admin.includes.footer')
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    @include('user.includes.modal')

    @include('admin.includes.script')
  </body>
</html>