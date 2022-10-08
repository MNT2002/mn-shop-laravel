@extends("layouts.defaultHeaderFooter")
@section("content")

@section("title_page")
<title>{{ $category_title_page->category_name }}</title>
@endsection
<section class="section-products">
    <div class="inner-header">
        <div class="pull-left">
            <div>
                <a href="/mn-shop-laravel">Trang chủ</a>
                /
                <span>{{ $category_title_page->category_name }}</span>
            </div>
        </div>
        <div class="pull-right">
            <h3 class="product-title">{{ $category_title_page->category_name }}</h3>
        </div>
    </div>
    <div class="container">

        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-6 col-lg-4 col-xl-3 product-box">
                <div id="product-1" class="single-product">
                    <div class="part-1">
                        <img src=" {{ asset('/public/upload/product/'. $product->product_image_path) }}">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-solid fa-heart"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('/chi-tiet-san-pham/'.$product->product_id) }}">
                                    <i class="fa-solid fa-info"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="part-2">
                        <h3 class="product-title">{{ $product->product_name }}</h3>
                        <div class="product-price-wrapper">
                            <h4 class="product-old-price">{{ number_format($product->product_price) .'.đ'}}</h4>
                            <h4 class="product-price">{{ number_format($product->product_price) .'.đ'}}</h4>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

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
@endsection