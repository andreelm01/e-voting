@extends('admin_layout')
@section('title', 'Detail Pemilihan')
@section('admin_content')
<!-- Begin Page Content -->
  <div class="container-fluid">
    <nav aria-label="breadcrumb" class="d-none d-sm-block">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('administrator')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin-pemilihan.index') }}">Data Pemilihan</a></li>
        <li class="breadcrumb-item active"><a href="#">Detail Pemilihan</a></li>
      </ol>

      <button class="btn btn-info" onclick="window.history.go(-1)"><i class="fa fa-arrow-left"></i> Back</button>
    </nav>

    <hr class="sidebar-divider">
    
    <div class="row mt-3">
      <div class="col-lg-6">
        <!-- ID pemilihan -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">ID Pemilihan</h6>
          </div>
          <div class="card-body">
            <p>ID Pemilihan : {{$admin_pemilihan->id_pemilihan}}</p>
            <p>RW : {{$admin_pemilihan->no_rw}}</p>
            <p>RT : {{$admin_pemilihan->no_rt}}</p>
            <p>Keterangan : {!! nl2br($admin_pemilihan->keterangan) !!}</p>
          </div>
        </div>

      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
@endsection