<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | @yield('title') </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

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

    <style>
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
        #sidebar {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        #sidebar .user-site-button {
            margin-top: auto; /* Pushes the button to the bottom */
            padding: 10px; /* Adds some spacing around the button */
        }

        #sidebar .user-site-button .btn {
            font-size: 14px;  /* Adjust the font size */
            padding: 10px;  /* Control padding around the button */
            color: #fff;  /* Ensure text color is white */
            background-color: #007bff;  /* Background color for button */
            border-radius: 5px;  /* Rounded corners for the button */
            text-align: center;
            box-shadow: 0px 2px 5px rgba(0,0,0,0.1);  /* Add shadow for depth */
        }

        #sidebar .user-site-button .btn:hover {
            background-color: #0056b3; /* Change color on hover */
        }

    </style>
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

            <div>
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
            </div>

          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom"> @yield('page_name')</h2>
          </div>
        </div>
        @yield('content')

        @include('admin.footer')





</div>
</div>
<!-- JavaScript files-->

@yield('javascript')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const alert = document.querySelector('.alert');
        if (alert) {
            setTimeout(() => {
                alert.style.display = 'none';
            }, 5000);
        }
    });
</script>
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
