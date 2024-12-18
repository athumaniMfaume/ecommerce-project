<!DOCTYPE html>
<html>

<head>
    @include('home.css')

    <style type="text/css">
    	.div_center{
    		display: flex;
    		justify-content: center;
    		align-items: center;
    		padding: 30px;
    	}

    	.detail_box{
    		padding: 15px;
    	}
    </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
     
    
  </div>
  <!-- end hero area -->

  <!-- Product details start -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">

       
        <div class="col-md-12">
          <div class="box">
            
              <div class="div_center">
                <img width="200" src="/products/{{$data->image}}" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  {{$data->title}}
                </h6>
                <h6>
                  Price
                  <span>
                    ${{$data->price}}
                  </span>
                </h6>
              </div><br>

               <div class="detail-box">
                <h6>
                  Category:{{$data->category}}
                </h6>
                <h6>
                  Available Quantity
                  <span>
                    {{$data->quantity}}
                  </span>
                </h6>
              </div><br>

              <div class="detail-box">
                
                
                  <p>
                    {{$data->description}}
                  </p>
               
              </div>
            <!--  <div class="new">
                <span>
                  New
                </span>
              </div> -->
            
          </div>
        </div>

       
        
        
        
      
     <!-- <div class="btn-box">
        <a href="">
          View All Products
        </a>
      </div> -->
    </div>
  </section>

  <!-- end shop section -->







 
  
  <!-- end Product details -->



    <!-- footer section -->
    @include('home.footer')
  <!-- end footer section -->

</body>

</html>