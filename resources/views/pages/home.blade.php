@extends("layouts.defaultHeaderFooter")
@section("content")
{{-- slider --}}
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

    <div class="product-best-sellers">
        <div class="product-best-sellers__title">
            <h3>SẢN PHẨM MỚI NHẤT</h3>
        </div>
        <div class="btn-next">
            <i class="fas btn fa-chevron-right btnRight"></i>
        </div>
        <div class="btn-prev">
            <i class="fas btn fa-chevron-left btnLeft"></i>
        </div>

        <div class="row p-0 m-0 product-best-seller-wrapper">
            <div class="review-box">
                @foreach ($newProducts as $recommendProduct)
                    <div class="box">
                        <div class="image">
                            <img src="{{ asset('/public/upload/product/' . $recommendProduct->product_image_path) }}"
                                alt="" />
                        </div>
                        <div class="name">{{ $recommendProduct->product_name }}</div>
                        <div class="price">{{ number_format($recommendProduct->product_price) . '.đ' }}</div>
                        {{-- <div class="description">{{ $recommendProduct->product_desc }}</div> --}}
                        <a href="/mn-shop-laravel/chi-tiet-san-pham/{{ $recommendProduct->product_id }}"
                            class="item__btn">
                            <span>XEM SẢN PHẨM</span>
                        </a>
                    </div>
                @endforeach
                <!-- end box -->
                ...
            </div>
        </div>
        </div>

        <div class="product-best-sellers__border-bottom">
            <hr />
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

    @include('layouts.contact')

    @section("categories")
    @foreach ($categories as $category)
    <li class="menu-item">
        <a href="{{ URL::to("/danh-muc-san-pham/".$category->category_id) }}">
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

    $messageSucces = Session::get("message_success");
    if($messageSucces) {
    ?>
        @push("scripts")
        <script>
            alert("Đăng nhập thành công")
        </script>
        @endpush
    <?php
        Session::put("message_success", null);
    }
    ?>

    <?php
    $messageSuccesSignUp = Session::get("message_success_signUP");
    if($messageSuccesSignUp) {
    ?>
        @push("scripts")
        <script>
            alert("Đăng kí thành công")
        </script>
        @endpush
    <?php
        Session::put("message_success_signUP", null);
    }
    ?>
     @push('scripts')
     <script>
         // recommend product
         const reviewDiv = document.querySelector('.product-best-seller-wrapper');
         const wrapperBox = document.querySelector('.review-box');
         const listBox = document.querySelectorAll('.box');
         const btnLeft = document.querySelector('.btnLeft');
         const btnRight = document.querySelector('.btnRight');

         document.addEventListener("DOMContentLoaded", () => {
             // responsive
             window.addEventListener("resize", function() {
                 if (window.innerWidth >= 1024) {
                     make_slide(3)
                 } else if (window.innerWidth >= 740) {
                     make_slide(2)
                 } else {
                     make_slide(1);
                 }
             })

             const media = [
                 window.matchMedia('(min-width: 1024px)'),
                 window.matchMedia('(min-width: 740px)'),
             ]

             if (media[0].matches) {
                 make_slide(4)
             } else if (media[1].matches) {
                 make_slide(2)
             } else {
                 make_slide(1)
             }

         });

         function make_slide(amountSLideAppear) {
             const widthItem = reviewDiv.offsetWidth / amountSLideAppear;

             let widthAllBox = widthItem * listBox.length; //Chiều dài của toàn bộ item
             wrapperBox.style.width = `${widthAllBox}px`;

             listBox.forEach(element => {
                 element.style.marginRight = '10px';
                 element.style.marginLeft = '10px';
                 element.style.width = `${widthItem - 20}px`
             })

             // Xử lí slide button
             let count = 0;
             let spacing = widthAllBox - widthItem * amountSLideAppear;
             btnRight.addEventListener('click', function() {
                 count += widthItem;

                 if (count > spacing) {
                     count = 0
                 }
                 wrapperBox.style.transform = `translateX(${-count}px)`
             })
             btnLeft.addEventListener('click', function() {
                 count -= widthItem;

                 if (count < 0) {
                     count = spacing
                 }
                 wrapperBox.style.transform = `translateX(${-count}px)`
             })
         }
     </script>
 @endpush
@endsection
