<!DOCTYPE html>
<html>

<head>
    @include('home.css')
        <style>
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
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
     
    <!-- slider section -->
    @include('home.slider')
    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->
  @include('home.product')
      <div class="btn-box heading_container heading_center">
         <a href="{{ url('shop') }}">View All Products</a>
      </div>
  <!-- end shop section -->

    <!-- why section -->
  @include('home.why')
  <!-- end why section -->

  <!-- testmonial section -->
  @include('home.testmonial')
  <!-- end testmonial section -->

  <!-- contact section -->
  @include('home.contact')
  <!-- end info section -->

    <!-- footer section -->
    @include('home.footer')
  <!-- end footer section -->

</body>

</html>