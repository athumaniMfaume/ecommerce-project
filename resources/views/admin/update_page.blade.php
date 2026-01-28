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
            max-width: 800px;
            margin: 40px auto;
        }

        .form-card label {
            color: white;
            font-weight: 500;
            margin-bottom: 5px;
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

        .form-card input, .form-card select, .form-card textarea {
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .form-card textarea {
            resize: none;
        }

        .form-card img {
            margin-top: 5px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.4);
        }

        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .btn-group a, .btn-group button {
            flex: 1;
        }

        .page-title {
            text-align: center;
            color: white;
            margin-bottom: 20px;
        }

        .text-danger {
            font-size: 14px;
            margin-top: 5px;
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

                <h2 class="page-title">Update Product</h2>

                <div style="text-align:center; margin-bottom:20px;">
                    <a href="{{ route('products') }}" class="btn btn-primary">← Back to View Products</a>
                </div>

                <div class="form-card">
                    <form action="{{ url('edit_product', $data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <!-- Row 1: Title + Price -->
                        <div class="form-row">
                            <div class="form-group">
                                <label>Product Title</label>
                                <input type="text" name="title" value="{{ $data->title }}">
                                @error('title') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" name="price" value="{{ $data->price }}">
                                @error('price') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <!-- Row 2: Quantity + Category -->
                        <div class="form-row">
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" name="quantity" value="{{ $data->quantity }}">
                                @error('quantity') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label>Category</label>
                                <select name="category">
                                    @foreach($category as $cat)
                                        <option value="{{ $cat->category_name }}" {{ $cat->category_name == $data->category ? 'selected' : '' }}>
                                            {{ $cat->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <!-- Row 3: Description full width -->
                        <div class="form-row">
                            <div class="form-group" style="flex:1;">
                                <label>Description</label>
                                <textarea name="description">{{ $data->description }}</textarea>
                                @error('description') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <!-- Row 4: Current Image + New Image -->
                        <div class="form-row">
                            <div class="form-group">
                                <label>Current Image</label>
                                <img width="150" src="/images/{{ $data->image }}">
                            </div>

                            <div class="form-group">
                                <label>New Image (Optional)</label>
                                <input type="file" name="image" onchange="previewImage(event)">
                                <img id="preview" width="150" style="display:none;">
                                @error('image') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="btn-group">
                            <button type="submit" class="btn btn-success">Update Product</button>
                            <a href="{{ route('products') }}" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
function previewImage(event) {
    const preview = document.getElementById('preview');
    preview.src = URL.createObjectURL(event.target.files[0]);
    preview.style.display = 'block';
}
</script>

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
