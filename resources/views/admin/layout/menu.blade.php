<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="admin/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    @if(Auth::user()->role == 1 || Auth::user()->role == 2)
            <!-- Nav Item - Product Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Products</span>
                </a>
                <div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Quản lý sản phẩm:</h6>
                        <a class="collapse-item" href="admin/product">Danh sách sản phẩm</a>
                        <a class="collapse-item" href="admin/product/create">Thêm sản phẩm</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Category Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Category</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Quản lý danh mục:</h6>
                        <a class="collapse-item" href="admin/category">Xem Danh Mục</a>
                        <h6 class="collapse-header">Quản lý loại sản phẩm:</h6>
                        <a class="collapse-item" href="admin/producttype">Product Type</a>
                    </div>
                </div>
            </li>
    @endif
            
    @if(Auth::user()->role == 1 || Auth::user()->role == 3)
        <!-- Nav Item - Order Menu -->
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Ecommerce</span>
            </a>
            <div id="collapsePages" class="collapse @if(Auth::user()->role == 3)show @endif" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Quản lý đơn hàng:</h6>
                    <a class="collapse-item" href="admin/order">Order</a>
                    <a class="collapse-item" href="admin/orderdetail">Order Detail</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">Quản lý Khách Hàng:</h6>
                    <a class="collapse-item" href="admin/user">User</a>
                    <a class="collapse-item" href="admin/customer">Customer</a>
                    <a class="collapse-item" href="admin/contact">Contact</a>
                </div>
            </div>
        </li>
    @endif
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>