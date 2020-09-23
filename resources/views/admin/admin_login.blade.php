<!DOCTYPE html>
  <html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <!-- Meta, title, CSS, favicons, etc. -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>E-Voting</title>
      <link href="{{url('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">
      <link href="{{url('backend/css/admin_login.css')}}" rel="stylesheet">
      <link rel="shortcut icon" href="{{URL::to('backend/img/vote.jpg')}}">
      
    </head>
  <body>
    <div class="wrapper fadeInDown">
      <div id="formContent">
        <!-- Tabs Titles -->
        
        <!-- Icon -->
        <div class="fadeIn first">
          <img src="{{URL::to('backend/img/vote.jpg')}}" alt="TunasMitra" class="img-circle profile_img mt-3" style="height: 170px; width: 170px;">
          @if ($a = Session::get('notif'))
              <div class="alert alert-danger m-2">
                  <p><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ $a }}</p>
              </div>
          @endif
          <h5 class="m-0 mt-3 font-weight-bold text-primary" align="center"><b>Admin E-Voting</b></h5>
        </div>

        <!-- Login Form -->
        <form action="{{url('/admin-login-check')}}" method="POST">
          @csrf
          <input type="email" id="login" class="fadeIn second @error('admin_email') is-invalid @enderror" name="admin_email" placeholder="Email" required="">
          @error('admin_email') <div class="text-danger">{{$message}}</div> @enderror

          <input type="password" id="password" class="fadeIn third @error('admin_password') is-invalid @enderror" name="admin_password" placeholder="Password" required="">
          @error('admin_password') <div class="text-danger">{{$message}}</div> @enderror

          <input type="submit" class="fadeIn fourth" value="Log In">
        </form>
       <div id="formFooter">
          Copyright &copy; <a href="mailto:barnoxdev@gmail.com">barnoxdev@gmail.com</a> 2020
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{url('backend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{url('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  </body>
</html>