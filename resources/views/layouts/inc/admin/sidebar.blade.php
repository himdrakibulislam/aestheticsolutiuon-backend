<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ asset('admin/dashboard') }}" class="brand-link">
        <img src="{{ asset('assets/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex ">
            <div class="image ">
                <img src="{{ asset('assets/img/user.png') }}" class="img-circle elevation-2 bg-white p-1"
                    alt="User Image">

            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
            </div>
        </div>



        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">



                <li class="nav-item">
                    <a href="{{ asset('admin/clients') }}"
                        class="nav-link {{ request()->is('admin/clients') ? 'active' : '' }}">
                        <i class="nav-icon far fa-id-card"></i>
                        <p>Clients</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ asset('admin/projects') }}"
                        class="nav-link {{ request()->is('admin/projects') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-project-diagram"></i>
                        <p>Projects</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ asset('admin/team') }}"
                        class="nav-link {{ request()->is('admin/team') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i><i class=""></i>
                        <p>Team</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ asset('admin/blogs') }}"
                        class="nav-link {{ request()->is('admin/blogs') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>Blog</p>
                    </a>
                </li>





                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                        <p>
                            Categories
                            <i class="nav-icon fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/categories') }}"
                                class="nav-link {{ request()->is('admin/categories') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-list-alt" aria-hidden="true"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/add-category') }}"
                                class="nav-link {{ request()->is('admin/add-category') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-plus"></i>
                                <p>Add-category</p>
                            </a>
                        </li>
                    </ul>


                <li class="nav-item">
                    <a href="{{ asset('admin/materials') }}"
                        class="nav-link {{ request()->is('admin/materials') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-wrench"></i>
                        <p>Materials</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin/posts') }}"
                        class="nav-link {{ request()->is('admin/posts') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-vr-cardboard"></i>
                        <p>Posts</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ asset('admin/media') }}"
                        class="nav-link {{ request()->is('admin/media') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-photo-video"></i>
                        <p>Media </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ asset('admin/app') }}"
                        class="nav-link {{ request()->is('admin/app') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-building"></i>
                        <p>App</p>

                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ asset('admin/change-password') }}"
                        class="nav-link {{ request()->is('admin/change-password') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-lock"></i>
                        <p>Security</p>
                    </a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('admin.logout') }}" method="POST">
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