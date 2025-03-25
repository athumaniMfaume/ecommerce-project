<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
        }
        .invoice {
            max-width: 400px;
            margin: auto;
            padding: 15px;
            border: 1px solid #000;
            border-radius: 8px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            background: #fff;
        }
        h2, h3 {
            margin: 5px 0;
            color: #333;
        }
        hr {
            border: none;
            height: 2px;
            background: #000;
            margin: 10px 0;
        }
        .product-image img {
            width: 100%;
            max-width: 250px;
            border-radius: 5px;
            margin-top: 10px;
        }
        .footer {
            font-size: 12px;
            color: #777;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="invoice">
        <h2>E-Commerce</h2>
        <p>Phone: +255 123 456 789 | Website: www.ecommerce.com</p>
        <hr>

        <h3>Customer: {{ $data->name }}</h3>
        <h3>Phone: {{ $data->phone }}</h3>
        <h3>Address: {{ $data->rec_address }}</h3>
        <hr>

        <h3>Product: {{ $data->product->title }}</h3>
        <h3>Price: ${{ number_format($data->product->price, 2) }}</h3>
        <hr>

        <div class="product-image">
            <img src="{{ $imagePath }}" alt="Product Image">
        </div>

        <hr>
        <p class="footer">Thank you for shopping with us!</p>
    </div>

</body>
</html>
