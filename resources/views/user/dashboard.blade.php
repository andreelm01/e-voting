@extends('user_layout')
@section('title','User Dashboard')
@section('user_content')

  @php
    $id = Session::get('id');
    $id_user = Session::get('id_user');
    $id_pemilihan = Session::get('id_pemilihan');
  @endphp
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="mb-0 text-gray-800">
          {{-- notifikasi alert success pemilihan--}}
          @if ($message = Session::get('success'))
          <div class="alert alert-success m-2">
              <p>
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ $message }}
                </a>
              </p>
          </div>
          @endif

          @if ($message = Session::get('update'))
          <div class="alert alert-success m-2">
              <p>
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ $message }}&nbsp;<a href="{{ route('user-password.edit', encrypt($id)) }}"> Klik Di Sini.
                </a>
              </p>
          </div>
          @endif

          @if ($message = Session::get('kosong'))
          <div class="alert alert-success m-2">
              <p>
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ $message }}
                </a>
              </p>
          </div>
          @endif
        </h5>
      </div>

    <!-- Content Row Division-->
    <div class="row">

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-6 col-md-6 mb-4">
        <a href="{{ route('profile' ,encrypt($id_user)) }}">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Profile</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-user fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-xl-6 col-md-6 mb-4">
        <a href="{{ route('user-pemilihan' ,encrypt($id_pemilihan)) }}">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pemilihan</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-vote-yea fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
@endsection
