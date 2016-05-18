@extends('layouts.auth')
@section('title', 'Password Reset')

<!-- Main Content -->
@section('content')

       <p class="password-reset-text">
           Enter your email address and your password will be reset and emailed to you.
       </p>
       @if (session('status'))
           <div class="alert alert-success">
               {{ session('status') }}
           </div>
       @endif
       <div class="row">

           <div class="col-lg-12">
               <form class="m-t" role="form" method="POST" action="{{ url('/password/email') }}">
                   {!! csrf_field() !!}
                   <div class="form-group">
                       <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email address" required="">

                       @if ($errors->has('email'))
                           <span class="help-block">
                               <strong>{{ $errors->first('email') }}</strong>
                           </span>
                       @endif
                   </div>

                   <button type="submit" class="btn btn-primary block full-width m-b">Send new password</button>

               </form>
           </div>
       </div>
@endsection
