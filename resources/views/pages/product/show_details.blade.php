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
                    <h3 class="product-title">{{ $product->product_name }}</h3>
                </div>
            </div>
        <div class="container-wrapper ">
            <div class="product row p-0 m-0">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="product-gallery">
                        <div class="product-image d-none d-md-block d-lg-block">
                            <img class="active" src="{{ asset('/public/upload/product/'. $product->product_image_path) }}">
                        </div>
                        <ul class="image-list p-0 m-0">
                            <li class="col-4 image-item"><img class="active"src="{{ asset('/public/upload/product/'. $product->product_image_path) }}"></li>
                            <li class="col-4 image-item"><img src="{{ asset('/public/upload/product/'. $product->product_image_path) }}"></li>
                            <li class="col-4 image-item m-0"><img src="{{ asset('/public/upload/userAvata/default.jpg') }}"></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 product-info-box">
                    <h1>{{ $product->product_name }}</h1>
                    <h2>{{ number_format($product->product_price).'.đ' }}</h2>
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
								<a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
                </div>
            </div>
        </div>
        {{-- <div class="grid related-products">
            <div class="column-xs-12">
                <h3>You may also like</h3>
            </div>
            <div class="column-xs-12 column-md-4">
                <img src="https://source.unsplash.com/miziNqvJx5M">
                <h4>Succulent</h4>
                <p class="price">$19.99</p>
            </div>
            <div class="column-xs-12 column-md-4">
                <img src="https://source.unsplash.com/2y6s0qKdGZg">
                <h4>Terranium</h4>
                <p class="price">$19.99</p>
            </div>
            <div class="column-xs-12 column-md-4">
                <img src="https://source.unsplash.com/6Rs76hNbIWE">
                <h4>Cactus</h4>
                <p class="price">$19.99</p>
            </div>
        </div> --}}
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
@endsection
