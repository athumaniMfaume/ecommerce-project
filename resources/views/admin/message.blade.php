<!DOCTYPE html>
<html>
<!-- head -->
<head>
  @include('admin.css')

  <style type="text/css">
    input[type='text'] {
      width: 400px;
      height: 50px;
    }

    .div_deg {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 30px;
    }

    .table_deg {
      text-align: center;
      margin: auto;
      border: 2px solid yellowgreen;
      margin-top: 50px;
      width: 100%;
      max-width: 1000px;
    }

    th {
      background-color: skyblue;
      padding: 15px;
      font-size: 20px;
      font-weight: bold;
      color: white;
    }

    td {
      color: white;
      padding: 10px;
      border: 1px solid skyblue;
    }
  </style>
</head>
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
      <div class="page-header">
        <div class="container-fluid">
          <h1 style="color: white;">Contact Messages</h1>

          <div>
            <table class="table_deg">
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Sent At</th>
                <th>Action</th>
              </tr>

              @forelse($messages as $msg)
                <tr>
                  <td>{{ $msg->name ?? 'N/A'}}</td>
                  <td>{{ $msg->email ?? 'N/A'}}</td>
                  <td>{{ $msg->phone ?? 'N/A' }}</td>
                  <td>{{ $msg->message ?? 'N/A'}}</td>
                  <td>{{ $msg->created_at->format('d M Y H:i') ?? 'N/A' }}</td>
                  <td><a class="btn btn-danger" onclick="confirmation(event)" href="{{ route('admin.deleteMessage', $msg->id) }}">Delete</a>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5">No messages found.</td>
                </tr>
              @endforelse
            </table>
          </div>

          <div class="div_deg">
            {{ $messages->onEachSide(1)->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
      <!-- JavaScript files-->
    <script type="text/javascript">
      function confirmation(ev){
        ev.preventDefault();
        var urlToRedirect=ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);

        swal({

          title:"Are You Sure To Delete This",
          text:"This Delete Will be Permanently",
          icon:"warning",
          buttons:true,
          dangerMode:true,

        })

        .then((willCancel)=>{
          if (willCancel) {
            window.location.href=urlToRedirect;
          }

        });
      }
    </script>

  <!-- JavaScript files-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="{{ asset('/admincss/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('/admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
  <script src="{{ asset('/admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
  <script src="{{ asset('/admincss/vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('/admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('/admincss/js/charts-home.js') }}"></script>
  <script src="{{ asset('/admincss/js/front.js') }}"></script>
</body>
</html>
