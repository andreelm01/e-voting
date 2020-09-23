@extends('admin_layout')
@section('title', 'Detail User')
@section('admin_content')
<!-- Begin Page Content -->
      <div class="container-fluid">
        <nav aria-label="breadcrumb" class="d-none d-sm-block">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin-user.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin-user.index') }}">Data User</a></li>
            <li class="breadcrumb-item active"><a href="#">Detail User</a></li>
          </ol>

          <button class="btn btn-info" onclick="window.history.go(-1)"><i class="fa fa-arrow-left"></i> Back</button>
        </nav>

        <hr class="sidebar-divider">
        
        <div class="row mt-3">
          <div class="col-lg-6">
            <!-- ID user -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">ID, Nama & Username</h6>
              </div>
              <div class="card-body">
                <p>ID User : {{$admin_user->id_user}}</p>
                <p>Nama : {{$admin_user->nama}}</p>
                <p>Username : {{$admin_user->username}}</p>
              </div>
            </div>

            <!-- No Telepon -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">RW, RT, Alamat & Status</h6>
              </div>
              <div class="card-body">
                <p>RW : {{$admin_user->no_rw}}</p>
                <p>RT : {{$admin_user->no_rt}}</p>
                <p>Alamat : {!! nl2br($admin_user->alamat) !!}</p>
                <p> Status : 
                  @if( $admin_user->status==1 )
                    <span class="btn btn-success">Active</span>
                  @else
                    <span class="btn btn-danger">Non Active</span>
                  @endif
                </p>
              </div>
            </div>

          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection