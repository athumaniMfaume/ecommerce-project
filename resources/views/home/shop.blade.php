<!DOCTYPE html>
<html>

<head>
    @include('home.css')
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
     
  </div>
  <!-- end hero area -->

  <!-- shop section -->
  @include('home.product')
  <!-- end shop section -->

  <!-- contact section -->
  @include('home.contact')
  <!-- end info section -->

    <!-- footer section -->
    @include('home.footer')
  <!-- end footer section -->

</body>

</html>