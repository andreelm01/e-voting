@extends('admin_layout')
@section('title', 'Tambah RW')
@section('admin_content')    

    <div class="container-fluid">
      <nav aria-label="breadcrumb" class="d-none d-sm-block">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('administrator')}}">Dashboard</a></li>
          <li class="breadcrumb-item active"><a href="{{route('admin-rw.index')}}">Data RW</a></li>
          <li class="breadcrumb-item active"><a href="#">Tambah RW</a></li>
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
            <form class="user" action="{{ route('admin-rw.store') }}" method="POST">
              @csrf
              {{-- no_rw --}}
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="no_rw"><b>No. RW</b></label>
                  <input type="number" class="form-control form-control-user @error('no_rw') is-invalid @enderror" placeholder="No RW" value="{{ old('no_rw') }}" name="no_rw" />
                  @error('no_rw') <div class="text-danger">{{$message}}</div> @enderror
                </div>

                {{-- nama_rw --}}
                <div class="col-sm-6">
                  <label for="nama_rw"><b>Nama RW</b></label>
                  <input type="text" class="form-control form-control-user @error('nama_rw') is-invalid @enderror" name="nama_rw" value="{{ old('nama_rw') }}" placeholder="Nama RW" required=""/>
                  @error('nama_rw') <div class="text-danger">{{$message}}</div> @enderror
                </div>
              </div>


            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="keterangan"><b>Keterangan</b></label><br>
                <textarea class="resizable_textarea form-control @error('keterangan') is-invalid @enderror" name="keterangan" required="" placeholder="Keterangan" id="keterangan">{{ old('keterangan') }}</textarea>
                @error('keterangan') <div class="text-danger">{{$message}}</div> @enderror
              </div>
            </div>
              
              <!-- Divider/garis -->
              <hr class="sidebar-divider">
              {{-- btn submit --}}
              <button type="submit" class="btn btn-primary btn-user col-sm-6 mb-3 mb-sm-0">
              <i class="fas fa-fw fa-paper-plane"></i>
              Tambah RW
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection