@extends('admin_layout')
@section('title', 'Tambah User')
@section('admin_content')    

    <div class="container-fluid">
      <nav aria-label="breadcrumb" class="d-none d-sm-block">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('administrator')}}">Dashboard</a></li>
          <li class="breadcrumb-item active"><a href="{{route('admin-user.index')}}">Data User</a></li>
          <li class="breadcrumb-item active"><a href="#">Tambah User</a></li>
        </ol>
        <button class="btn btn-info" onclick="window.history.go(-1)"><i class="fa fa-arrow-left"></i> Back</button>
      </nav>

      <hr class="sidebar-divider">
      <div class="row">
        <div class="col-lg-10">
          <div class="p-1">
            {{-- form input new data --}}
            <form class="user" action="{{ route('admin-user.store') }}" method="POST">
              @csrf
              
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="id_user"><b>ID User </b></label>
                  <input type="text" class="form-control form-control-user @error('id_user') is-invalid @enderror" name="id_user" id="id_user" required="" value="{{ $r }}" readonly="" placeholder="ID User" />
                  @error('id_user') <div class="text-danger">{{$message}}</div> @enderror
                </div>

                <div class="col-sm-6">
                  <label for="nama"><b>Nama</b></label>
                  <input type="text" class="form-control form-control-user @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Nama" required=""/>
                  @error('nama') <div class="text-danger">{{$message}}</div> @enderror
                </div>

              </div>

              <hr class="sidebar-divider">

              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="alamat"><b>Alamat</b></label><br>
                  <textarea class="resizable_textarea form-control @error('alamat') is-invalid @enderror" name="alamat" required="" placeholder="Alamat" id="alamat">{{ old('alamat') }}</textarea>
                  @error('alamat') <div class="text-danger">{{$message}}</div> @enderror
                </div>

                <div class="col-sm-6">
                  <label for="no_rumah"><b>No. Rumah</b></label>
                  <input type="text" class="form-control form-control-user @error('no_rumah') is-invalid @enderror" name="no_rumah" id="no_rumah" value="{{ old('no_rumah') }}" placeholder="No. Rumah" required=""/>
                  @error('no_rumah') <div class="text-danger">{{$message}}</div> @enderror
                </div>

              </div>

              <hr class="sidebar-divider">

              <div class="form-group row">
                <div class="col-sm-3 mb-3 mb-sm-0">
                  <label for="no_rw"><b>No. RW</b></label>
                  <select name="no_rw" id="no_rw" required="" class="form-control @error('no_rw') is-invalid @enderror" required="">
                    <option value="0">Pilih No. RW</option>
                    @foreach ($rw as $key => $value)
                    <option value="{{$value}}">{{$value}}</option>
                    @endforeach
                  </select>
                    @error('no_rw') <div class="text-danger">{{$message}}</div> @enderror
                </div>

                <div class="col-sm-3 mb-3 mb-sm-0">
                  <label for="no_rt"><b>No. RT</b></label>
                  <select name="no_rt" id="no_rt" class="form-control @error('no_rt') is-invalid @enderror" required="">
                  <option value="0">No. RT</option>
                  </select>
                    @error('no_rw') <div class="text-danger">{{$message}}</div> @enderror
                </div>

                <div class="col-sm-6">
                  <label for="username"><b>Username</b></label>
                  <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror" name="username" placeholder="Username" required="" value="{{ old('username')}}"/>
                  @error('username') <div class="text-danger">{{$message}}</div> @enderror
                </div>
              </div>

              <hr class="sidebar-divider">

              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="password"><b>Password</b></label>
                  <div class="input-group">
                    <input type="password" autocomplete="on" class="form-control form-control-user pwd @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required="" value="{{ old('password')}}"/>

                    <span class="input-group-btn">
                    <button class="btn btn-default btn-lg reveal"  onclick="myFunction()" type="button"><i class="fas fa-fw fa-eye"></i></button>
                    </span>
                    @error('password') <div class="text-danger">{{$message}}</div> @enderror
                  </div>
                </div>

                <input type="hidden" id="id_pemilihan" name="id_pemilihan" readonly="">
              </div>

              <!-- Divider/garis -->
              <hr class="sidebar-divider">
              {{-- btn submit --}}
              <button type="submit" onclick="generateIDPemilihan();" class="btn btn-primary btn-user col-sm-6 mb-3 mb-sm-0">
              <i class="fas fa-fw fa-paper-plane"></i>
              Tambah Data
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('password')
  <script>
    function myFunction() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
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

  <script>
    function generateIDPemilihan() {
      var rw = document.getElementById('no_rw').value;
      var rt = document.getElementById('no_rt').value;

      document.getElementById('id_pemilihan').value = rw + "-" + rt;
       }
  </script>
  
@endpush