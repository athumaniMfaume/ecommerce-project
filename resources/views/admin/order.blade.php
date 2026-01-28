<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style>
        body {
            background-color: #222;
            color: white;
        }

        /* Search Section */
        .search-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin: 20px 0;
        }

        .search-container input[type="search"] {
            width: 300px;
            padding: 10px 15px;
            border-radius: 5px;
            border: 1px solid #0d6efd;
            background-color: #1f2937;
            color: white;
            font-size: 16px;
        }

        .search-container button {
            background-color: #0d6efd;
            color: white;
            border: none;
            padding: 10px 20px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .search-container button:hover {
            background-color: #0b5ed7;
        }

        /* Table Styling */
        .table-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        table {
            width: 90%;
            border-collapse: collapse;
            background-color: #1f2937;
            color: white;
            text-align: center;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        }

        thead tr {
            background-color: #0d6efd;
            font-weight: bold;
        }

        th, td {
            padding: 12px;
            border: 1px solid #333;
            word-wrap: break-word;
        }

        tbody tr:hover {
            background-color: #2c3e50;
            transition: 0.3s;
        }

        td img {
            width: 80px;
            border-radius: 5px;
        }

        .status-red { color: red; font-weight:bold; }
        .status-blue { color: skyblue; font-weight:bold; }
        .status-yellow { color: yellow; font-weight:bold; }

        .btn {
            padding: 6px 12px;
            font-size: 14px;
            border-radius: 4px;
            text-decoration: none;
        }

        .btn-primary { background-color: #0d6efd; color:white; border:none; }
        .btn-success { background-color: green; color:white; border:none; }
        .btn-secondary { background-color: gray; color:white; border:none; }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            padding: 10px;
        }

        .pagination a {
            color: white;
            margin: 0 5px;
            text-decoration: none;
            padding: 8px 12px;
            background-color: #444;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .pagination a:hover {
            background-color: #0d6efd;
        }

        .pagination .active {
            background-color: #0d6efd;
            color: black;
        }

        .pagination .disabled {
            color: #ccc;
            cursor: not-allowed;
        }

        @media (max-width: 768px) {
            table { width: 95%; }
            th, td { font-size: 14px; padding: 6px; }
            .search-container { flex-direction: column; gap: 10px; }
            .search-container input[type="search"] { width: 80%; }
        }
    </style>
</head>
<body>
    @include('admin.header')

    <div class="d-flex align-items-stretch">
        @include('admin.sidebar')

        <div class="page-content">
            <div class="container-fluid">

                <!-- Search Section -->
                <form action="{{ url('order_search') }}" method="GET" class="search-container">
                    @csrf
                    <input type="search" name="search" value="{{ request()->search }}" placeholder="Search Orders">
                    <button type="submit">Search</button>
                </form>
                @error('search')
                    <p class="text-danger text-center">{{ $message }}</p>
                @enderror

                <!-- Table Section -->
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Change Status</th>
                                <th>Print PDF</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $data)
                            <tr>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->rec_address }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>{{ $data->product->title }}</td>
                                <td>{{ $data->product->price * $data->quantity }}</td>
                                <td>{{ $data->quantity }}</td>
                                <td><img src="/images/{{ $data->product->image }}"></td>
                                <td>
                                    <span class="{{ $data->status == 'in progress' ? 'status-red' : ($data->status == 'On the way' ? 'status-blue' : 'status-yellow') }}">
                                        {{ $data->status }}
                                    </span>
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ url('on_the_way', $data->id) }}">On the way</a>
                                    <a class="btn btn-success" href="{{ url('delivered', $data->id) }}">Deliver</a>
                                </td>
                                <td>
                                    <a class="btn btn-secondary" href="{{ url('print_pdf', $data->id) }}">Print PDF</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="pagination">
                    {{ $datas->links() }}
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
