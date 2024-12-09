<nav id="sidebar">
    <!-- Sidebar Header-->
    <a href="{{route('profile.view')}}">
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="{{ auth()->user()->getAvatar()}}" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">{{auth()->user()->fullName()}}</h1>
            <p>{{ auth()->user()->role->name }}</p>
          </div>
        </div>
    </a>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="{{request()->routeIs('dashboard') ? 'active' : ''}}"><a href="{{route('dashboard')}}"> <i class="icon-home"></i>Home </a></li>

        <li class="{{request()->routeIs('posts.*') ? 'active' : ''}}"><a href="#postdropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Posts</a>
            <ul id="postdropdownDropdown" class="collapse list-unstyled ">
                <li><a  href="{{route('posts.index')}}">View Posts</a></li>
                <li><a href="{{route('posts.create')}}">Add Post</a></li>
            </ul>
        </li>

        <li class="{{request()->routeIs('categories.*') ? 'active' : ''}}"><a href="#categorydropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-grid"></i>Categories</a>
            <ul id="categorydropdownDropdown" class="collapse list-unstyled ">
                <li><a  href="{{route('categories.index')}}">View Categories</a></li>
                <li><a href="{{route('categories.create')}}">Add Category</a></li>
            </ul>
        </li>

        <li class="{{request()->routeIs('users.*') ? 'active' : ''}}"><a href="{{route('users.index')}}"> <i class="icon-user-1"></i>Users </a></li>

        <li class="{{request()->routeIs('tags.*') ? 'active' : ''}}"><a href="{{route('tags.index')}}"> <i class="fas fa-tag"></i>Tags </a></li>

        @if (auth()->user()->role_id == 1)
        <li class="{{request()->routeIs('roles.*') ? 'active' : ''}}"><a href="{{route('roles.index')}}"> <i class="fas fa-shield-alt"></i>Roles </a></li>
        @endif

    </ul>

    <div class="user-site-button">
        <a href="{{route('dashboard.index')}}" class="btn btn-primary w-100">
            <i class="icon-user-1"></i> User Site
        </a>
    </div>

  </nav>
