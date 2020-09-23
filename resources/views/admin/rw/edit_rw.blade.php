@extends('admin_layout')
@section('title', 'Edit RW')
@section('admin_content')    

    <div class="container-fluid">
      <nav aria-label="breadcrumb" class="d-none d-sm-block">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('administrator')}}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{route('admin-rw.index')}}">All RW</a></li>
          <li class="breadcrumb-item active"><a href="#">Edit RW</a></li>
        </ol>
      </nav>

      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <button class="btn btn-info" onclick="window.history.go(-1)"><i class="fa fa-arrow-left"></i> Back</button>
      </div>

      <hr class="sidebar-divider">
      <div class="row">
        <div class="col-lg-10">
          <div class="p-1">
            {{-- form input new data --}}
            <form class="user" action="{{ route('admin-rw.update', $admin_rw->id) }}" method="POST">
              @csrf
              @method('PUT')
              {{-- category product no_rw --}}
              <div class="form-group row">

                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="no_rw"><b>No. RW</b></label>
                  <input type="number" name="no_rw" value="{{ old('no_rw') ? old('no_rw') : $admin_rw->no_rw }}" class="form-control form-control-user @error('no_rw') is-invalid @enderror" />
                  @error('no_rw') <div class="text-danger">{{$message}}</div> @enderror
                </div>

                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="nama_rw"><b>Nama RW</b></label>
                  <input type="text" name="nama_rw" value="{{ old('nama_rw') ? old('nama_rw') : $admin_rw->nama_rw }}" class="form-control form-control-user @error('nama_rw') is-invalid @enderror" />
                  @error('nama_rw') <div class="text-danger">{{$message}}</div> @enderror
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="keterangan"><b>Keterangan</b></label><br>
                  <textarea class="resizable_textarea form-control" name="keterangan" id="keterangan">{!! html_entity_decode($admin_rw->keterangan)!!}</textarea>
                  @error('keterangan') <div class="text-danger">{{$message}}</div> @enderror
                </div>
              </div>

              <!-- Divider/garis -->
              <hr class="sidebar-divider">
              {{-- btn edit --}}
              <button type="submit" class="btn btn-primary btn-user col-sm-6 mb-3 mb-sm-0">
              <i class="fas fa-fw fa-paper-plane"></i>
              Edit Data
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection