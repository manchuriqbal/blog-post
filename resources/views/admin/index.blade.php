<!DOCTYPE html>
<html>
  <head>
   @include('admin/head')
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
        @include('admin/sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
          </div>
        </div>
        @include('admin/body')
        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
               <p class="no-margin-bottom">2018 &copy; Your company. Download From <a target="_blank" href="https://templateshub.net">Templates Hub</a>.</p>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src=" {{asset('adminsite/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src=" {{asset('adminsite/vendor/jquery/jquery.min.js')}}"></script>
    <script src=" {{asset('adminsite/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src=" {{asset('adminsite/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src=" {{asset('adminsite/js/front.js')}}"></script>
    <script src=" {{asset('adminsite/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src=" {{asset('adminsite/vendor/chart.js/Chart.min.js')}}"></script>
    <script src=" {{asset('adminsite/js/charts-home.js')}}"></script>
  </body>
</html>
