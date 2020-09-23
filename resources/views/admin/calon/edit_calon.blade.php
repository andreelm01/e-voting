@extends('admin_layout')
@section('title', 'Edit Calon')
@section('admin_content')    

    <div class="container-fluid">
      <nav aria-label="breadcrumb" class="d-none d-sm-block">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('administrator')}}">Dashboard</a></li>
          <li class="breadcrumb-item active"><a href="{{route('admin-calon.index')}}">Data Calon</a></li>
          <li class="breadcrumb-item active"><a href="#">Edit Calon</a></li>
        </ol>
        <button class="btn btn-info" onclick="window.history.go(-1)"><i class="fa fa-arrow-left"></i> Back</button>
      </nav>

      <hr class="sidebar-divider">
      <div class="row">
        <div class="col-lg-10">
          <div class="p-1">
            {{-- form input new data --}}
            <form class="user" action="{{ route('admin-calon.update', $admin_calon->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="id_pemilihan"><b>ID Pemilihan</b></label>
                  <select name="id_pemilihan" id="id_pemilihan" class="form-control @error('id_pemilihan') is-invalid @enderror" required="">
                  <option value="0">ID Pemilihan</option>
                  @foreach ($items as $item)
                    <option value="{{$item->id_pemilihan}}" {{$admin_calon->id_pemilihan == $item->id_pemilihan ? 'selected' : ''}}>{{$item->id_pemilihan}}</option>
                    @endforeach
                  </select>  
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="id_calon"><b>ID Calon</b></label>
                  <input type="text" class="form-control form-control-user @error('id_calon') is-invalid @enderror" name="id_calon" value="{{ old('id_calon') ? old('id_calon') : $admin_calon->id_calon }}" required="" placeholder="ID Calon" />
                  @error('id_calon') <div class="text-danger">{{$message}}</div> @enderror
                </div>
              </div>

              <hr class="sidebar-divider">

              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="nama"><b>Nama</b></label>
                  <input type="text" value="{{ old('nama') ? old('nama') : $admin_calon->nama }}" class="form-control form-control-user @error('nama') is-invalid @enderror" name="nama" required="" placeholder="Nama" />
                  @error('nama') <div class="text-danger">{{$message}}</div> @enderror
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="image"><b>Gambar ( Format gambar : png, jpg, jpeg dan ukuran maksimal : 2 mb )</b></label>
                  <br>
                  <input type="hidden" class="form-control" name="gambar_old" value="{{$admin_calon->image}}" readonly="" />
                  <a href="{{url('/assets/fotocalon/'.$admin_calon->image)}}" target="_blank">
                    <img src="{{url('/assets/fotocalon/'.$admin_calon->image)}}" alt="{{$admin_calon->image}}" style="width:125px; height:125px; margin-bottom: 12px" />
                  </a>
                  <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" />
                  @error('image') <div class="text-danger">{{$message}}</div> @enderror
                </div>
              </div>

              <hr class="sidebar-divider">

            <div class="form-group row">
              <div class="col-sm-6">
                <label for="keterangan"><b>Keterangan</b></label><br>
                <textarea class="resizable_textarea form-control @error('keterangan') is-invalid @enderror" name="keterangan" required="" placeholder="Keterangan" id="keterangan">{!! html_entity_decode($admin_calon->keterangan)!!}</textarea>
                @error('keterangan') <div class="text-danger">{{$message}}</div> @enderror
              </div>
            </div>
              
              <!-- Divider/garis -->
              <hr class="sidebar-divider">
              {{-- btn submit --}}
              <button type="submit" onclick=" return generateID();" class="btn btn-primary btn-user col-sm-6 mb-3 mb-sm-0">
              <i class="fas fa-fw fa-paper-plane"></i>
              Edit Calon
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