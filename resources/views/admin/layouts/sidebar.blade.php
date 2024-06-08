<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link">
        <img src="{{ asset('admin-assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                {{-- content setion --}}
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                   
            
                    <li class="nav-item has-treeview">

                        <a href="{{route('admin.category.index')}}" class="nav-link">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>
                                دسته بندی ها
                            </p>
                        </a>

                    </li>

                </ul>

    

            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
