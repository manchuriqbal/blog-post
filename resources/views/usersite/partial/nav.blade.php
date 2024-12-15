<div class="container">
    <header class="border-bottom lh-1 py-3">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
          <a class="link-secondary" href="#">Subscribe</a>
        </div>
        <div class="col-4 text-center">
          <a class="blog-header-logo text-body-emphasis text-decoration-none" href="{{route('user.home.index')}}">Tech Blog</a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
          <a class="link-secondary" href="#" aria-label="Search">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
          </a>
          @if (auth()->check() && auth()->user()->role_id !== 3)
          <div class="header-buttons">
            <a class="btn btn-sm btn-outline-secondary me-2 align-middle" href="{{ route('dashboard') }}">Admin Site</a>
            <form action="{{ route('logout') }}" method="post" class="d-inline align-middle">
                @csrf
                <input class="btn btn-sm btn-outline-secondary" type="submit" value="Logout">
            </form>
        </div>
        @elseif (auth()->check() && auth()->user()->role_id == 3)
        <div class="header-buttons">
            <form action="{{ route('logout') }}" method="post" class="d-inline align-middle">
                @csrf
                <input class="btn btn-sm btn-outline-secondary" type="submit" value="Logout">
            </form>
        </div>
        @else
            <a class="btn btn-sm btn-outline-secondary me-2 align-middle" href="{{ route('register') }}">Registration</a>
            <a class="btn btn-sm btn-outline-secondary align-middle" href="{{ route('login') }}">Login</a>
      @endif

        </div>
      </div>
    </header>

    <div class="">
        {{-- <nav class="nav nav-underline justify-content-between">
            <a class="nav-item nav-link link-body-emphasis active" href="">Home</a>

            @foreach ($categories as $category)
            <a class="nav-item nav-link link-body-emphasis active" href="{{$category->slug}}">{{ucfirst($category->name)}}</a>
            @endforeach
        </nav> --}}
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('user.home.index') }}">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <!-- Left navigation links -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('user.posts.index') ? 'active' : ''}}" aria-current="page" href="{{route('user.posts.index')}}">Posts</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link {{request()->routeIs('user.categories.index') ? 'active' : ''}}" href="{{route('user.categories.index')}}">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('user.author.index') ? 'active' : ''}}" href="{{route('user.author.index')}}">Author</a>
                        </li>

                    </ul>

                    <!-- Right-side profile menu -->
                    <ul class="navbar-nav ms-auto">
                        @auth
                            <li class="nav-item ">
                                <a class="nav-link" href="{{route('user.profie.index')}}" id="profile" role="button" aria-expanded="false">
                                    @if (auth()->user()->avatar)
                                        <img src="{{ asset(auth()->user()->getAvatar()) }}" alt="Profile Picture" class="rounded-circle" style="width: 30px; height: 30px;">
                                    @endif
                                    {{ auth()->user()->fullName() }}
                                </a>
                            </li>

                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

    </div>
  </div>
