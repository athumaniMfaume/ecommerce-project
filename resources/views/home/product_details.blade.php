<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
    <style>
        .container {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .product-image {
            width: 100%;
            max-width: 300px;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .detail-box {
            text-align: left;
            padding: 15px;
            font-size: 16px;
        }

        .detail-box h6 {
            margin: 10px 0;
            font-weight: bold;
        }

        .btn-box {
            margin-top: 20px;
        }

        .btn-box a {
            display: inline-block;
            padding: 10px 20px;
            background: #ff6f61;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .btn-box a:hover {
            background: #e65a50;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        @include('home.header')
    </div>

    <section class="shop_section layout_padding">
        <div class="container">
            <h2>{{ $data->title }}</h2>
            <img class="product-image" src="/images/{{ $data->image }}" alt="{{ $data->title }}">
            
            <div class="detail-box">
                <h6>Price: <span>${{ $data->price }}</span></h6>
                <h6>Category: <span>{{ $data->category }}</span></h6>
                <h6>Available Quantity: <span>{{ $data->quantity }}</span></h6>
                <p><b>Description:</b> {{ $data->description }}</p>
            </div>

            <div class="btn-box">
                <a href="{{ url('shop') }}">View All Products</a>
            </div>
        </div>
    </section>

    @include('home.footer')
</body>

</html>
