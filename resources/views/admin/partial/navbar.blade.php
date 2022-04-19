<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="index.html">
                    <img src="{{ asset('admin_asset/images/icon/logo.png') }}" alt="CoolAdmin" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="@yield('dashboard_select')">
                    <a class="js-arrow" href="#">
                        <i class=" fas fa-solid fa-list"></i>Dashboard</a>

                </li>
                <li class="@yield('catagory_select')">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-tachometer-alt"></i>Category</a>

                </li>
                <li class=" @yield('coupon_select')">
                    <a href="coupon">
                        <i class=" fas fa-solid fa-tag"></i>Coupon</a>

                </li>


            </ul>
        </div>
    </nav>
</header>
