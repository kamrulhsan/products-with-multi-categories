<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('product-categories.*') ? 'active' : '' }}"> 
            <a class="nav-link" href="{{ route('product-categories.index') }}">
                <i class="mdi mdi-steam menu-icon"></i>
                <span class="menu-title">Product Categories</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('products.*') ? 'active' : '' }}"> 
            <a class="nav-link" href="{{ route('products.index') }}">
                <i class="mdi mdi-sitemap menu-icon"></i>
                <span class="menu-title">Products</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('product-purchases.*') ? 'active' : '' }}"> 
            <a class="nav-link" href="{{ route('product-purchases.index') }}">
                <i class="mdi mdi-cart menu-icon"></i>
                <span class="menu-title">Product Purchase</span>
            </a>
        </li>
        
    </ul>
</nav>
