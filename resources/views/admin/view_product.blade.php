<!DOCTYPE html>
<html>
<head>
    @include('admin.css')

    <style>
        body {
            background: #121212;
        }

        .table-card {
            background: #1f2937;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.4);
            margin-top: 30px;
        }

        .table thead {
            background: #0d6efd;
            color: white;
        }

        .table tbody tr:hover {
            background: #2c3e50;
            transition: 0.3s;
        }

        .product-img {
            border-radius: 8px;
            object-fit: cover;
        }

        .search-box {
            max-width: 400px;
        }

        .page-title {
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-add {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

@include('admin.header')

<div class="d-flex align-items-stretch">
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container">

                <h2 class="page-title">Products</h2>

                <a href="{{route('product.add')}}" class="btn btn-success btn-add">+ Add New Product</a>

                <form action="{{url('product_search')}}" method="GET" class="mb-3 d-flex gap-2">
                    <input class="form-control search-box" type="search" name="search" placeholder="Search product...">
                    <button class="btn btn-secondary">Search</button>
                </form>

                <div class="table-card">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle text-center text-white">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Image</th>
                                    <th width="120">Edit</th>
                                    <th width="120">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product as $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ Str::limit($item->description, 40) }}</td>
                                    <td><span class="badge bg-info">{{ $item->category }}</span></td>
                                    <td><span class="badge bg-success">{{ $item->price }}</span></td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>
                                        <img src="/images/{{ $item->image }}" width="80" height="80" class="product-img">
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="{{ url('update_product', $item->id) }}">Edit</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-danger" onclick="confirmation(event)" href="{{ url('delete_product', $item->id) }}">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    {{ $product->onEachSide(1)->links() }}
                </div>

            </div>
        </div>
    </div>
</div>

<!-- SweetAlert for delete confirmation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
    function confirmation(ev){
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        swal({
          title: "Are You Sure To Delete This?",
          text: "This Delete Will be Permanent!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then((willDelete) => {
          if (willDelete) {
            window.location.href = urlToRedirect;
          }
        });
    }
</script>

<!-- JavaScript files -->
<script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"></script>
<script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"></script>
<script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('/admincss/js/charts-home.js')}}"></script>
<script src="{{asset('/admincss/js/front.js')}}"></script>

</body>
</html>

