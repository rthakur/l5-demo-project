    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>File Name</th>
            <th>File Description</th>
            <th>File Type</th>
            <th>Created At</th>
            @if(Auth::user()->role_id != '5')
              <th>Uploaded By</th>
            @endif
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach($files as $file)
          <tr>
              <td>{{$file->id}}</td>
              <td>{{$file->original_name}}</td>
              <td>{{$file->description}}</td>
               <td>{{$file->file_type}}</td>
               <td>{{$file->created_at}}</td>

               @if(Auth::user()->role_id != '5')
                 <td>{{isset($file->user)? $file->user->name : ''}}</td>
               @endif
              <td class="text-center">
                <form action="/filemanager/destroy" method="POST">
                  {{csrf_field()}}
                  <a href="/filemanager/file/{{$file->id}}" class="btn btn-sm btn-outline btn-success"><i class="fa fa-download"></i> Download</a>
                  @if(Auth::user()->role_id == 5)
                  <input type="hidden" name="id" value="{{$file->id}}" />
                  <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-outline btn-primary"> <i class="fa fa-trash"></i> Delete</button>
                  @endif
                </form>
              </td>
          </tr>
          @endforeach
        </tbody>
    </table>
