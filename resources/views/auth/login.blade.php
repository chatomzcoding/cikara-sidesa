@php
	$info = App\Models\Infowebsite::first(); 
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bumdes - Login</title>
  <link href="{{  asset('img/'.$info->logo_brand)}}" rel="icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('template/admin/lte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('template/admin/lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/admin/lte/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page" style="background-image: url({{ asset('img/bg-login.jpg')}}); background-size : cover;
background-position: center; width : auto;
background-repeat: no-repeat;">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <img src="{{ asset('img/bumdes-logo.png') }}" alt="" width="50%"><br>
      <h3 class="font-weight-bold">Jantung Desa</h3>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        @if ($error == 'These credentials do not match our records.')
                            Username dan Password tidak sesuai
                        @else
                            {{ $error }}
                        @endif
                    @endforeach
            </div>
        @endif
      <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <button type="submit" class="btn btn-outline-primary btn-block">MASUK</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <hr>
      <p class="mt-3 mb-0 small">
        <a href="{{ url('index') }}"><i class="fas fa-home"></i> Halaman Utama</a>
        <a href="http://cikarastudio.com/" target="_blank" class="float-right">CIKARA STUDIO</a>
      </p>
      {{-- <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> --}}
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('templatepadmin/lte/lugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('templatepadmin/lte/lugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('templatedadmin/lte/ist/js/adminlte.min.js')}}"></script>
</body>
</html>
