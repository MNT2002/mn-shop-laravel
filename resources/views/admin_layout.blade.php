<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ 'public/frontend/bootstrap-5.0.2-dist/css/bootstrap.min.css' }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ 'public/frontend/fonts/fontawesome-free-6.0.0-web/css/all.min.css' }}">
    <link href="{{ 'public/frontend/css/bases.css' }}" rel="stylesheet">
    <link href="{{ 'public/backend/css/admin_layout.css' }}" rel="stylesheet">


    <title>Dashboard</title>
</head>

<body>
    <div class="navbar bg-dark navbar-dark p-0 m-0 navbar-wrapper">
        <div class="page-title-wrapper p-5">
            <h2 class="page-title">Admin</h2>
        </div>

        <ul class=" nav-list__admin">
            <!-- Dropdown -->
            <li class="nav-item__admin">
                <div class="nav-item-wrapper">
                    <img class="nav-item__img" alt="" src="{{ 'public/backend/images/image1.jpg' }}">
                    <span class="nav-item__username">
                        <?php
                        $name = Session::get('admin_name');
                        if($name) {
                            echo $name;
                        }
                        ?>
                    </span>
                    <span class="nav-item__icon-dropdown">
                        <i class="fa-solid fa-angle-down"></i>
                    </span>
                </div>
            </li>
            <div class="form-logged-overlay"></div>
            <div class="form-logged">
                <nav class="form-logged-wrapper">
                    <ul class="form-logged__list">
                        <li>
                            <a href="/thongtintaikhoan" class="form-logged__link">
                                Hồ sơ
                                <i class="icon-angle-right fa-solid fa-angle-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="/hotro" class="form-logged__link">
                                Cài đặt
                                <i class="icon-angle-right fa-solid fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="sign-out-box">
                        <li class="sign-out-btn">
                            <a class="sign-out-btn__link" href="{{ URL::to('/logout') }}">Đăng xuất</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </ul>
    </div>
    <div class="wrapper d-flex">
        <div class="sidebar">
            <ul class="sidebar-list">
                <li class=" sidebar-item">
                    <a class="sidebar-link" href="{{ URL::to('/dashboard') }}"><i class="fas fa-home"></i>Tổng quan</a>
                </li>
                <label for="checkbox-tempt" class="sidebar-item">
                    <div class="sidebar-link" ><i class="fas fa-users"></i>Danh mục sản phẩm</div>
                </label>
                <input id="checkbox-tempt" class="d-none" type="checkbox" name="" id="">
                <ul class="sub sidebar-list">
                    <li class="sidebar-item"><a class="sidebar-link" href="">Thêm danh mục</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="">Liệt kê danh mục</a></li>
                </ul>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="#"><i class="fas fa-user"></i>Login Page</a>
                </li>
            </ul>
        </div>
        <div class="main-content">
            @yield('admin_content')
        </div>
    </div>
</body>

<script>

</script>

<script>
    const navItemAdmin = document.querySelector('.nav-item__admin')
    const formLogged = document.querySelector('.form-logged')
    const formLoggedOverlay = document.querySelector('.form-logged-overlay')

    function showFormLogged() {
        formLoggedOverlay.style.display = 'block'
        formLogged.style.display = 'block';
    }
    function hideFormLogged() {
        formLogged.style.display = 'none';
        formLoggedOverlay.style.display = 'none';
    }

    navItemAdmin.addEventListener('click', showFormLogged)
    formLoggedOverlay.addEventListener('click', hideFormLogged)
</script>

</html>
