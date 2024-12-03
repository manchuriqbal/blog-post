<nav id="sidebar">
    <!-- Sidebar Header-->
    <a href="{{route('admin.profile.view')}}">
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="{{ auth()->user()->avatar()}}" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">{{auth()->user()->fullName()}}</h1>
            <p>{{ auth()->user()->role->name }}</p>
          </div>
        </div>
    </a>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="{{request()->routeIs('dashboard') ? 'active' : ''}}"><a href="{{route('dashboard')}}"> <i class="icon-home"></i>Home </a></li>
        @if (auth()->check() && auth()->user()->role_id == '1')
            <li class="{{request()->routeIs('category.index') ? 'active' : ''}}"><a href="{{route('category.index')}}"> <i class="icon-grid"></i>Categories </a></li>
        @endif

        <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Posts</a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{route('posts.index')}}">View Posts</a></li>
                <li><a href="">Add Post</a></li>
            </ul>
        </li>
        <li><a href=""> <i class="icon-grid"></i>Orders </a></li>
    </ul>
  </nav>
