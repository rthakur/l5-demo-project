@extends('layouts.auth')
@section('title', 'Login')

@section('content')
    <form class="m-t" role="form" method="POST" action="{{ url('/login') }}">
          {!! csrf_field() !!}
          <div class="form-group">
              <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" required="">
              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
          </div>
          <div class="form-group">
              <input type="password" name="password" class="form-control" placeholder="Password" required="">
              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
          </div>
          <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

          <a href="{{ url('/password/email') }}"><small>Forgot password?</small></a>
          <p class="text-muted text-center"><small>Do not have an account?</small></p>
      </form>
@endsection
