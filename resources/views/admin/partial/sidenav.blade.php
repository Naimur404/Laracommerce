<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{ asset('admin_asset/images/icon/logo.png') }}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="@yield('dashboard_select')">
                    <a href="dashboard">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>

                </li>
                <li class="@yield('category_select')">
                    <a href="category">
                        <i class=" fas fa-solid fa-list"></i>Category</a>

                </li>
                <li class=" @yield('coupon_select')">
                    <a href="coupon">
                        <i class=" fas fa-solid fa-tag"></i>Coupon</a>

                </li>



            </ul>
        </nav>
    </div>
</aside>
