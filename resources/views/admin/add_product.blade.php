<!DOCTYPE html>
<html>
<head>
    @include('admin.css')

    <style>
        body {
            background: #121212;
        }

        .form-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .form-card {
            width: 800px;
            background: #1f2937;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
        }

        .page-title {
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
        }

        .form-row .form-group {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .form-row label {
            color: white;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .form-row input, .form-row select, .form-row textarea {
            padding: 8px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        textarea {
            resize: none;
        }

        .text-danger {
            font-size: 14px;
            margin-top: 5px;
        }

        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .btn-group button, .btn-group a {
            flex: 1;
        }

        @media screen and (max-width: 768px) {
            .form-row {
                flex-direction: column;
            }
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

                <a href="{{ route('products') }}" class="btn btn-success mb-4">View Products</a>

                <h2 class="page-title">Add Product</h2>

                <div class="form-wrapper">
                    <div class="form-card">
                        <form action="{{ url('upload_product') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Row 1: Title + Price -->
                            <div class="form-row">
                                <div class="form-group">
                                    <label>Product Title</label>
                                    <input type="text" name="title" value="{{ old('title') }}">
                                    @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" name="price" value="{{ old('price') }}">
                                    @error('price') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            <!-- Row 2: Quantity + Category -->
                            <div class="form-row">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" name="quantity" value="{{ old('quantity') }}">
                                    @error('quantity') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category">
                                        <option disabled selected>Select Category</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->category_name }}">{{ $cat->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            <!-- Row 3: Description (full width) -->
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label>Description</label>
                                    <textarea name="description" rows="3">{{ old('description') }}</textarea>
                                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            <!-- Row 4: Image upload (full width) -->
                            <div class="form-row">
                                <div class="form-group" style="flex:1;">
                                    <label>Product Image</label>
                                    <input type="file" name="image">
                                    @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="btn-group">
                                <button type="submit" class="btn btn-success">Add Product</button>
                                <a href="{{ route('products') }}" class="btn btn-secondary">Cancel</a>
                            </div>

                        </form>
                    </div>
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
