<!DOCTYPE html>
<html>
  <head>
   @include('admin/head')
   <style>
    img{
        width: 80px;
        height: 50px;
    }
    .input-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }


    .no-padding-top {
        padding-top: 0;
    }

    .no-padding-bottom {
        padding-bottom: 0;
    }
    .table_dego {

        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .table_deg {
        text-align: center;

    }
    .body_con{
        margin-right: 20px;
        margin-left: 20px;
    }

    .table_head{
        margin-top: 5px;
        color: white;
        background-color: rgb(114, 114, 255);
    }
    .input_category {
        height: 40px;
        width: 400px;
        padding-bottom: 1px;
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
            <h2 class="h5 no-margin-bottom">Products</h2>
          </div>
        </div>

<div class="body_con">

        <form action="{{route('product.search')}}" method="post">
            @csrf
            <input class="input_category" type="text" name="search" >
            <input class="btn btn-secondary" type="submit" value="Search">
        </form>
        <div class="table_dego mt-4">
            <table class="table_deg table table-striped ">
                <thead>
                  <tr>
                    <th class="table_head" scope="col">Image</th>
                    <th class="table_head" scope="col">Title</th>
                    <th class="table_head" scope="col">Descriptions</th>
                    <th class="table_head" scope="col">Price</th>
                    <th class="table_head">quantiy</th>
                    <th class="table_head">category</th>
                    <th class="table_head">Update</th>
                    <th class="table_head">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($product as $products)

                    <tr>
                      <td>
                        <img src="{{ asset('products/'  . $products->image) }}" alt="">
                      </td>
                      <td class="title">{!!Str::limit($products->name, 30)!!}</td>
                      <td>{!!Str::limit($products->description, 50)!!}</td>
                        <td>{{$products->price}}</td>
                        <td>{{$products->quantity}}</td>
                        <td>{{$products->category}}</td>
                        <td><a href="{{route('product.edit', $products->id)}}" ><button class="btn btn-info" type="submit">Edit</button></a></td>
                        <td>
                            <form action="{{route('product.delete', $products->id)}}" onsubmit="return confirmDelete(event, this)" method="post">
                                @csrf
                                @method('delete')
                                <input class="btn btn-danger" type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
              </table>
            </div>

                {{$product->onEachSide(1)->links()}}
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
    <script>
        function confirmDelete(event, form) {
            event.preventDefault();

            swal({
                title: "Are you sure?",
                text: "Are you sure that you want to Delete this Category?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then(willDelete => {
                if (willDelete) {
                    form.submit();
                    swal("Deleted!", "Your imaginary file has been deleted!", "warning");
                }
                else{
                    swal("Safe!", "Your imaginary file Are Deleted!", "success");

                }
                });

        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
