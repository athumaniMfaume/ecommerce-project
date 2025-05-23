<!DOCTYPE html>
<html>
    <!-- head -->
    <head>
   @include('admin.css')

    <style  type="text/css">

      input[type='text']
      {
        width: 350px;
        height: 50px;

      }

      .div_deg{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;
      }

      .table_deg{
        text-align: center;
        margin: auto;
        border: 2px solid yellowgreen;
        margin-top: 50px;
        width: 600px;
      }

      th{
        background-color: skyblue;
        padding: 15px;
        font-size: 20px;
        font-weight: bold;
        color: white;
      }

      td{
        color: white;
        padding: 10px;
        border: 1px solid skyblue;
      }

      label{
      	display: inline-block;
      	width: 200px;
        padding: 20px;
      	font-size: 18px!important;
        color: white!important;
      }
      
      textarea{
        width: 450px;
        height: 80px;
      }

      .input_deg{
        padding: 15px;
      }






    </style>
   </head>
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
          <h1 style="color: white"> Update Product</h1>
            <div class="div_deg">
              

              <form action="{{url('edit_product', $data->id)}}" method="post" enctype="multipart/form-data">
              	@csrf
                <div class="input_deg">
                	<label>Product Title</label>
                	<input type="text" name="title" value="{{$data->title}}" >
                                     @error('title')
                     <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
                <div class="input_deg">
                	<label>Description</label>
                	<textarea name="description"  required>{{$data->description}}</textarea>
                                     @error('description')
                     <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
                <div class="input_deg">
                	<label>Price</label>
                	<input type="text" name="price" value="{{$data->price}}" >
                                     @error('price')
                     <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
                <div class="input_deg">
                	<label>Quantity</label>
                	<input type="number" name="quantity" value="{{$data->quantity}}" >
                                     @error('quantity')
                     <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
                <div class="input_deg">
                	<label>Category</label>
                	<select name="category" required>
                    
                	

                    @foreach($category as $category)
                    <option value="{{$category->category_name}}" {{$category->category_name == $data->category ? 'selected' : ''}}>{{$category->category_name}}</option>
                    @endforeach
                		
                	</select>
                                     @error('category')
                     <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
                <div class="input_deg">
                	<label>Current image</label>
                  <img width="150" src="/images/{{$data->image}}">
                </div>
                <div class="input_deg">
                  <label>New image</label>
                  <input type="file" name="image"   >
                                     @error('image')
                     <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
                <div class="input_deg">
                	<input class="btn btn-success" type="submit" value="Update Product">
                </div>
              </form>
            </div>
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