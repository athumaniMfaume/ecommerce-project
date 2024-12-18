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

      input[type='search']
      {
        width: 500px;
        height: 60px;
        margin-left: 50px;

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

            <form action="{{url('product_search')}}" method="get">
              @csrf
              <input type="search" name="search">
              <input type="submit" class="btn btn-secondary" value="Search">
            </form>
             
           <div>  

             <table class="table_deg">
              <tr>
                <th> Product Title </th>
                <th> Description </th>
                <th> Category </th>
                <th> Price </th>
                <th> Quantity </th>
                <th> Image </th>
                <th> Edit </th>
                <th>Delete</th>
                
                
              </tr>

              @foreach($product as $products)
              <tr>
              
                <td>{{$products->title}}</td>
                <td>{!!Str::limit($products->description,50)!!}</td>
                <td>{{$products->category}}</td>
                <td>{{$products->price}}</td>
                <td>{{$products->quantity}}</td>
                <td><img height="120" width="120" src="products/{{$products->image}}"></td>
                <td><a class="btn btn-success" href="{{url('update_product', $products->id)}}">Edit</a></td>
                <td><a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product', $products->id)}}">Delete</a></td>
               
              </tr>

              @endforeach

               
             </table>

           </div>
           <div class="div_deg">
             {{$product->onEachSide(1)->links()}}
           </div> 
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script type="text/javascript">
      function confirmation(ev){
        ev.preventDefault();
        var urlToRedirect=ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);

        swal({

          title:"Are You Sure To Delete This",
          text:"This Delete Will be Permanently",
          icon:"warning",
          buttons:true,
          dangerMode:true,

        })

        .then((willCancel)=>{
          if (willCancel) {
            window.location.href=urlToRedirect;
          }

        });
      }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 

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