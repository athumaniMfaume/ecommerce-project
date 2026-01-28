<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Latest Products</h2>
              <form action="{{url('products_search')}}" method="get">
              @csrf
              <input type="search" class="form-control @error('search') is-invalid @enderror mb-2" name="search" value="{{ old('search') }}">
              <input type="submit" class="btn btn-secondary" value="Search">
            </form>
             @error('search')
             <div>
               <p class="text-danger">{{ $message }}</p>
             </div>
             @enderror
        </div>
        <div class="row">

        @if (request()->filled('search') )

            @forelse($product as $products)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box shadow-sm p-1 mb-2 bg-white rounded">
                        <div class="img-box text-center">
                            <img src="{{ asset('/images') }}/{{$products->image}}" alt="{{$products->title}}" class="img-fluid" style="max-height: 200px; object-fit: cover;">
                        </div>
                        <div class="text-center  mt-3">

                            <p class="text-bold"> Name:{{ $products->title }}</p>
                            <p class="text-success text-bold" >quantity:{{ $products->quantity }}</p>
                            <p class="text-danger text-bold" >Price: <span>Tsh {{ $products->price }}</span></p>
                        </div>
                        <div class="text-center mt-3">
                            <a class="btn btn-sm btn-danger mx-1  mb-3" style="color:white" href="{{ url('product_details', $products->id) }}">Details</a><br>
                            @if ($products->quantity > 0)
                                                         <form action="{{url('add_cart', $products->id)}}" method="POST">
                                @csrf
                                <input type="number" name="quantity" min="1" max="{{$products->quantity}}" value="1" id="">
                                <button class="btn btn-sm btn-success mx-1" type="submit">Add cart</button>

                            </form>
                            @else
                            <button disabled>out of stock</button>
                            @endif

                            {{-- <a class="btn btn-sm btn-primary mx-1" href="{{ url('add_cart', $products->id) }}">Add to Cart</a> --}}
                        </div>
                    </div>
                </div>
                        <div class="d-flex justify-content-center mt-4">
            {{ $product->links() }} </div>



            @empty

                    <h3 style="text-align: center">no product found</h3>


            @endforelse

            </div>



        @else
           @foreach ($product as $products)
                               <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box shadow-sm p-1 mb-2 bg-white rounded">
                        <div class="img-box text-center">
                            <img src="{{ asset('/images') }}/{{$products->image}}" alt="{{$products->title}}" class="img-fluid" style="max-height: 200px; object-fit: cover;">
                        </div>
                        <div class="text-center  mt-3">

                            <p class="text-bold"> Name:{{ $products->title }}</p>
                            <p class="text-success text-bold" >quantity:{{ $products->quantity }}</p>
                            <p class="text-danger text-bold" >Price: <span>Tsh {{ $products->price }}</span></p>
                        </div>
                        <div class="text-center mt-3">
                            <a class="btn btn-sm btn-danger mx-1" style="color:white" href="{{ url('product_details', $products->id) }}">Details</a>
                            @if ($products->quantity > 0)
                                                         <form action="{{url('add_cart', $products->id)}}" method="POST">
                                @csrf
                                <input type="number" name="quantity" min="1" max="{{$products->quantity}}" value="1" id="">
                                <button class="btn btn-sm btn-success mx-1" type="submit">Add cart</button>

                            </form>
                            @else
                            <button disabled>out of stock</button>
                            @endif

                            {{-- <a class="btn btn-sm btn-primary mx-1" href="{{ url('add_cart', $products->id) }}">Add to Cart</a> --}}
                        </div>
                    </div>
                </div>

                @endforeach

        </div>
               <div class="d-flex justify-content-center mt-4">
            {{ $product->links() }}
@endif


        </div>


    </div>
</section>
