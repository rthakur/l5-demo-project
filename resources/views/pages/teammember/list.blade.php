<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th width="30%" class="text-center">Action</th>
    </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
          <td>{{$user->id. Auth::user()->role_id}} </td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td width="25%" class="text-center">
             <form action="/teammember/delete" method="POST">
               {{csrf_field()}}
               <a href="/teammember/edit/{{$user->id}}" class="btn btn-sm btn-outline btn-primary"><i class="fa fa-pencil"></i> Edit</a>
               <input type="hidden" name="id" value="{{$user->id}}" />
               <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-outline btn-primary"> <i class="fa fa-trash"></i> Delete</button>
             </form>
          </td>
      </tr>
      @endforeach
    </tbody>
</table>
