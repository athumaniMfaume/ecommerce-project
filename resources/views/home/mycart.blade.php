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
        @include('home.header')
    </div>

    <div class="container">
        @if($cart->isEmpty())
            <h3 class="text-center">No items in the cart</h3>
        @else
            <div class="order_form">
                <form action="{{url('confirm_order')}}" method="post">
                    @csrf
                    <label>Receiver Name</label>
                    <input type="text" name="name" value="{{Auth::user()->name}}">

                    <label>Receiver Address</label>
                    <textarea name="address">{{Auth::user()->address}}</textarea>

                    <label>Receiver Phone</label>
                    <input type="text" name="phone" value="{{Auth::user()->phone}}">

                    <button type="submit" class="btn btn-primary">Cash On Delivery</button>
                    <a class="btn btn-success" href="{{url('stripe')}}">Pay Using Card</a>
                </form>
            </div>

            <table class="table_deg">
                <tr>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Remove</th>
                </tr>

                <?php $value = 0; ?>

                @foreach($cart as $cart)
                    <tr>
                        <td>{{$cart->product->title}}</td>
                        <td>${{$cart->product->price}}</td>
                        <td><img width="100" src="/images/{{$cart->product->image}}"></td>
                        <td><a class="btn btn-danger" href="{{url('delete_cart', $cart->id)}}">Remove</a></td>
                    </tr>
                    <?php $value += $cart->product->price; ?>
                @endforeach
            </table>

            <div class="cart_value">Total value of cart: ${{$value}}</div>
        @endif
    </div>

    <script type="text/javascript">
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            swal({
                title: "Are You Sure To Delete This",
                text: "This action is permanent",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willCancel) => {
                if (willCancel) {
                    window.location.href = urlToRedirect;
                }
            });
        }
    </script>

    @include('home.footer')
</body>

</html>
