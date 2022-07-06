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
                <li class="@yield('order_select')">
                    <a  href="{{ route('admin.order') }}">
                      <i class="fas fa-bag-shopping"></i>Order</a>

                </li>
                <li class="@yield('catagory_select')">
                    <a class="js-arrow" href="{{ route('admin.category') }}">
                        <i class="fas fa-tachometer-alt"></i>Category</a>

                </li>
                <li class=" @yield('coupon_select')">
                    <a href="{{ route('admin.coupon') }}">
                        <i class=" fas fa-solid fa-tag"></i>Coupon</a>

                </li>
                <li class=" @yield('size_select')">
                    <a href="route('admin.size')">
                        <i class=" fas fa-solid fa-tag"></i>Size</a>

                </li>
                <li class=" @yield('color_select')">
                    <a href="{{ route('admin.color') }}">
                        <i class=" fas fa-solid fa-tag"></i>color</a>

                </li>
                <li class=" @yield('product_select')">
                    <a href="{{ route('admin.product') }}">
                        <i class="fa-brands fa-product-hunt"></i>product</a>

                </li>
                <li class=" @yield('brand_select')">
                    <a href="{{ route('admin.brand') }}">
                        <i class=" fas fa-solid fa-tag"></i>Brand</a>

                </li>
                <li class=" @yield('tax_select')">
                    <a href="{{ route('admin.tax') }}">
                        <i class="fa-solid fa-percent"></i>Tax</a>

                </li>
                <li class=" @yield('banner_select')">
                    <a href="{{ route('admin.banner') }}">
                        <i class="fa-brands fa-adversal"></i>Banner</a>

                </li>
                <li class=" @yield('customers_select')">
                    <a href="{{ route('admin.customer') }}">
                        <i class="fas fa-users"></i>Customers</a>

                </li>



            </ul>
        </div>
    </nav>
</header>
