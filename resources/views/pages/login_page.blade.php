@extends("layouts.defaultHeaderFooter")
@section("content")
@section("title_page")
<title>Đăng nhập</title>
@endsection
<div class="form-sign-in">
    <div class="sign-in-wrapper">
        {{-- <div class="sign-in-close-button">
            <i class="fa-solid fa-xmark"></i>
        </div> --}}
        <h1>Đăng nhập</h1>

        <div class="sign-in-box-left col-md-6 col-12">
            <form action="{{ URL::to('/user-login') }}" method="POST">
                {{ csrf_field() }}
                <div class="input-box">
                    <h3>Email</h3>
                    <input type="text" name="email_login" class="input-user-name"
                        placeholder="Nhập email của bạn" />

                    <h3>Password</h3>
                    <input type="password" name="password_login" class="input-password" placeholder="Nhập mật khẩu" />
                </div>

                <button type="submit">Đăng nhập</button>
                <?php
                $message = Session::get('message');
                if($message) {
                  echo "<h2 class='error-title pt-3'>";
                  echo $message;
                  echo "</h2>";
                  Session::put('message', null);
                }
                ?>
                <div class="forget-wrapper">
                    <a href="#">Quên mật khẩu?</a>
                </div>

                <div class="connect-other-account">
                    <div class="line-wrapper">
                        <div class="line"></div>
                        <span>Hoặc</span>
                        <div class="line"></div>
                    </div>

                    <div class="connect-other-account-wrapper">
                        <div class="connect-other-account-box connect-other-box-facebook">
                            <div style="marginRight: 6px" class="connect-other-account__icon">
                                <i class="fa-brands fa-facebook-f"></i>
                            </div>
                            <div class="connect-other-account__name">Facebook</div>
                        </div>
                        <div class="connect-other-account-box connect-other-box-google">
                            <div style="marginRight: 6px" class="connect-other-account__icon">
                                <i class="fa-brands fa-google"></i>
                            </div>
                            <div class="connect-other-account__name">Google</div>
                        </div>
                    </div>
                </div>

                <div class="haven-account-wrapper">
                    <h5>Bạn muốn tạo tại khoản mới?</h5>
                    <a class="button-sign-up" href="sign-up-page">
                        Đăng kí ngay
                    </a>
                </div>
            </form>
        </div>
        <div class="sign-in-box-right col-md-6">
            <div class="connect-other-wrapper">
                <div class="connect-other-box connect-other-box-facebook">
                    <div style="marginLeft: 6px" class="icon-connect-other">
                        <i class="fa-brands fa-google"></i>
                    </div>
                    <div class="connect-content">
                        <span>Đăng nhập bằng Facebook</span>
                    </div>
                </div>
            </div>
            <div class="connect-other-wrapper">
                <div class="connect-other-box connect-other-box-google">
                    <div style="marginLeft: 6px" class="icon-connect-other">
                        <i class="fa-brands fa-facebook-f"></i>
                    </div>
                    <div class="connect-content">
                        <span>Đăng nhập bằng Google</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="or-box">Or</div>
    </div>
</div>
@section('categories')
        @foreach ($categories as $category)
            <li class="menu-item">
                <a href="{{ URL::to('/danh-muc-san-pham/' . $category->category_id) }}">
                    <span class="menu-item-name">{{ $category->category_name }}</span>
                </a>
            </li>
        @endforeach
@endsection

@section("categories_mobile_menu")
@foreach ($categories as $category)
<li>
    <a href="{{ URL::to("/danh-muc-san-pham/".$category->category_id) }}" class="nav__mobile-link">
        {{ $category->category_name }}
        <i class="fa-solid fa-angle-right icon-angle-right"></i>
    </a>
</li>
@endforeach
@endsection

@endsection

<?php
  $name = Session::get('user_name');
    if($name) {
    ?>
        @push("scripts")
        <script>
            userIconMobile.style.display = 'none'
        </script>
        @endpush
    <?php
    } else {
    ?>
        @push("scripts")
        <script>
            // userIconMobile.style.display = 'none'
            linkSupportMobile.style.display = 'none'
            linkInfoMobile.style.display = 'none'
            signoutBtn.style.display = 'none'
        </script>
        @endpush
    <?php
    }
?>