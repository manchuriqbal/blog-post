<header class="header">
    <nav class="navbar navbar-expand-lg">
      <div class="search-panel">
        <div class="search-inner d-flex align-items-center justify-content-center">
          <div class="close-btn">Close <i class="fa fa-close"></i></div>
          <form id="searchForm" action="#">
            <div class="form-group">
              <input type="search" name="search" placeholder="What are you searching for...">
              <button type="submit" class="submit">Search</button>
            </div>
          </form>
        </div>
      </div>
      <div class="container-fluid d-flex align-items-center justify-content-between">
        <div class="navbar-header">
          <!-- Navbar Header--><a href="{{route('dashboard')}}" class="navbar-brand">
            <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Blog</strong><strong>Admin</strong></div>
            <div class="brand-text brand-sm"><strong class="text-primary">B</strong><strong>A</strong></div></a>
          <!-- Sidebar Toggle Btn-->
          <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
        </div>
        <div class="right-menu list-inline no-margin-bottom">
          </div>
          <!-- Log out               -->
          <div class="list-inline-item logout">

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <input class="list-inline-item logout btn btn-secoundry" type="submit" value="Logout"> <i class="icon-logout"></i>
            </form>

        </div>
        </div>
      </div>
    </nav>
  </header>