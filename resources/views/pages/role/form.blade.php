@extends('layouts.default')
@section('title',$actionName)
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
                <strong>{{$actionName}}</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h4>{{$actionName}}</h4>
            </div>
            <div class="ibox-content">
              <form method="POST" action="/role/store"class="form-horizontal">

                 {{csrf_field()}}
                 <input type="hidden" name="id" value="{{isset($role)? $role->id : ''}}"/>
                 <div class="form-group"><label class="col-sm-2 control-label">Label</label>
                    <div class="col-sm-4"><input type="text" name="label" value="{{isset($role)? $role->label : old('label')}}" class="form-control" placeholder="Full Name" required></div>
                    @if ($errors->has('label'))
                        <span class="help-block">
                            <strong>{{ $errors->first('label') }}</strong>
                        </span>
                    @endif
                 </div>

                 <div class="form-group">
                     <div class="col-sm-4 col-sm-offset-2">
                         <a href="/role" class="btn btn-white">Cancel</a>
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
