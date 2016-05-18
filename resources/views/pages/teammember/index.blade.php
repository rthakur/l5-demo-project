@extends('layouts.default')
@section('title', 'Manage Users')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-10">
      <h2></h2>
      <ol class="breadcrumb">
          <li>
              <a href="/">Home</a>
          </li>
          <li>
              <a href="/user">{{$teamleader->name}}</a>
          </li>
          <li class="active">
              <strong>Manage Team Members</strong>
          </li>
      </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Members List</h5>
                <div class="ibox-tools">
                  <a href="/teammember/create/{{$teamleader->id}}" class="btn-primary btn text-right"><i class="fa fa-plus" aria-hidden="true"></i> Add Team Member</a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                  @include('pages.teammember.list')
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
