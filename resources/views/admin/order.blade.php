<!DOCTYPE html>
<html>
    <!-- head -->
    @include('admin.css')
    <style type="text/css">
        body {
            background-color: #222;
            color: white;
        }

        .table-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            background-color: #333;
            color: white;
            text-align: center;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.1);
        }

         <style  type="text/css">

      input[type='text']
      {
        width: 400px;
        height: 50px;

      }

      input[type='search']
      {
        width: 500px;
        height: 60px;
        margin-left: 50px;

      }

      .div_deg{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px;
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

        th, td {
            padding: 10px;
            border: 1px solid white;
            word-wrap: break-word;
        }

        th {
            background-color: #444;
            font-size: 18px;
            font-weight: bold;
        }

        td img {
            width: 80px;
            border-radius: 5px;
        }

        .status-red { color: red; }
        .status-blue { color: skyblue; }
        .status-yellow { color: yellow; }

        .btn {
            padding: 6px 12px;
            font-size: 14px;
        }

        .btn-primary { background-color: blue; }
        .btn-success { background-color: green; }
        .btn-secondary { background-color: gray; }

        @media (max-width: 768px) {
            table {
                width: 95%;
            }

            th, td {
                font-size: 14px;
                padding: 6px;
            }
        }

        /* Pagination Styling */
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
            background-color: skyblue;
        }

        .pagination .active {
            background-color: skyblue;
            color: black;
        }

        .pagination .disabled {
            color: #ccc;
            cursor: not-allowed;
        }
    </style>
    <!-- end head -->
<body>
    <!-- header -->
    @include('admin.header')
    <!-- end header -->

    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->

        <div class="page-content">
            <div class="container-fluid">
              <br>
<form action="{{ url('order_search') }}" method="GET">
    @csrf
    <input type="search" name="search" value="{{ request()->search }}" placeholder="Search Orders">
    <input type="submit" class="btn btn-secondary" value="Search">
</form>
@error('search')
<div>
  <p class="text-danger">{{ $message }}</p>
  </div>
@enderror

                <div class="table-container">
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Change Status</th>
                            <th>Print Pdf</th>
                        </tr>

                        @foreach($datas as $data)
                        <tr>
                            <td>{{$data->name}}</td>
                            <td>{{$data->rec_address}}</td>
                            <td>{{$data->phone}}</td>
                            <td>{{$data->product->title}}</td>
                            <td>{{$data->product->price}}</td>
                            <td>
                                <img src="/images/{{$data->product->image}}">
                            </td>
                            <td>
                                <span class="{{ $data->status == 'in progress' ? 'status-red' : ($data->status == 'On the way' ? 'status-blue' : 'status-yellow') }}">
                                    {{$data->status}}
                                </span>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{url('on_the_way', $data->id)}}">On the way</a>
                                <a class="btn btn-success" href="{{url('delivered', $data->id)}}">Deliver</a>
                            </td>
                            <td>
                                <a class="btn btn-secondary" href="{{url('print_pdf', $data->id)}}">Print PDF</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>

                <!-- Pagination Links -->
                <div class="pagination">
                    {{ $datas->links() }}
                </div>
            </div>
        </div>
    </div>

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
