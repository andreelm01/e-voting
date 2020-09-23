@extends('user_layout')
@section('title', 'Update password')
@section('user_content')    

    <div class="container-fluid">
      <nav aria-label="breadcrumb" class="d-none d-sm-block">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('user')}}">Dashboard</a></li>
          <li class="breadcrumb-item active"><a href="#">Ganti Password</a></li>
        </ol>
        <button class="btn btn-info" onclick="window.history.go(-1)"><i class="fa fa-arrow-left"></i> Back</button>
      </nav>

      <hr class="sidebar-divider">
      <div class="row">
        <div class="col-lg-10">
          <div class="p-1">
            {{-- form input new data --}}
            <form class="user" action="{{ route('user-password.update', encrypt($user->id)) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="form-group row">
                <input type="hidden" name="token" value="">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="password"><b>Password ( Update Password anda jika pertama kali login! )</b></label>
                  <div class="input-group">
                    
                    <input type="password" autocomplete="on" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required="" value=""/>

                    <span class="input-group-btn">
                    <button class="btn btn-default btn-lg reveal"  onclick="myFunction()" type="button"><i class="fas fa-fw fa-eye"></i></button>
                    </span>
                    @error('password') <div class="text-danger">{{$message}}</div> @enderror
                  </div>
                </div>
              </div>

              <!-- Divider/garis -->
              <hr class="sidebar-divider">
              {{-- btn submit --}}
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

@endpush