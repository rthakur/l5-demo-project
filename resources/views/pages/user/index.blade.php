@extends('layouts.default')
@section('title', 'Manage '.$actionName)
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-sm-4">
          <div class="col-lg-10">
              <h2>Manage {{$actionName}}</h2>
          </div>
      </div>
</div>
<div class="wrapper wrapper-content">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{$actionName}} List</h5>

                @if(Auth::user()->role_id != '4')
                <div class="ibox-tools">
                  <a href="/user/create" class="btn-primary btn text-right"><i class="fa fa-plus" aria-hidden="true"></i> Add {{$actionName}}</a>
                </div>
                @endif

            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                  @include('pages.user.list')
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
