<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Log in</title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="{{ asset('adminLTE/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/iCheck/square/blue.css') }}">
  <link rel="shortcut icon" href="{{asset('images/api.jpg')}}" type="image/x-icon">
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="{{ asset('images/logo.png') }}" width="200">
  </div>

  <div class="login-box-body">
    <p class="login-box-msg">Login to dashboard</p>

    <form action="{{ route('login') }}" method="post">
    {{ csrf_field() }}

      <div class="form-group has-feedback">
        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
        @error('email')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>Email atau Password yang anda masukkan salah !</strong>
            </span>
        @enderror
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>Password anda salah !</strong>
            </span>
        @enderror
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group row">
            <div class="form-check">
                <div class="col-xs-8">
                  <div class="checkbox icheck">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              
                      <label class="form-check-label" for="remember">
                          {{ __('Remember Me') }}
                      </label>
                </div>
          </div>
        </div>

        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>

      </div>
    </form>

  </div>

</div>

<script src="{{ asset('adminLTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('adminLTE/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' 
    });
  });
</script>
</body>
</html>
