<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FMS | Register</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  @include("partials.style")
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{ route('home') }}"><b>FMS Registration</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Register</p>

    <form novalidate="novalidate" autocomplete="new-password" method="POST" action="{{ route('register') }}">
      @csrf

      <div class="form-group row">
          <label for="name" class="col-md-8 col-form-label text-md-right">{{ __('Name') }}</label>

          <div class="col-md-12{{ $errors->has('name') ? ' has-error' : '' }}">
              <input autocomplete="new-password" id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

              @if ($errors->has('name'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group row">
          <label for="phone" class="col-md-8 col-form-label text-md-right">{{ __('Phone ') }}</label>

          <div class="col-md-12{{ $errors->has('phone') ? ' has-error' : '' }}">
              <input autocomplete="new-password" id="phone" type="number" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>

              @if ($errors->has('phone'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('phone') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group row">
          <label for="employeeid" class="col-md-8 col-form-label text-md-right">{{ __('Employee Number') }}</label>

          <div class="col-md-12{{ $errors->has('employeeid') ? ' has-error' : '' }}">
              <input autocomplete="new-password" id="employeeid" type="text" class="form-control" name="employeeid" value="{{ old('employeeid') }}" required autofocus>

              @if ($errors->has('employeeid'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('employeeid') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group row">
          <label for="unit_id" class="col-md-8 col-form-label text-md-right">{{ __('Employee Unit') }}</label>

          <div class="col-md-12{{ $errors->has('unit_id') ? ' has-error' : '' }}">
              <select class="form-control" id="unit_id" name="unit_id">
                  <option value=""></option>
                  @foreach($units as $unit)
                      <option value="{{$unit->id}}" @if (old('unit_id') == $unit->id) {{ 'selected' }} @endif>{{$unit->name}}</option>
                  @endforeach
              </select>

              @if ($errors->has('unit_id'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('unit_id') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group row">
          <label for="email" class="col-md-8 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

          <div class="col-md-12{{ $errors->has('email') ? ' has-error' : '' }}">
              <input id="email" autocomplete="new-password" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

              @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group row">
          <label for="password" class="col-md-8 col-form-label text-md-right">{{ __('Password') }}</label>

          <div class="col-md-12{{ $errors->has('password') ? ' has-error' : '' }}">
              <input id="password" autocomplete="new-password" type="password" class="form-control" name="password" required>

              @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group row">
          <label for="password-confirm" class="col-md-8 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

          <div class="col-md-12">
              <input autocomplete="new-password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
          </div>
      </div>


      <div class="form-group row mb-0">
          <div class="col-md-12 offset-md-4">
              <button type="submit" class="btn btn-primary">
                  {{ __('Register') }}
              </button>
          </div>
      </div>
    </form>
    <a href="{{ route('login') }}" class="text-center">I already have an account</a>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@include("partials.scripts")
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
