@extends('admin_layout')
@section('title', 'Edit User')
@section('admin_content')    

    <div class="container-fluid">
      <nav aria-label="breadcrumb" class="d-none d-sm-block">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('administrator')}}">Dashboard</a></li>
          <li class="breadcrumb-item active"><a href="{{route('admin-user.index')}}">All User</a></li>
          <li class="breadcrumb-item active"><a href="#">Edit User</a></li>
        </ol>
        <button class="btn btn-info" onclick="window.history.go(-1)"><i class="fa fa-arrow-left"></i> Back</button>
      </nav>

      <hr class="sidebar-divider">
      <div class="row">
        <div class="col-lg-10">
          <div class="p-1">
            {{-- form input new data --}}
            <form class="user" action="{{ route('admin-user.update', $admin_user->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="id_user"><b>ID User</b></label>
                  <input type="text" readonly="" class="form-control form-control-user @error('id_user') is-invalid @enderror" name="id_user" id="id_user" required="" placeholder="ID User" value="{{ $admin_user->id_user }}" />
                  @error('id_user') <div class="text-danger">{{$message}}</div> @enderror
                </div>

                <div class="col-sm-6">
                  <label for="nama"><b>Nama</b></label>
                  <input type="text" class="form-control form-control-user @error('nama') is-invalid @enderror" name="nama" value="{{ $admin_user->nama }}" placeholder="Nama" required=""/>
                  @error('nama') <div class="text-danger">{{$message}}</div> @enderror
                </div>

              </div>

              <hr class="sidebar-divider">

              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="alamat"><b>Alamat</b></label><br>
                  <textarea class="resizable_textarea form-control @error('alamat') is-invalid @enderror" name="alamat" required="" placeholder="Alamat" id="alamat">{!! html_entity_decode($admin_user->alamat)!!}</textarea>
                  @error('alamat') <div class="text-danger">{{$message}}</div> @enderror
                </div>

                <div class="col-sm-6">
                  <label for="no_rumah"><b>No. Rumah</b></label>
                  <input type="text" class="form-control form-control-user @error('no_rumah') is-invalid @enderror" name="no_rumah" value="{{ $admin_user->no_rumah }}" id="no_rumah" placeholder="No. Rumah" required=""/>
                  @error('no_rumah') <div class="text-danger">{{$message}}</div> @enderror
                </div>

              </div>

              <hr class="sidebar-divider">

              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="no_rw"><b>No. RW : {{ $admin_user->no_rw }} &nbsp;&nbsp; ( Kosongkan jika tidak merubah! )</b></label>
                  <input type="hidden" name="token_rw" value="{{ $admin_user->no_rw }}" readonly="">

                  <select name="no_rw" id="no_rw" class="form-control @error('no_rw') is-invalid @enderror">
                    <option value="">Pilih No. RW</option>
                    @foreach ($rw as $key => $value)
                    <option value="{{$value}}">{{$value}}</option>
                    @endforeach                    
                  </select>
                    @error('no_rw') <div class="text-danger">{{$message}}</div> @enderror
                </div>

                <div class="col-sm-6">
                  <label for="no_rt"><b>No. RT : {{ $admin_user->no_rt }} &nbsp;&nbsp; ( Kosongkan jika tidak merubah! )</b></label>
                  <input type="hidden" name="token_rt" value="{{ $admin_user->no_rt }}"  readonly="">

                  <select name="no_rt" id="no_rt" class="form-control @error('no_rt') is-invalid @enderror" >
                  </select>
                  @error('no_rt') <div class="text-danger">{{$message}}</div> @enderror
                </div>
              </div>

              <hr class="sidebar-divider">

              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="username"><b>Username</b></label>
                  <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror" name="username" placeholder="Username" required="" value="{{ $admin_user->username }}"/>
                  @error('username') <div class="text-danger">{{$message}}</div> @enderror
                </div>

                <div class="col-sm-6">
                  <label for="password"><b>Password ( Kosongkan jika tidak merubah! )</b></label>
                  <div class="input-group">
                    <input type="hidden" name="token" value="{{ $admin_user->password }}" readonly="">
                    
                    <input type="password" autocomplete="on" class="form-control form-control-user pwd @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" value="{{ old('password')}}"/>

                    <span class="input-group-btn">
                    <button class="btn btn-default btn-lg reveal"  onclick="myFunction()" type="button"><i class="fas fa-fw fa-eye"></i></button>
                    </span>
                    @error('password') <div class="text-danger">{{$message}}</div> @enderror
                  </div>
                </div>

                <input type="hidden" id="id_pemilihan" name="id_pemilihan" value="{{ $admin_user->id_pemilihan }}" readonly="">

                <input type="hidden" name="id_pemilihan_old" value="{{ $admin_user->id_pemilihan }}" readonly="">
              </div>

              <!-- Divider/garis -->
              <hr class="sidebar-divider">
              {{-- btn submit --}}
              <button type="submit" onclick="generateIDPemilihan();" class="btn btn-primary btn-user col-sm-6 mb-3 mb-sm-0">
              <i class="fas fa-fw fa-paper-plane"></i>
              Edit Data
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
                     $('select[name="no_rt"]').append('<option value="'+ value +'">'+ value +'</option>');
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

  <script type="text/javascript">
    function generateIDPemilihan() {
      var rw = document.getElementById('no_rw').value;
      var rt = document.getElementById('no_rt').value;

      document.getElementById('id_pemilihan').value = rw + "-" + rt;
       }
  </script>

@endpush