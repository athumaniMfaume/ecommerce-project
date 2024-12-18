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
        margin-top: -10px;
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
     
   
  </div>

  <div class="div_deg">
  	<div class="order_deg" >
  		<form action="{{url('confirm_order')}}" method="post">
  			@csrf
  			<div class="div_gap">
  				<label>Receiver Name</label>
  				<input type="text" name="name" value="{{Auth::user()->name}}">
  			</div>
  			<div class="div_gap">
  				<label>Receiver Address</label>
  				<textarea name="address">{{Auth::user()->address}}</textarea>
  			</div>
  			<div class="div_gap">
  				<label>Receiver Phone</label>
  				<input type="text" name="phone" value="{{Auth::user()->phone}}">
  			</div>
  			<div class="div_gap">
  				
  				<input class="btn btn-primary" type="submit" value="Cash On Delivery">
  				<a class="btn btn-success" href="{{url('stripe')}}">Pay Using Card</a>
  			</div>
  		</form>
  	</div>
  	<table class="table_deg">
  		<tr>
  			<th>Product Title</th>
  			<th>Price</th>
  			<th>Image</th>
  			<th>Remove</th>
  		</tr>

  		<?php
  		    $value = 0;


  		?>

  		@foreach($cart as $cart)
  		<tr>
  			<td>{{$cart->product->title}}</td>
  			<td>{{$cart->product->price}}</td>
  			<td><img width="150" src="/products/{{$cart->product->image}}"></td>
  			<td><a class="btn btn-danger"  href="{{url('delete_cart', $cart->id)}}">Remove</a></td>
  		</tr>

  		<?php
  		    $value = $value +  $cart->product->price;


  		?>
  		@endforeach
  	</table>
  </div>
   <div class="cart_value"><h3>Total value of cart is : ${{$value}} </h3></div>

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








    <!-- footer section -->
    @include('home.footer')
  <!-- end footer section -->

</body>

</html>