<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | @yield('title') </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href=" {{asset('adminsite/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href=" {{asset('adminsite/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href=" {{asset('adminsite/css/font.css')}}">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href=" {{asset('adminsite/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href=" {{asset('adminsite/css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href=" {{asset('adminsite/img/favicon.ico')}}">

    @yield('page-css')
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

  </head>


  <body>
    @include('admin.partial.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
        @include('admin.partial.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom"> @yield('page_name')</h2>
          </div>
        </div>
        @yield('content')

        @include('admin.footer')





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
