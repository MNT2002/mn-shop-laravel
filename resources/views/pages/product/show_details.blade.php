@extends('layouts.defaultHeaderFooter')
@section('content')
    <div class="section-products">
        <div class="inner-header">
            <div class="pull-left">
                <div>
                    <a href="/mn-shop-laravel">Trang chủ</a>
                    /
                    <a href="/mn-shop-laravel/danh-muc-san-pham/{{ $product->category_id }}">
                        {{ $category_parent_page->category_name }}
                    </a>
                    /
                    <span>{{ $product->product_name }}</span>
                </div>
            </div>
            <div class="pull-right">
                <h3 class="product-title">{{ $product->product_id }}</h3>
            </div>
        </div>
        <div class="container-wrapper ">
            <div class="product row p-0 m-0">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="product-gallery">
                        <div class="product-image">
                            <img class="active" src="{{ asset('/public/upload/product/' . $product->product_image_path) }}">
                        </div>
                        <ul class="image-list p-0 m-0">
                            <li class="col-4 image-item"><img
                                    class="active"src="{{ asset('/public/upload/product/' . $product->product_image_path) }}">
                            </li>
                            <li class="col-4 image-item"><img
                                    src="{{ asset('/public/upload/product/' . $product->product_image_path) }}"></li>
                            <li class="col-4 image-item m-0"><img src="{{ asset('/public/upload/userAvata/default.jpg') }}">
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 product-info-box">
                    <h1>{{ $product->product_name }}</h1>
                    <h2>{{ number_format($product->product_price) . '.đ' }}</h2>
                    <div class="description">
                        <p>{{ $product->product_desc }}</p>

                    </div>
                    <p>Tùy chọn:</p>
                    <div class="single-item-options">
                        <select class="wc-select" name="size">
                            <option>Size</option>
                            <option value="XS">XS</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                        <select class="wc-select" name="color">
                            <option>Số lượng</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <a class="add-to-cart" href="#">
                            <i class="fa fa-shopping-cart"></i>
                            Thêm giỏ hàng
                        </a>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        <div class="fb-share-button mt-3" data-href="http://localhost:8080/mn-shop-laravel" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ $url_canonical }}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>

        <div class="fb-comments" data-href="{{ $url_canonical }}" data-width="" data-numposts="20"></div>
            {{-- Recommend product --}}
            <div class="review">
                <div class="header-content">
                    <div class="title">
                        <h3>Sản phẩm liên quan</h3>
                    </div>
                </div>
                <div class="btn-next">
                    <i class="fas btn fa-chevron-right btnRight"></i>
                </div>
                <div class="btn-prev">
                    <i class="fas btn fa-chevron-left btnLeft"></i>
                </div>

                <div class="nav">
                </div>
                <div class="review-box">
                    @foreach ($products as $recommendProduct)
                        <div class="box">
                            <div class="image">
                                <img src="{{ asset('/public/upload/product/' . $recommendProduct->product_image_path) }}"
                                    alt="" />
                            </div>
                            <div class="name">{{ $recommendProduct->product_name }}</div>
                            <div class="price">{{ number_format($recommendProduct->product_price) . '.đ' }}</div>
                            <div class="description">{{ $recommendProduct->product_desc }}</div>
                            <a href="/mn-shop-laravel/chi-tiet-san-pham/{{ $recommendProduct->product_id }}"
                                class="item__btn">
                                <span>XEM SẢN PHẨM</span>
                            </a>
                        </div>
                    @endforeach
                    <!-- end box -->
                </div>
            </div>
        </div>

        @include('layouts.contact')

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

    @push('scripts')
        <script>
            // recommend product
            const reviewDiv = document.querySelector('.review');
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
                    make_slide(3)
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
