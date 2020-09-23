@extends('admin_layout')
@section('title', 'Edit Pemilihan')
@section('admin_content')    

    <div class="container-fluid">
      <nav aria-label="breadcrumb" class="d-none d-sm-block">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('administrator')}}">Dashboard</a></li>
          <li class="breadcrumb-item active"><a href="{{route('admin-pemilihan.index')}}">Data User</a></li>
          <li class="breadcrumb-item active"><a href="#">Edit Pemilihan</a></li>
        </ol>
        <button class="btn btn-info" onclick="window.history.go(-1)"><i class="fa fa-arrow-left"></i> Back</button>
      </nav>

      <hr class="sidebar-divider">
      <div class="row">
        <div class="col-lg-10">
          <div class="p-1">
            {{-- form input new data --}}
            <form class="user" action="{{ route('admin-pemilihan.update', $admin_pemilihan->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="id_pemilihan"><b>ID Pemilihan</b></label>
                  <input type="text" class="form-control form-control-user @error('id_pemilihan') is-invalid @enderror" name="id_pemilihan" id="id_pemilihan" required="" placeholder="ID Pemilihan" readonly="" value="{{ $admin_pemilihan->id_pemilihan }}" />
                  @error('id_pemilihan') <div class="text-danger">{{$message}}</div> @enderror
                </div>

                <div class="col-sm-6">
                  <label for="keterangan"><b>Keterangan</b></label><br>
                  <textarea class="resizable_textarea form-control @error('keterangan') is-invalid @enderror" name="keterangan" required="" placeholder="Keterangan" id="keterangan">{!! html_entity_decode($admin_pemilihan->keterangan)!!}</textarea>
                  @error('keterangan') <div class="text-danger">{{$message}}</div> @enderror
                </div>
              </div>

              <hr class="sidebar-divider">

              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="no_rw"><b>No. RW : {{ $admin_pemilihan->no_rw }} &nbsp;&nbsp; ( Kosongkan jika tidak merubah! )</b></label>
                  <input type="hidden" name="token_rw" value="{{ $admin_pemilihan->no_rw }}" readonly="">

                  <select name="no_rw" id="no_rw" class="form-control @error('no_rw') is-invalid @enderror">
                    <option value="">Pilih No. RW</option>
                    @foreach ($rw as $key => $value)
                    <option value="{{$key}}">{{$value}}</option>
                    @endforeach                    
                  </select>
                    @error('no_rw') <div class="text-danger">{{$message}}</div> @enderror
                </div>

                <div class="col-sm-6">
                  <label for="no_rt"><b>No. RT : {{ $admin_pemilihan->no_rt }} &nbsp;&nbsp; ( Kosongkan jika tidak merubah! )</b></label>
                  <input type="hidden" name="token_rt" value="{{ $admin_pemilihan->no_rt }}" readonly="">

                  <select name="no_rt" id="no_rt" class="form-control @error('no_rt') is-invalid @enderror" >
                  </select>
                    @error('no_rw') <div class="text-danger">{{$message}}</div> @enderror
                </div>
              </div>

              <!-- Divider/garis -->
              <hr class="sidebar-divider">
              {{-- btn submit --}}
              <button type="submit" onclick=" return generateID();" class="btn btn-primary btn-user col-sm-6 mb-3 mb-sm-0">
              <i class="fas fa-fw fa-paper-plane"></i>
              Edit Pemilihan
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('password')

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

  <script>
    function generateID() {
      var rw = document.getElementById('no_rw').value;
      var rt = document.getElementById('no_rt').value;

      document.getElementById('id_pemilihan').value = rw + "-" + rt;
       }
  </script>
@endpush