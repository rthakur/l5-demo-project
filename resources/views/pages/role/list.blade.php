<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Label</th>
        <th width="30%" class="text-center">Action</th>
    </tr>
    </thead>
    <tbody>
      {{--*/$i=1;/*--}}
      @foreach($roles as $role)
      <tr>
          <td>{{$i++}}</td>
          <td>{{$role->name}}</td>
          <td>{{$role->label}}</td>
          <td width="25%" class="text-center">
            <a href="/role/edit/{{$role->id}}" class="btn btn-sm btn-outline btn-primary"><i class="fa fa-pencil"></i> Edit</a>
          </td>
      </tr>
      @endforeach
    </tbody>
</table>
