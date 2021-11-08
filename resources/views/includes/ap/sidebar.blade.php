<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link {{ (strpos(Route::currentRouteName(), 'dashboard') == 0) ? '' : 'active' }}" href="{{ url('ap/dashboard') }}">
                <i class="menu-icon fas fa-tachometer-alt"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'categories') == 0) ? '' : 'active' }}" href="{{ url('ap/categories') }}">
                <i class="menu-icon fas fa-book"></i>
                <span class="menu-title">Kategori</span>
            </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">
                <i class="menu-icon fab fa-product-hunt"></i>
                <span class="menu-title">Alat Pancing</span>
            </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">
                <i class="menu-icon fas fa-shopping-basket"></i>
                <span class="menu-title"> Pesanan</span>
            </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">
                <i class="menu-icon fas fa-inbox"></i>
                <span class="menu-title">Kotak Pesan</span>
            </a>
        </li>
    </ul>
    <hr>
    <ul class="nav">
        <hr>
        <li class="nav-item">
        <a class="nav-link" href="#">
                <i class="menu-icon  fas fa-cog"></i>
                <span class="menu-title"> Setting</span>
            </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">
                <i class="menu-icon fas fa-user-cog"></i>
                <span class="menu-title"> Reset Password</span>
            </a>
        </li>
    </ul>
    <hr>
    <ul class="nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}">
                <i class="menu-icon fas fa-globe-asia"></i>
                <span class="menu-title"> Liat Website</span>
            </a>
        </li>
    </ul>
</nav>