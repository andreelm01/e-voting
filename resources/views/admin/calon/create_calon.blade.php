@extends('admin_layout')
@section('title', 'Tambah Calon')
@section('admin_content')    

    <div class="container-fluid">
      <nav aria-label="breadcrumb" class="d-none d-sm-block">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('administrator')}}">Dashboard</a></li>
          <li class="breadcrumb-item active"><a href="{{route('admin-calon.index')}}">Data Calon</a></li>
          <li class="breadcrumb-item active"><a href="#">Tambah Calon</a></li>
        </ol>
        <button class="btn btn-info" onclick="window.history.go(-1)"><i class="fa fa-arrow-left"></i> Back</button>
      </nav>

      <hr class="sidebar-divider">
      <div class="row">
        <div class="col-lg-10">
          <div class="p-1">
            {{-- form input new data --}}
            <form class="user" action="{{ route('admin-calon.store') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="id_pemilihan"><b>ID Pemilihan</b></label>
                  <select name="id_pemilihan" id="id_pemilihan" class="form-control @error('id_pemilihan') is-invalid @enderror" required="">
                  <option value="0">ID Pemilihan</option>
                  @foreach ($items as $item)
                    <option value="{{$item->id_pemilihan}}">{{$item->id_pemilihan}}</option>
                  @endforeach
                  </select>
                  @error('id_pemilihan') <div class="text-danger">{{$message}}</div> @enderror
                </div>
                <div class="col-sm-6">
                  <label for="id_calon"><b>ID Calon</b></label>
                  <input type="text" class="form-control form-control-user @error('id_calon') is-invalid @enderror" name="id_calon" required="" placeholder="ID Calon" value="{{old('id_calon')}}"/>
                  @error('id_calon') <div class="text-danger">{{$message}}</div> @enderror
                </div>
              </div>

              <hr class="sidebar-divider">

              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="nama"><b>Nama</b></label>
                  <input type="text" class="form-control form-control-user @error('nama') is-invalid @enderror" name="nama" value="{{old('nama')}}" required="" placeholder="Nama" />
                  @error('nama') <div class="text-danger">{{$message}}</div> @enderror
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="image"><b>Gambar ( Format gambar : png, jpg, jpeg dan ukuran maksimal : 2 mb )</b></label>
                  <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" required="" />
                  @error('image') <div class="text-danger">{{$message}}</div> @enderror
                </div>
              </div>

              <hr class="sidebar-divider">

            <div class="form-group row">
              <div class="col-sm-6">
                <label for="keterangan"><b>Keterangan</b></label><br>
                <textarea class="resizable_textarea form-control @error('keterangan') is-invalid @enderror" name="keterangan" required="" placeholder="Keterangan" id="keterangan">{{ old('keterangan') }}</textarea>
                @error('keterangan') <div class="text-danger">{{$message}}</div> @enderror
              </div>
            </div>
              
              <!-- Divider/garis -->
              <hr class="sidebar-divider">
              {{-- btn submit --}}
              <button type="submit" onclick=" return generateID();" class="btn btn-primary btn-user col-sm-6 mb-3 mb-sm-0">
              <i class="fas fa-fw fa-paper-plane"></i>
              Tambah Calon
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('password') 
  <script>
    $(".reveal").on('click',function() {
      var $pwd = $(".pwd");
      if ($pwd.attr('type') === 'password') {
          $pwd.attr('type', 'text');
      } else {
          $pwd.attr('type', 'password');
      }
      });

      $(".reveal1").on('click',function() {
      var $pwd = $(".pwd1");
      if ($pwd.attr('type') === 'password') {
          $pwd.attr('type', 'text');
      } else {
          $pwd.attr('type', 'password');
      }
      });
  </script>

  <script type="text/javascript">
    jQuery(document).ready(function ()
    {
      jQuery('select[name="no_rw"]').on('change',function(){
         var no_rw = jQuery(this).val();
         var url = '{{ route("getRT", ":no_rw") }}';

         if(no_rw)
         {
            jQuery.ajax({
               url : '{{url('/getRT')}}'+'/'+no_rw,
               type : "GET",
               dataType : "json",
               success:function(data)
               {
                  console.log(data);
                  jQuery('select[name="no_rt"]').empty();
                  jQuery.each(data, function(key,value){
                     $('select[name="no_rt"]').append('<option value="'+ key +'">'+ value +'</option>');
                  });
               }
            });
         }
         else
         {
            $('select[name="no_rt"]').empty();
         }
      });
    });
  </script>

  
@endpush