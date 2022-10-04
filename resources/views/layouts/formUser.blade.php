
<div class="form-logged-overlay"></div>
<div class="form-logged">
    <nav class="form-logged-wrapper">
        <div class="form-logged__title-wrapper">
            <h1>
                Xin chào
                <span class="form-logged__title">
                    <?php
                        $name = Session::get('user_name');
                        if($name) {
                            echo $name;
                        }
                        ?>
                </span>
            </h1>
        </div>
        <ul class="form-logged__list">
            <li>
                <a href="/thongtintaikhoan" class="form-logged__link">
                    Tài khoản
                    <i class="icon-angle-right fa-solid fa-angle-right"></i>
                </a>
            </li>
            <li>
                <a href="/hotro" class="form-logged__link">
                    Liên hệ hỗ trợ
                    <i class="icon-angle-right fa-solid fa-angle-right"></i>
                </a>
            </li>
        </ul>

        <ul class="sign-out-box">
            <li class="sign-out-btn">
                <a href="user-logout">Đăng xuất</a>
            </li>
        </ul>
    </nav>
</div>
