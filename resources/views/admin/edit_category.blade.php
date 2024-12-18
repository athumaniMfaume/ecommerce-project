<!DOCTYPE html>
<html>
    <!-- head -->
    <head>
   @include('admin.css')
    <style  type="text/css">

      input[type='text']
      {
        width: 400px;
        height: 50px;

      }

      .div_deg{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px;
      }

      .table_deg{
        text-align: center;
        margin: auto;
        border: 2px solid yellowgreen;
        margin-top: 50px;
        width: 600px;
      }

      th{
        background-color: skyblue;
        padding: 15px;
        font-size: 20px;
        font-weight: bold;
        color: white;
      }

      td{
        color: white;
        padding: 10px;
        border: 1px solid skyblue;
      }





    </style>
   </head>
   <!-- end  head -->
  <body>
    <!-- header -->
    @include('admin.header')
    <!-- end header -->
   
    <div class="d-flex align-items-stretch">

      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h1 style="color: white"> Update Category</h1>
            <div class="div_deg">
              

              <form action="{{url('update_category', $data->id)}}" method="post">
                @csrf
                <input type="text" name="category" value="{{$data->category_name}}">
                <input class="btn btn-primary" type="submit" name="update category" value="Update Category">
              </form>
            </div>
          
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/admincss/js/front.js')}}"></script>
  </body>
</html>