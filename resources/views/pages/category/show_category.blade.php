@extends('layouts.defaultHeaderFooter')
@section('content')

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
                                <img src=" {{ asset('/public/upload/product/' . $product->product_image_path) }}">
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
                                        <a href="{{ URL::to('/chi-tiet-san-pham/' . $product->product_id) }}">
                                            <i class="fa-solid fa-info"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="part-2">
                                <h3 class="product-title">{{ $product->product_name }}</h3>
                                <div class="product-price-wrapper">
                                    @if ($product->product_discount != 0)
                                        <h4 class="product-old-price">{{ number_format($product->product_price) . ' đ' }}
                                        </h4>
                                    @endif
                                    <h4 class="product-price">
                                        {{ number_format($product->product_price - ($product->product_price * $product->product_discount) / 100) . ' đ' }}
                                    </h4>
                                </div>
                            </div>

                            @if ($product->product_discount != 0)
                                <div class="home-product-item__sale-off">
                                    <span
                                        class="home-product-item__sale-off-percent">{{ $product->product_discount }}%</span>
                                    <span class="home-product-item__sale-off-label">GIẢM</span>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
                {{-- {{ $products->links() }} --}}

            </div>
        </div>
    </section>

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
@section('categories_mobile_menu')
    @foreach ($categories as $category)
        <li>
            <a href="{{ URL::to('/danh-muc-san-pham/' . $category->category_id) }}" class="nav__mobile-link">
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
@push('scripts')
<script>
    userIconMobile.style.display = 'none'
</script>
@endpush
<?php
    } else {
    ?>
@push('scripts')
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
