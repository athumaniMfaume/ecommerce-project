<!DOCTYPE html>
<html>
    <!-- head -->
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

      table{
        text-align: center;
        margin: auto;
        border: 2px solid skyblue;
        margin-top: 50px;
        width: 1000px;
      }

      th{
        
        text-align: center;
        background-color: skyblue;
        padding: 6px;
        font-size: 20px;
        font-weight: bold;
        color: white;
      }

      td{
        color: white;
        font-weight: bold;
        padding: 6px;
        border: 1px solid skyblue;
      }

      .cart_value{
        text-align: center;
        margin-bottom: 40px;
        padding: 10px;
      }

      .order_deg{
        padding-right: 10px;
        margin-top: -250px;
      }

      label{
        display: inline-block;
        width: 150px;
      }

      .div_gap{
        padding: 20px;
      }





    </style>
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
            <table>
              <tr>
                <th> Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th> Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Status</th>
                <th>Change Status</th>
                <th>Print PDF</th>
              </tr>

              @foreach($data as $data)

              <tr>
                <td>{{$data->name}}</td>
                <td>{{$data->rec_address}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->product->title}}</td>
                <td>{{$data->product->price}}</td>
                <td>
                  <img width="100" src="products/{{$data->product->image}}">
                </td>
                <td>
                  @if($data->status == 'in progress')

                     <span style="color: red">{{$data->status}}</span>
                   
                   @elseif($data->status == 'On the way')

                     <span style="color: skyblue">{{$data->status}}</span>

                  @else

                     <span style="color: yellow">{{$data->status}}</span> 

                  @endif     


                </td>
                <td>
                  <a class="btn btn-primary" href="{{url('on_the_way', $data->id)}}">On the way</a>
                  <a class="btn btn-success" href="{{url('delivered', $data->id)}}">Deliver</a>
                </td>
                <td>
                  <a class="btn btn-secondary" href="{{url('print_pdf', $data->id)}}">Print PDF</a>
                </td>
              </tr>

              @endforeach
            </table>
          
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