@extends('user_layout')
@section('title', 'Pemilihan')
@section('user_content')
<!-- Begin Page Content -->
  <div class="container-fluid" oncontextmenu="return false">
      <nav aria-label="breadcrumb" class="d-none d-sm-block">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('user') }}">Dashboard</a></li>
          <li class="breadcrumb-item active"><a href="#">Pemilihan</a></li>
        </ol>
      </nav>

      @if ($errors->any())
        <hr class="sidebar-divider">
        <div class="alert alert-danger m-2">
          <strong>Opps!,</strong> There were some problems with your input.<br>
          <ul>
            @foreach ($errors->all() as $error)
              <li><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        </div>
        <!-- Divider/garis -->
        <hr class="sidebar-divider">
        <div class="row">
          <div class="col-lg-12">
            <!-- Name -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h1 class="h3 mb-0 text-gray-800 text-center">{{ $info['status'] }}</h1>
              </div>
              @if( $pemilihan->status == 1)
              <div class="card-body">
                <div class="text-center">
                  <h4>ID Pemilihan : <b>{{ $pemilihan->id_pemilihan }}</b></h4><br>
                  <h5>Keterangan : <br>
                    {!! nl2br($pemilihan->keterangan) !!}</h5>
                </div>
                <hr class="sidebar-divider">
                <form action="{{url('/simpan-pemilihan')}}" class="form-inline" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" value="{{ $dec }}" name="id_pemilihan">
                  @forelse($calon as $item)
                    <div class="card-body">
                      <div class="col-auto">
                        <div class="text-center">

                        <h5>
                          <label class="radio-inline">
                            <input type="radio" required="" name="id_calon" value="{{ $item->id_calon}}">&nbsp; {{ $item->nama}}
                          </label>
                        </h5><br>
                        <label class="text-center" for="">
                          <a href="{{url('/assets/fotocalon/'.$item->image)}}" target="_blank">
                          <img class="card-img-top" src="{{url('/assets/fotocalon/'.$item->image)}}" alt="{{$item->image}}" style="width:125px; height:125px; margin-bottom: 12px" />
                        </a>
                        </label>
                        <br>  
                        <h6>Keterangan : <br>
                          {!! nl2br($item->keterangan)!!}
                        </h6>
                        </div>
                      </div>
                    </div>
                  @empty
                  <div class="container">
                    <h3 align="center">Tidak Ada Calon</h3>
                  </div>
                  @endforelse

                  <div class="col-sm-12 mt-3 text-center">
                    <hr class="sidebar-divider">

                    <label for="image"><b>Ambil Foto Pemilih ( Format gambar : png, jpg, jpeg dan ukuran maksimal : 2 mb )</b></label>
                    <input type="file" class="form-control mt-3 mb-3 @error('image') is-invalid @enderror" name="image" required="" />
                    @error('image') <div class="text-danger">{{$message}}</div> @enderror
                    <br>
                    <hr class="sidebar-divider">
                    <a href="{{ $info['btn_submit'] }}" style="{{ $info['style'] }}" class="btn btn-primary col-sm-6 mt-3 mb-3 mb-sm-0"  data-toggle="modal" data-target="#simpan">
                    <i class="fas fa-fw fa-paper-plane"></i>
                    Simpan
                    </a>
                  </div>
                    
                    <div class="modal fade" id="simpan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Simpan Data?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                          <div class="modal-body">Apakah Anda Yakin dengan pilihan anda?</div>
                                
                          <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary" href="">Yakin</button>
                          </div>
                        </div>
                      </div>
                    </div>

                </form>
              </div>
              @else
              <div class="card-body">
                <h4>Tidak Ada Pemilihan yang Tersedia</h4>
              </div>
              @endif
            </div>

          </div>
        </div>
    </div>
  <!-- /.container-fluid -->
@endsection

@push('radio')
  <style>
    input[type="radio"] {
        -ms-transform: scale(1.5); /* IE 9 */
        -webkit-transform: scale(1.5); /* Chrome, Safari, Opera */
        transform: scale(1.5);
    }
  </style>

@endpush