<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Latest Products</h2>
        </div>
        <div class="row">
            @foreach($product as $products)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box shadow-sm p-3 mb-4 bg-white rounded">
                        <div class="img-box text-center">
                            <img src="{{ asset('/images') }}/{{$products->image}}" alt="{{$products->title}}" class="img-fluid" style="max-height: 200px; object-fit: cover;">
                        </div>
                        <div class="detail-box text-center mt-3">
                            <h6 class="font-weight-bold">{{ $products->title }}</h6>
                            <h6 class="text-danger">Price: <span>${{ $products->price }}</span></h6>
                        </div>
                        <div class="text-center mt-3">
                            <a class="btn btn-sm btn-danger mx-1" href="{{ url('product_details', $products->id) }}">Details</a>
                            <a class="btn btn-sm btn-primary mx-1" href="{{ url('add_cart', $products->id) }}">Add to Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $product->links() }}
        </div>
    </div>
</section>
