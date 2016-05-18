@extends('layouts.default')
@section('title', 'File Manager ','File Manager')
@section('content')
<!--Modal-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">File Upload</h4>
      </div>
      <form id="upload_file_form" method="post" action="/filemanager/store" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="modal-body">
              <div class="form-group">
                <label>Choose File</label>
              <input type="file" name="upload_file">
              </div>
              <div class="form-group">
                <label>File Description :</label>
                <textarea class="form-control" name="file_desc"></textarea>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="save_btn" class="btn btn-success pull-right" style="margin-left:10px;" data-dismiss="modal">
            <i class="fa fa-save"></i> Save
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--/Modal-->


<div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-sm-4">
          <div class="col-lg-10">
              <h2>Manage Files</h2>
          </div>
      </div>
</div>
<div class="wrapper wrapper-content">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
              @if (count($errors) > 0)
            <div class="alert alert-danger">
              <ul>
                <li>Invalid file extension</li>
              </ul>
            </div>
            @endif
                <h5>Files List</h5>

                @if(Auth::user()->role_id ==5)
                <div class="ibox-tools">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                  Upload Files
                  </button>
                </div>
                @endif
              </div>
            <div class="ibox-content">
                <div class="table-responsive">
                  @include('pages.file_manager.list')
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('extra_scripts')
<script>
  $('body').on('click','#save_btn',function(){
    $('#upload_file_form').submit();
  });
</script>
@endsection
