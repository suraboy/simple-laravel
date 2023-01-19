<!-- Sidebar user panel (optional) -->
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <span class="fa-stack"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-user fa-stack-1x fa-inverse"></i></span>
    </div>
    <div class="info">
        <a href="{{route('users.info')}}" class="d-block">{{Auth::user()->name}}</a>
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
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-header">Main Menu</li>
        <li class="nav-item">
            <a href="{{route('homepage')}}" class="nav-link" id="dashboard">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('products.index')}}" class="nav-link" id="product">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                    Product
                </p>
            </a>
        </li>
        <div class="dropdown-divider"></div>
        <li class="nav-item">
            <a href="{{route('users.info')}}" class="nav-link" id="profile">
                <i class="nav-icon fas fa-cog" aria-hidden="true"></i>
                <p>
                    Setting
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt fa-fw"></i>
                <p>Log Out</p>
            </a>
        </li>
    </ul>
</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<!-- /.sidebar-menu -->
