<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{asset('admin/dashboard')}}" class="brand-link">
      <img src="{{asset('assets/img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Ekantomart</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex ">
        <div class="image ">
          <img src="{{asset('assets/img/user.png')}}" class="img-circle elevation-2 bg-white p-1" alt="User Image">
          
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::guard('admin')->user()->name}}</a>
        </div>
      </div>
      
      

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
               
              
              <li class="nav-item">
                <a href="{{asset('admin/users')}}" class="nav-link {{request()->is('admin/users') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Users</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{asset('admin/social/users')}}" class="nav-link {{request()->is('admin/social/users') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Social Users</p>
                </a>
              </li>
              

              <li class="nav-item">
                <a href="{{asset('admin/sliders')}}" class="nav-link {{request()->is('admin/sliders') ? 'active' : ''}}">
                  <i class="fas fa-sliders-h"></i>
                  <p>Sliders</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{asset('admin/media')}}" class="nav-link {{request()->is('admin/media') ? 'active' : ''}}">
                  <i class="fas fa-photo-video"></i>
                  <p>Media</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{asset('admin/orders')}}" class="nav-link {{request()->is('admin/orders') ? 'active' : ''}}">
                  <i class="fas fa-cart-plus"></i>
                  <p>Orders</p>
                </a>
              </li>

          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-list-alt" aria-hidden="true"></i>
              <p>
                Categories
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/categories')}}" class="nav-link {{request()->is('admin/categories') ? 'active':''}}">
                  <i class="fa fa-list-alt" aria-hidden="true"></i>
                  <p>Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/add-category')}}" class="nav-link {{request()->is('admin/add-category') ? 'active':''}}">
                  <i class="fas fa-plus"></i>
                  <p>Add-category</p>
                </a>
              </li>
            </ul>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-business-time"></i>
              <p>
                Brands
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/brands')}}" class="nav-link {{request()->is('admin/brands') ? 'active':''}}">
                  <i class="fas fa-business-time"></i>
                  <p>Brands</p>
                </a>
              </li>
              
            </ul>
              


           
           

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fab fa-product-hunt"></i>
                <p>
                Products
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/products')}}" class="nav-link">
                    <i class="fab fa-product-hunt"></i>
                    <p>Products</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/add-product')}}" class="nav-link {{request()->is('admin/add-product') ? 'active': ''}}">
                    <i class="fas fa-plus"></i>
                    <p>Add-Product</p>
                  </a>
                </li>
              </ul>


            <li class="nav-item">
                <a href="{{asset('admin/location')}}" class="nav-link {{request()->is('admin/location') ? 'active' : ''}}">
                  <i class="fas fa-map-marker-alt"></i>
                  <p>Shop Info...</p>
                </a>
              </li>
          
          
            <li class="nav-item">
              <a href="{{asset('admin/change-password')}}" class="nav-link {{request()->is('admin/change-password') ? 'active' : ''}}">
                <i class="fas fa-window-maximize"></i>
                <p>Change Admin password</p>
              </a>
            </li>
          <li class="nav-item">
            <form action="{{route('admin.logout')}}" method="POST">
              @csrf
              <button type="submit" class="btn btn-info w-100 ">
                <i class="fas fa-sign-out-alt"></i>
                Logout
              </button>
            </form>
            
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>