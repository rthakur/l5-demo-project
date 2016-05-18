@extends('layouts.default')
@section('title', isset($user)? 'Edit Team Member' : 'Create Team Member')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2></h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">Home</a>
            </li>
            <li>
                <a href="/user">users</a>
            </li>
            <li class="active">
                <strong>  {{isset($user)? 'Edit' : 'Create'}} Team Member</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h4>{{isset($user)? 'Edit' : 'Create'}} Team Member</h4>
            </div>
            <div class="ibox-content">
              <form method="POST" action="/teammember/store"class="form-horizontal">
                 {{csrf_field()}}
                 <input type="hidden" name="teamlead_id" value="{{isset($id)? $id : ''}}">
                 <input type="hidden" name="id" value="{{isset($user)? $user->id : ''}}"/>
                 <div class="form-group"><label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-4"><input type="text" name="name" value="{{isset($user)? $user->name : old('name')}}" class="form-control" placeholder="Full Name" required></div>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                 </div>
                 <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-4"><input type="email" name="email" value="{{isset($user)? $user->email : old('email')}}" class="form-control" placeholder="Email" required></div>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                 </div>
                 <div class="form-group"><label class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-4"><input type="text" name="password" value="" class="form-control" placeholder="Password" {{isset($user)? '' : 'required'}}></div>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                 </div>
                 <div class="form-group">
                     <div class="col-sm-4 col-sm-offset-2">
                         <a href="/user" class="btn btn-white">Cancel</a>
                         <button class="btn btn-primary" type="submit">Create</button>
                     </div>
                 </div>
             </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
