<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        @if(Auth::user()->role_id == '1')
        <th>Role</th>
        <th>Created By</th>
        @endif
        <th width="30%" class="text-center">Action</th>
    </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
          <td>{{$user->id}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          @if(Auth::user()->role_id == '1')
           <td>{{isset($user->role->label)? $user->role->label : ''}}</td>
           <td>{{$user->createBy()}}</td>
          @endif

          <td width="25%" class="text-center">
             <form action="/user/delete" method="POST">
               {{csrf_field()}}
               @if(Auth::user()->role_id == '3')
                 <a href="/teammember/manage/{{$user->id}}" class="btn btn-sm btn-outline btn-success">Teammembers</a>
               @endif

               @if(Auth::user()->role_id != '4')
               <a href="/user/edit/{{$user->id}}" class="btn btn-sm btn-outline btn-primary"><i class="fa fa-pencil"></i> Edit</a>
               <input type="hidden" name="id" value="{{$user->id}}" />
               <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-outline btn-primary"> <i class="fa fa-trash"></i> Delete</button>
               @endif
             </form>
          </td>
      </tr>
      @endforeach
    </tbody>
</table>
