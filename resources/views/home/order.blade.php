<!DOCTYPE html>
<html>

<head>
    @include('home.css')
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
        border: 2px solid black;
        margin-top: 50px;
        width: 600px;
      }

      th{
        border: 2px solid black;
        text-align: center;
        background-color: black;
        padding: 10px;
        font-size: 20px;
        font-weight: bold;
        color: white;
      }

      td{
        color: black;
        font-weight: bold;
        padding: 10px;
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
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
     
  
  
  <!-- end hero area -->

 <div>
   <table class="table_deg">
      <tr>
        <th>Product Title</th>
        <th>Price</th>
        <th>Delivery Status</th>
        <th>Image</th>
      </tr>


      @foreach($order as $order)
      <tr>
        <td>{{$order->product->title}}</td>
        <td>{{$order->product->price}}</td>
        <td>{{$order->status}}</td>
        <td><img height="100" width="100" src="/images/{{$order->product->image}}"></td>
        
      </tr>
      @endforeach

      
      
    </table>
 </div>
 <br>
    <!-- footer section -->
    @include('home.footer')
  <!-- end footer section -->

</body>

</html>