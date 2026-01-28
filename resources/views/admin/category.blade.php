<!DOCTYPE html>
<html>
<head>
    @include('admin.css')

    <style>
        body {
            background: #121212;
        }

        .form-card {
            background: #1f2937;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.4);
            max-width: 600px;
            margin: 30px auto;
        }

        .form-card input[type='text'] {
            height: 45px;
        }

        .table-card {
            background: #1f2937;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.4);
            margin: 30px auto;
            max-width: 700px;
        }

        .table thead {
            background: #0d6efd;
            color: white;
        }

        .table tbody tr:hover {
            background: #2c3e50;
            transition: 0.3s;
        }

        .btn {
            min-width: 70px;
        }

        .page-title {
            text-align: center;
            color: white;
            margin-top: 20px;
        }

    </style>
</head>

<body>

@include('admin.header')

<div class="d-flex align-items-stretch">
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <h2 class="page-title">Add Category</h2>

                <!-- Form Card -->
                <div class="form-card">
                    <form action="{{ url('add_category') }}" method="post" class="d-flex gap-2">
                        @csrf
                        <input type="text" name="category_name" class="form-control" placeholder="Enter Category Name" value="{{ old('category_name') }}">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                    @error('category_name')
                        <p class="text-danger mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Table Card -->
                <div class="table-card">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle text-center text-white">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                <tr>
                                    <td>{{ $item->category_name }}</td>
                                    <td>
                                        <a href="{{ url('edit_category', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('delete_category', $item->id) }}" onclick="confirmation(event)" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-3">
                    {{ $data->onEachSide(1)->links() }}
                </div>

            </div>
        </div>
    </div>
</div>

<!-- SweetAlert Delete Confirmation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
    function confirmation(ev){
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        swal({
            title: "Are you sure to delete this?",
            text: "This will be permanently deleted!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if(willDelete) {
                window.location.href = urlToRedirect;
            }
        });
    }
</script>

<!-- JS Files -->
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

