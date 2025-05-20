            <nav id="sidebar">
        <!-- Sidebar Header-->
      
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">





                <li class="active"><a href="{{url('admin/dashboard')}}"> <i class="icon-home"></i>Home </a></li>
                <li><a href="{{url('view_category')}}"> <i class="icon-grid"></i>Category </a></li>
                                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Products </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{url('add_product')}}">Add Product</a></li>
                    <li><a href="{{url('view_product')}}">View Product</a></li>
                    
                  </ul>
                </li>
                <li><a href="{{url('view_order')}}"> <i class="icon-grid"></i>Order </a></li>
                                <li><a href="{{url('/admin/messages')}}"> <i class="icon-grid"></i>Message </a></li>

      </nav>