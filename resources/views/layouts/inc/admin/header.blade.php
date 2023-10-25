 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
         <li class="nav-item">
             <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
         </li>
         
         <li class="nav-item d-none d-sm-inline-block">
             <a href="{{ asset('admin/dashboard') }}" class="nav-link">Home</a>
         </li>
         <li class="nav-item d-none d-sm-inline-block">
             <a href="{{ asset('admin/dashboard/admins') }}"
                 class="nav-link {{ request()->is('admin/dashboard/admins') ? 'text-success' : '' }} ">Admins</a>
         </li>
         <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ env('FRONTEND_URL') }}" 
          target="_blank"
          class="nav-link"><i class="fas fa-globe-europe"></i></a>
      </li>
     </ul>

     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
         <!-- Navbar Search -->
         <li class="nav-item">
             <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                 <i class="fas fa-search"></i>
             </a>
             <div class="navbar-search-block">
                 <form class="form-inline">
                     <div class="input-group input-group-sm">
                         <input class="form-control form-control-navbar" type="search" placeholder="Search"
                             aria-label="Search">
                         <div class="input-group-append">
                             <button class="btn btn-navbar" type="submit">
                                 <i class="fas fa-search"></i>
                             </button>
                             <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                 <i class="fas fa-times"></i>
                             </button>
                         </div>
                     </div>
                 </form>
             </div>
         </li>

         <!-- Notifications Dropdown Menu -->
         <li class="nav-item dropdown">
             <a class="nav-link" data-toggle="dropdown" href="#">
                 <i class="far fa-bell"></i>
                 <span
                     class="badge badge-warning navbar-badge">{{ Auth::guard('admin')->user()->notifications->count() }}</span>
             </a>
             <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                 <span class="dropdown-item dropdown-header"> Notifications</span>

                 <div style="overflow: scroll;" class="overflow-auto">
                     @foreach (Auth::guard('admin')->user()->notifications as $notification)
                         <div class="dropdown-divider"></div>
                         <a href="#" class="dropdown-item">
                             <i class="fas fa-envelope mr-2"></i>
                             <small>{{ $notification->data['notification'] }}</small>
                             {{-- <span class="float-right text-muted text-sm">3 mins</span> --}}
                         </a>
                         <div class="dropdown-divider"></div>
                     @endforeach
                 </div>

                 <div class="dropdown-divider"></div>

                 <a class="dropdown-item dropdown-footer" href="{{ url('admin/notifications') }}">See all
                     Notifications</a>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                 <i class="fas fa-expand-arrows-alt"></i>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                 role="button">
                 <i class="fas fa-th-large"></i>
             </a>
         </li>
     </ul>
 </nav>
 <!-- /.navbar -->
