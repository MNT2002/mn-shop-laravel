<div class="form-sign-up">
    <div class="sign-up-wrapper">
        <div class="sign-up-close-button">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <h1>Đăng kí</h1>
        <div class="sign-up-box-left col-md-6 col-12">
            <form>
                <div class="input-box">
                    <h3>Username</h3>
                    <input type="text" class="input-user-name" name="username" placeholder="Nhập tên tài khoản"
                        required />

                    <h3>Password</h3>
                    <input type="password" class="input-password" name="password" placeholder="Nhập mật khẩu"
                        required />

                    <h3>E-mail</h3>
                    <input type="email" class="input-email" name="email" placeholder="Nhập địa chỉ email"
                        required />
                </div>
                <label htmlFor="agree" class="accept-rules-box">
                    <div class="accept-rules__checkbox">
                        <input class="d-none" id="agree" name="agree" type="checkbox" />
                        <label htmlFor="agree"></label>
                    </div>
                    <span class="agree-title">Tôi đồng ý với các quy tắc và điều kiện</span>
                </label>
                <button>Tạo tài khoản</button>

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
                    <span class="button-sign-in" href="">
                        Đăng nhập
                    </span>
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

<div class="form-sign-in">
    <div class="sign-in-wrapper">
        <div class="sign-in-close-button">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <h1>Đăng nhập</h1>
        <div class="sign-in-box-left col-md-6 col-12">
            <form>
                <div class="input-box">
                    <h3>Username</h3>
                    <input type="text" name="usernamelogin" class="input-user-name"
                        placeholder="Nhập tên đăng nhập" />

                    <h3>Password</h3>
                    <input type="password" name="passwordlogin" class="input-password" placeholder="Nhập mật khẩu" />
                </div>

                <button>Đăng nhập</button>

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
                    <span class="button-sign-up" href="">
                        Đăng kí ngay
                    </span>
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

<div class="form-logged-overlay"></div>
<div class="form-logged">
    <nav class="form-logged-wrapper">
        <div class="form-logged__title-wrapper">
            <h1>
                Xin chào
                <span class="form-logged__title">
                    {{-- {(localStorage.getItem("UserLogging") !== null ) ? (JSON.parse(localStorage.getItem("UserLogging")).customer.username) : ""} --}}
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
                <span>Đăng xuất</span>
            </li>
        </ul>
    </nav>
</div>
