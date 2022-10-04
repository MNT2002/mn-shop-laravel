@extends("layouts.defaultHeaderFooter")
@section("content")
<div class="form-sign-up">
    <div class="sign-up-wrapper">
        {{-- <div class="sign-up-close-button">
            <i class="fa-solid fa-xmark"></i>
        </div> --}}
        <h1>Đăng kí</h1>
        <div class="sign-up-box-left col-md-6 col-12">
            <form class="form" action="/mn-shop-laravel/user-sign-up" method="post">
                @csrf
                <div class="input-box">
                    <h3>Email</h3>
                    <input type="email" class="input-email" name="email" placeholder="Nhập địa chỉ email"/>

                    <h3>Username</h3>
                    <input type="text" class="input-user-name" name="name" placeholder="Nhập tên tài khoản"/>

                    <h3>Password</h3>
                    <input type="password" class="input-password" name="password" placeholder="Nhập mật khẩu"/>
                    <h3>Confirm password</h3>
                    <input type="password" class="input-password" name="confirm_password" placeholder="Nhập lại mật khẩu"/>

                </div>
                <label htmlFor="agree" class="accept-rules-box">
                    <div class="accept-rules__checkbox">
                        <input class="d-none" id="agree" name="agree" type="checkbox" />
                        <label htmlFor="agree"></label>
                    </div>
                    <span class="agree-title">Tôi đồng ý với các quy tắc và điều kiện</span>
                </label>
                <button>Tạo tài khoản</button>
                @if ($errors->any())
                <div class="d-flex flex-column justify-content-center">
                    @foreach ($errors->all() as $error)
                        <p class="text-danger text-center">
                            {{ $error }}
                        </p>
                    @endforeach
                </div>
            @endif

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
                    <h5>Bạn đã có tài khoản?</h5>
                    <a class="button-sign-in" href="login-page">
                        Đăng nhập
                    </a>
                </div>
            </form>
        </div>
        <div class="sign-up-box-right col-md-6">
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
@endsection