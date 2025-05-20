<!DOCTYPE html>
<html>
<head> 
@include('admin.css')
</head>
<body>
	@include('admin.header')

	<div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')

      <div class="page-content">
      	        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
          </div>
        </div>

      </div>

    </div>
    @include('admin.scripts')

</body>
</html>
    

