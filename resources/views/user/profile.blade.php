@extends('user_layout')
@section('title', 'Profile')
@section('user_content')
<!-- Begin Page Content -->
  <div class="container-fluid">
      <nav aria-label="breadcrumb" class="d-none d-sm-block">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('user') }}">Dashboard</a></li>
          <li class="breadcrumb-item active"><a href="#">Profile User</a></li>
        </ol>
      </nav>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Profile User | <a href="{{ route('user-report', encrypt($user->id)) }}" title="Report" class="btn btn-primary" target="_blank"><i class="fas fa-fw fa-print"></i></a></h1>
        </div>
        <!-- Divider/garis -->
        <hr class="sidebar-divider">
        <div class="row">
          <div class="col-lg-6">
            <!-- Name -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
              </div>
              <div class="card-body">
                <pre>ID User     : {{$user->id_user}}</pre>
                <pre>Nama        : {{ucfirst($user->nama)}}</pre>
                <pre>No. Rumah   : {{ucwords($user->no_rumah)}}</pre>
                <pre>Alamat      : {{ucwords($user->alamat)}}</pre>
              </div>
            </div>

            <!-- Tanggal -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">No. RW, No. RT & Username</h6>
              </div>
              <div class="card-body">
                <pre>No. RW     : {{ $user->no_rw }}</pre>
                <pre>No. RT     : {{ $user->no_rt }}</pre>
                <pre>Username   : {{ ucwords($user->username) }}</pre>
              </div>
            </div>

          </div>
        </div>
    </div>
  <!-- /.container-fluid -->
@endsection