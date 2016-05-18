@extends('layouts.auth')
@section('title', 'Password Reset')
<!-- Main Content -->
@section('content')

      <h2 class="font-bold">Password Reset</h2>
      @if (session('status'))
           <div class="alert alert-success">
               {{ session('status') }}
           </div>
       @endif
       <div class="row">
           <div class="col-lg-12">
               <form class="m-t" role="form" method="POST" action="{{ url('/password/reset') }}">
                 <input type="hidden" name="token" value="{{ $token }}">
                   {!! csrf_field() !!}
                   <div class="form-group">
                       <input type="email" name="email" value="{{ $email or old('email') }}" class="form-control" placeholder="Email address" required="">

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
                   <div class="form-group">
                       <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required="">
                       @if ($errors->has('password_confirmation'))
                           <span class="help-block">
                               <strong>{{ $errors->first('password_confirmation') }}</strong>
                           </span>
                       @endif
                   </div>
                   <button type="submit" class="btn btn-primary block full-width m-b"> <i class="fa fa-btn fa-refresh"></i> Reset Password</button>
               </form>
           </div>
       </div>
@endsection
