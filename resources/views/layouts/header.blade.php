<div class="d-lg-flex justify-content-around text-white banner-header-box">
    <div class="p-2">
        <a href="#" class="text-white banner-link">
            Miễn phí giao hàng với đơn hàng lớn hơn 1 triệu đồng
        </a>
    </div>
    <div class="p-2">
        <a href="#" class="text-white banner-link">
            Đổi trả hàng đơn giản
        </a>
    </div>
    <div class="p-2">
        <a href="#" class="text-white banner-link">
            Nay đã có thẻ thanh toán bằng ZaloPay
        </a>
    </div>
</div>

{{-- Header --}}
<header class="header">
    {{-- {/* Nav bar */} --}}
    <div class="header__navbar">
        <div class="header__navbar-list header__bar-icon">
            <li class="header__navbar-item header__navbar-item-bar">
                <i class="fa-solid fa-bars"></i>
            </li>
            @include('layouts.mobileMenu')
        </div>

        <div class="header__logo">
            <a href="{{ URL::to('/') }}">MN Shop</a>
        </div>

        <ul class="header__navbar-list flex-right justify-content-end">
            <li class="header__navbar-item cart-icon">
                <a class="cart-link" href="{{ URL::to('/show_cart') }}">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </li>

            <li class="header__navbar-item-user header__navbar-item">
                <?php
                $name = Session::get('user_name');
                if ($name) {
                    echo '<a class="header__navbar-item-user-link" href="\mn-shop-laravel/login-page"><i class="fa-solid fa-user"></i></a>';
                } else {
                    echo '<a href="'?>{{ URL::to("/login-page")}}"><i class="fa-solid fa-user"></i></a>
                <?php
                }
                ?>
            </li>

            @include('layouts.formUser')

            <li class="header__navbar-item header__navbar-item-search">
                <form class="form-mini-search" action="{{ URL::to('/tim-kiem') }}" method="POST">
                    @csrf
                    <div class="search-button-wrap">
                        <div class="search-button-icon">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <button type="submit" class="search-button search-button-link">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                    <div class="search-input-wrap">
                        <input name="search_keywords" type="text" placeholder="Tìm kiếm sản phẩm..." />
                    </div>
                    <div class="js-close-button close-button-wrap">
                        <div class="close-button-icon">
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                    </div>
                </form>
            </li>
        </ul>
    </div>

    {{-- {/* Header Menu */} --}}
    <div class="header-menu-wrap">
        <div class="header-menu">
            <ul class="menu-list">
                @section('categories')
                {{-- <li class="menu-item">
                    <a href="/aothun">
                        <span class="menu-item-name">Áo thun</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/aosomi">
                        <span class="menu-item-name">Áo sơ mi</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#">
                        <span class="menu-item-name">Áo khoác jeans</span>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="#">
                        <span class="menu-item-name">Phụ kiện</span>
                    </a>
                </li>      --}}
                @show
            </ul>
        </div>
    </div>
</header>