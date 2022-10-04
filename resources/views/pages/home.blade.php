@extends("layouts.defaultHeaderFooter")
@section("content")
    <div class="slide">
        <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="8000">
                    <img src="{{ ("public/frontend/images/slider/slider-2.jpg") }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Chất lượng</h3>
                    <p>Sản phẩm nhập khẩu từ nước ngoài với các loại chất liệu tốt</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="8000">
                    <img src="{{ ("public/frontend/images/slider/slider-3.jpg") }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Đa dạng</h3>
                    <p>Sản phẩm được chọn lọn với nhiều mẫu mã khác nhau </p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="8000">
                    <img src="{{ ("public/frontend/images/slider/slider-4.jpg") }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Giá rẻ</h3>
                    <p>Sản phẩm chất lượng mà giá cả phải chăng</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="category-banner-block">
        <div class="row m-0 p-0">
            <div class="col-12 col-md-6 col-lg-6 category-banner-box">
                <a href="">
                    <div class="category-banner-item category-banner-item__ao-thun">
                        <div class="label-box">
                            <div class="label-wrap">
                                <h4>ÁO THUN</h4>
                                <span>
                                    <p>Xem ngay</p>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-6 category-banner-box">
                <a href="">
                    <div class="category-banner-item category-banner-item__ao-somi">
                        <div class="label-box">
                            <div class="label-wrap">
                                <h4>ÁO SƠ MI</h4>
                                <span>
                                    <p>Xem ngay</p>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="row p-0 m-0">
                <div class="col-6 col-md-4 col-lg-4 category-banner-box">
                    <a href="">
                        <div class="category-banner-item category-banner-item__ao-khoac-jeans">
                            <div class="label-box">
                                <div class="label-wrap">
                                    <h4>ÁO KHOÁC JEANS</h4>
                                    <span>
                                        <p>Xem ngay</p>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-4 category-banner-box">
                    <a href="">
                        <div class="category-banner-item category-banner-item__phu-kien">
                            <div class="label-box">
                                <div class="label-wrap">
                                    <h4>PHỤ KIỆN</h4>
                                    <span>
                                        <p>Xem ngay</p>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-4 col-lg-4 category-banner-box">
                    <a href="">
                        <div class="category-banner-item category-banner-item__other">
                            <div class="label-box">
                                <div class="label-wrap">
                                    <h4>sẢN PHẦM NỔI BẬT</h4>
                                    <span>
                                        <p>Xem ngay</p>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
