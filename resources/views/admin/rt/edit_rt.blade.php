@extends('admin_layout')
@section('title', 'Edit RT')
@section('admin_content')    

    <div class="container-fluid">
      <nav aria-label="breadcrumb" class="d-none d-sm-block">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('administrator')}}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{route('admin-rt.index')}}">All rt</a></li>
          <li class="breadcrumb-item active"><a href="#">Edit RT</a></li>
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
            <form class="user" action="{{ route('admin-rt.update', $admin_rt->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="form-group row">
                {{-- id rt --}}
                <input type="hidden" name="id_rt" id="id_rt" readonly="" value="{{ $admin_rt->id_rt }}"/>

                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="no_rw"><b>No. RW</b></label>
                  <select name="no_rw" id="no_rw" required="" class="form-control @error('no_rw') is-invalid @enderror">
                    @foreach ($items as $item)
                    <option value="{{$item->no_rw}}" {{$admin_rt->no_rw == $item->no_rw ? 'selected' : ''}}>{{$item->no_rw}}</option>
                    @endforeach
                  </select>
                    @error('no_rw') <div class="text-danger">{{$message}}</div> @enderror
                    @error('id_rt') <div class="text-danger">{{$message}}</div> @enderror
                </div>

                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="no_rt"><b>No. RT</b></label>
                  <input type="number" name="no_rt" id="no_rt" value="{{ old('no_rt') ? old('no_rt') : $admin_rt->no_rt }}" class="form-control form-control-user" />
                  @error('no_rt') <div class="text-danger">{{$message}}</div> @enderror
                  @error('id_rt') <div class="text-danger">{{$message}}</div> @enderror
                </div>
                
              </div>

              <div class="form-group row">

                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="nama_rt"><b>Nama rt</b></label>
                  <input type="text" name="nama_rt" value="{{ old('nama_rt') ? old('nama_rt') : $admin_rt->nama_rt }}" class="form-control form-control-user @error('nama_rt') is-invalid @enderror" />
                  @error('nama_rt') <div class="text-danger">{{$message}}</div> @enderror
                </div>

                <div class="col-sm-6">
                  <label for="keterangan"><b>Keterangan</b></label><br>
                  <textarea class="resizable_textarea form-control" name="keterangan" id="keterangan">{!! html_entity_decode($admin_rt->keterangan)!!}</textarea>
                  @error('keterangan') <div class="text-danger">{{$message}}</div> @enderror
                </div>
              </div>

              <!-- Divider/garis -->
              <hr class="sidebar-divider">
              {{-- btn edit --}}
              <button type="submit" class="btn btn-primary btn-user col-sm-6 mb-3 mb-sm-0" >
              <i class="fas fa-fw fa-paper-plane"></i>
              Edit Data
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection

{{-- @push('rt')

<script>
    function generateID() {
      var no_rw = document.getElementById('no_rw').value;
      var no_rt = document.getElementById('no_rt').value;

      document.getElementById('id_rt').value = no_rw + "-" + no_rt;
       }
  </script>

  @endpush --}}