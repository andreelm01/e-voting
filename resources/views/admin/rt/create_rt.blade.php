@extends('admin_layout')
@section('title', 'Tambah RT')
@section('admin_content')    

    <div class="container-fluid">
      <nav aria-label="breadcrumb" class="d-none d-sm-block">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('administrator')}}">Dashboard</a></li>
          <li class="breadcrumb-item active"><a href="{{route('admin-rt.index')}}">Data RT</a></li>
          <li class="breadcrumb-item active"><a href="#">Tambah RT</a></li>
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
            <form class="user" action="{{ route('admin-rt.store') }}" method="POST">
              @csrf
              <div class="form-group row">
                {{-- id rt --}}
                <input type="hidden" name="id_rt" id="id_rt" readonly="" />

                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="no_rw"><b>No. RW</b></label>
                  <select name="no_rw" id="no_rw" required="" class="form-control @error('no_rw') is-invalid @enderror">
                    <option value="0">Pilih No. RW</option>
                    @foreach ($items as $item)
                    <option value="{{$item->no_rw}}">{{$item->no_rw}}</option>
                    @endforeach
                  </select>
                    @error('no_rw') <div class="text-danger">{{$message}}</div> @enderror
                    @error('id_rt') <div class="text-danger">{{$message}}</div> @enderror
                </div>

                <div class="col-sm-6">
                  <label for="no_rt"><b>No. RT</b></label>
                  <input type="number" class="form-control form-control-user @error('no_rt') is-invalid @enderror" placeholder="No RT" value="{{ old('no_rt') }}" name="no_rt" id="no_rt" />

                  @error('no_rt') <div class="text-danger">{{$message}}</div> @enderror
                  @error('id_rt') <div class="text-danger">{{$message}}</div> @enderror
                </div>
                
              </div>

            <div class="form-group row">

              {{-- nama_rt --}}
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="nama_rt"><b>Nama rt</b></label>
                <input type="text" class="form-control form-control-user @error('nama_rt') is-invalid @enderror" name="nama_rt" value="{{ old('nama_rt') }}" placeholder="Nama rt" required=""/>
                @error('nama_rt') <div class="text-danger">{{$message}}</div> @enderror
              </div>

              <div class="col-sm-6">
                <label for="keterangan"><b>Keterangan</b></label><br>
                <textarea class="resizable_textarea form-control @error('keterangan') is-invalid @enderror" name="keterangan" required="" placeholder="Keterangan" id="keterangan">{{ old('keterangan') }}</textarea>
                @error('keterangan') <div class="text-danger">{{$message}}</div> @enderror
              </div>
            </div>
              
              <!-- Divider/garis -->
              <hr class="sidebar-divider">
              {{-- btn submit --}}
              <button type="submit" onclick="generateID();" class="btn btn-primary btn-user col-sm-6 mb-3 mb-sm-0">
              <i class="fas fa-fw fa-paper-plane"></i>
              Tambah rt
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('rt')

  <script>
    function generateID() {
      var no_rw = document.getElementById('no_rw').value;
      var no_rt = document.getElementById('no_rt').value;

      document.getElementById('id_rt').value = no_rw + "-" + no_rt;
       }
  </script>

  @endpush