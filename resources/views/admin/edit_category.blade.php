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
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
            max-width: 500px;
            margin: 50px auto;
        }

        .form-card input[type='text'] {
            height: 45px;
            width: 100%;
            padding: 0 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .form-card button {
            margin-top: 15px;
            width: 100%;
        }

        .page-title {
            text-align: center;
            color: white;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .text-danger {
            margin-top: 5px;
            font-size: 14px;
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

                <h2 class="page-title">Update Category</h2>

                <!-- Update Form Card -->
                <div class="form-card">
                    <form action="{{ url('update_category', $data->id) }}" method="post">
                        @csrf
                        <label for="category" class="text-white mb-2">Category Name</label>
                        <input type="text" id="category" name="category" value="{{ $data->category_name }}">
                        @error('category')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

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
