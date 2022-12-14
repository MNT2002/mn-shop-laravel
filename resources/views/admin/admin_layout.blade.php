<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ URL::to('public/frontend/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('public/frontend/fonts/fontawesome-free-6.0.0-web/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('public/frontend/css/bases.css') }}" rel="stylesheet">
    <link href="{{ URL::to('public/backend/css/admin_layout.css') }}" rel="stylesheet">
    <link href="{{ URL::to('public/backend/css/addCategoryProduct.css') }}" rel="stylesheet">
    <link href="{{ URL::to('public/backend/css/allCategoryProduct.css') }}" rel="stylesheet">
    <link href="{{ URL::to('public/backend/css/Order.css') }}" rel="stylesheet">


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
                    @if (Session::get('admin_image_path'))
                        <img class="nav-item__img" alt="" src="{{ asset('public/upload/userAvata') }}<?php $image = Session::get('admin_image_path');echo '/';echo $image;?>">
                    @else
                        <img class="nav-item__img" alt="" src="{{ asset('public/upload/userAvata/default.jpg')}}">
                    @endif

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
                    <div class="form-logged__title-wrapper">
                        <h1>
                            Xin ch??o
                            <span class="form-logged__title">
                                <?php
                                    $name = Session::get('admin_name');
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
                                H??? s??
                                <i class="icon-angle-right fa-solid fa-angle-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="/hotro" class="form-logged__link">
                                C??i ?????t
                                <i class="icon-angle-right fa-solid fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="sign-out-box">
                        <li class="sign-out-btn">
                            <a class="sign-out-btn__link" href="{{ URL::to('/logout') }}">????ng xu???t</a>
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
                    <a class="sidebar-link" href="{{ URL::to('/dashboard') }}"><i class="fas fa-home"></i>T???ng quan</a>
                </li>
                
                <label for="checkbox-cate-product" class="sidebar-item">
                    <div class="sidebar-link" ><i class="fas fa-solid fa-clipboard-list"></i>Danh m???c s???n ph???m</div>
                </label>
                <input id="checkbox-cate-product" class="d-none" type="checkbox" name="" id="">
                <ul class="sub sub-nav-cate-product sidebar-list">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ URL::to('/add-category-product') }}">Th??m danh m???c s???n ph???m</a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ URL::to('/all-category-product') }}">Li???t k?? danh m???c s???n ph???m</a>
                    </li>
                </ul>
                
                <label for="checkbox-product" class="sidebar-item">
                    <div class="sidebar-link" ><i style="margin-right: 8px" class="fa-brands fa-product-hunt"></i>S???n ph???m</div>
                </label>
                <input id="checkbox-product" class="d-none" type="checkbox" name="" id="">
                <ul class="sub sub-nav-product sidebar-list">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ URL::to('/add-product') }}">Th??m s???n ph???m</a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ URL::to('/all-product') }}">Li???t k?? s???n ph???m</a>
                    </li>
                </ul>

                <label for="checkbox-users" class="sidebar-item">
                    <div class="sidebar-link" ><i class="fas fa-users"></i>Ng?????i d??ng</div>
                </label>
                <input id="checkbox-users" class="d-none" type="checkbox" name="" id="">
                <ul class=" sub sub-nav-users sidebar-list">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ URL::to('/users/create') }}">Th??m ng?????i d??ng</a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ URL::to('/users') }}">Danh s??ch</a>
                    </li>
                </ul>

                <label for="checkbox-order" class="sidebar-item">
                    <div class="sidebar-link" ><i class="fa-sharp fas fa-solid fa-bag-shopping"></i>????n h??ng</div>
                </label>
                <input id="checkbox-order" class="d-none" type="checkbox" name="" id="">
                <ul class=" sub sub-nav-order sidebar-list">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ URL::to('/un-order') }}">????n ch??a duy???t</a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ URL::to('/ordered') }}">????n ???? duy???t</a>
                    </li>
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
