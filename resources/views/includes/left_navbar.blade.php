{{--*/
$currentpage = Request::segment(1);
/*--}}
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"></strong>
                        </a>
                  </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>

            @if(Auth::user()->role_id != 5)
              <li @if($currentpage == 'user') class="active" @endif>
                <a href="/user"><span class="nav-label">Manage Users</span></a>
              <li>
            @endif

            @if(Auth::user()->role_id == 1)
              <li @if($currentpage == 'role') class="active" @endif>
                <a href="/role"><span class="nav-label">Manage Roles</span></a>
              <li>
            @endif

            @if(Auth::user()->role_id == 5)
            <li @if($currentpage == 'filemanager') class="active" @endif>
              <a href="/filemanager"><span class="nav-label">Manage Files</span></a>
            <li>
            @endif

            @if(Auth::user()->role_id == 3 || Auth::user()->role_id == 4 || Auth::user()->role_id == 1)
            <li @if($currentpage == 'filemanager') class="active" @endif>
              <a href="/filemanager"><span class="nav-label">View Files</span></a>
            <li>
            @endif
          </ul>
    </div>
</nav>
