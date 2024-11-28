<!DOCTYPE html>
<html>
  <head>
   @include('admin/head')
   <style>
    .table_deg{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        margin-top: 50px;
    }
    img{
        width: 300px;
        height: 200px;

    }
    label{
        width: 250px;
    }
    input[type='number'], input[type='text'], select, .image{
        width: 350px;
        height: 50px;
    }
    textarea{
        width: 350px;
        height: 150px;
    }
    .table_row{
        padding-bottom: 5px;
    }

   </style>
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
            <h2 class="h5 no-margin-bottom">Add Products</h2>
          </div>
        </div>

        <div class="table_deg">
            <form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="table_row">
                    <label for="">Title</label>
                    <input type="text" name="title" value="{{$product->name}}">
                </div>
                <div class="table_row">
                    <label for="">Description</label>
                    <textarea name="description" cols="30" rows="10">{{$product->description}}</textarea>
                </div>
                <div class="table_row">
                    <label for="">Price</label>
                    <input type="text" name="price" value="{{$product->price}}">
                </div>
                <div class="table_row">

                    <label for="">Category Name</label>
                    <select name="category" required>
                        <option  disabled value="">Select Category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->category_name }}" {{ $category->category_name == $product->category ? 'selected' : '' }}>{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="table_row">
                    <label for="">Quantity</label>
                    <input type="number" name="quantity" value="{{$product->quantity}}">
                </div>
                <div class="table_row">
                    <label for="">Old Image</label>
                    <img src="{{ asset('products/' . $product->image) }}" alt="">
                </div>
                <div class="table_row">
                    <label for="">New Image</label>
                    <input class="image" type="file" name="image" value="">
                </div>
                    <input class="btn btn-success btn-lg float-right mt-4" type="submit" value="Update Product">
                </form>
        </div>

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
