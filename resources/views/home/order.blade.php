<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table_deg {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: white;
            font-size: 18px;
        }

        td img {
            border-radius: 5px;
        }

        .cart_value {
            text-align: center;
            margin-top: 20px;
            font-size: 20px;
            font-weight: bold;
        }

        .order_form label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .order_form input, .order_form textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        .order_form .btn {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section starts -->
        @include('home.header')
        <!-- end header section -->
    </div>

    <div class="container">
        @if($orders->isEmpty())
           <h3 class="text-center">No Order Available</h3><br>
          <center> <a class="btn btn-primary text-center" href="{{url('shop')}}">View Product </a></center>

        @else
            <table class="table_deg">
                <tr>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th>Delivery Status</th>
                    <th>Image</th>
                </tr>

                @foreach($orders as $order)
                <tr>
                    <td>{{$order->product->title}}</td>
                    <td>{{$order->product->price}}</td>
                    <td>{{$order->status}}</td>
                    <td><img height="100" width="100" src="/images/{{$order->product->image}}"></td>
                </tr>
                @endforeach
            </table>
                    <div class="d-flex justify-content-center mt-4">
            {{ $orders->links() }}
        </div>
        @endif
    </div>

    <br>

    <!-- footer section -->
    @include('home.footer')
    <!-- end footer section -->

</body>

</html>
