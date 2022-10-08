<div class="nav-overlay"></div>
<nav class="nav__mobile">
    <label class="nav__mobile-close">
        <i class="fa-solid fa-xmark"></i>
    </label>

    <ul class="nav__mobile-list">
        <li class="nav__mobile-item-title">
            <h1 class="form-logged-mobile__title-wrapper">
                Xin chào
                <span class="form-logged-mobile__title">
                    <?php
                        $name = Session::get('user_name');
                        if($name) {
                            echo $name;
                        }
                        ?>
                </span>
            </h1>
        </li>
        {{-- {/* Áo thun  */} --}}
        <li>
            <a href="/aothun" class="nav__mobile-link">
                áo thun
                <i class="fa-solid fa-angle-right icon-angle-right"></i>
            </a>
        </li>
        {{-- {/* Áo sơ mi */} --}}
        <li>
            <a href="" class="nav__mobile-link">
                Áo sơ mi
                <i class="fa-solid fa-angle-right icon-angle-right"></i>
            </a>
        </li>
        {{-- {/* Áo khoác Jeans */} --}}
        <li>
            <a href="" class="nav__mobile-link">
                Áo khoác Jeans
                <i class="fa-solid fa-angle-right icon-angle-right"></i>
            </a>
        </li>
        {{-- {/* Phu kien */} --}}
        <li>
            <a href="" class="nav__mobile-link">
                PHỤ KIỆN
                <i class="fa-solid fa-angle-right icon-angle-right"></i>
            </a>
        </li>
    </ul>

    <ul class="custom-link">
        <li class="custom-link-item custom-link-item__info">
                        <a href="#">
                            <i class="custom-link-icon fa-solid fa-user"></i>
                            Tài khoản
                        </a>
                    </li>
                    <li class="custom-link-item custom-link-item__supp">
                        <a href="#">
                            <i class="custom-link-icon fa-solid fa-envelope"></i>
                            Liên hệ hỗ trợ
                        </a>
                    </li> 
        <li class="custom-link-item user-icon-mobile ">
            <a href="login-page">
                <i class="custom-link-icon fa-solid fa-user"></i>
                Tài khoản
            </a>
        </li>
        <li class="signout-mobile-btn">
            <a href="user-logout">
                Đăng xuất
            </a>
        </li>
    </ul>
</nav>
