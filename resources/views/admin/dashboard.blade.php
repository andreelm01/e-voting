@extends('admin_layout')
@section('title','Admin Dashboard')
@section('admin_content')    
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row Division-->
    <div class="row">

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-6 col-md-6 mb-4">
        <a href="{{route('admin-rw.index')}}">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data RW</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $rw }}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-list fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-xl-6 col-md-6 mb-4">
        <a href="{{route('admin-rw.create')}}">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Create RW</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-plus fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>

    <hr class="sidebar-divider">

    <div class="row">
      <div class="col-xl-6 col-md-6 mb-4">
        <a href="{{route('admin-rt.index')}}">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data RT</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $rt }}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-list fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-xl-6 col-md-6 mb-4">
        <a href="{{route('admin-rt.create')}}">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Create RT</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-plus fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>

    <hr class="sidebar-divider">

    <div class="row">
      <div class="col-xl-6 col-md-6 mb-4">
        <a href="{{route('admin-user.index')}}">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data User</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user }}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-xl-6 col-md-6 mb-4">
        <a href="{{route('admin-user.index')}}">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Create User</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-plus fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>

    <hr class="sidebar-divider">

    <div class="row">
      <div class="col-xl-6 col-md-6 mb-4">
        <a href="{{route('admin-pemilihan.index')}}">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Pemilihan</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pemilihan }}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-xl-6 col-md-6 mb-4">
        <a href="{{route('admin-pemilihan.index')}}">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Create Pemilhan</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-plus fa-2x text-gray-300"></i>
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
