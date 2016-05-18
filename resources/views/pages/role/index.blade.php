@extends('layouts.default')
@section('title', 'Manage Role ','Role')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-sm-4">
          <div class="col-lg-10">
              <h2>Manage Role</h2>
          </div>
      </div>
</div>
<div class="wrapper wrapper-content">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Role List</h5>
              <!--  <div class="ibox-tools">
                  <a href="/role/create" class="btn-primary btn text-right"><i class="fa fa-plus" aria-hidden="true"></i> Add Role</a>
                </div>-->
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                  @include('pages.role.list')
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
