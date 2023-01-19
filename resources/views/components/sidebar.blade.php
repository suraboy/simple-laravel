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
