@extends('layouts.defaultHeaderFooter')
@section('content')
    <section id="cart_items">
        <div class="container section-products">
            <div style="margin-bottom:0" class="inner-header">
                <div class="pull-left">
                    <div>
                        <a href="{{ URL::to('/') }}">Trang chủ</a>
                        /
                        <span>Giỏ hàng</span>
                    </div>
                </div>
                <div class="pull-right">
                    <h3 class="product-title"></h3>
                </div>
            </div>

            <div class="table-responsive cart_info">
                <?php
                $content = Cart::content();
                $subtotal = 0;
                ?>
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="td_title image">Item</td>
                            <td class="td_title Prd-name">Name</td>
                            <td class="td_title price">Price</td>
                            <td class="td_title size">Size</td>
                            <td class="td_title quantity">Quantity</td>
                            <td class="td_title ud-quantity">Update</td>
                            <td class="td_title ud-size">UpdateSize</td>
                            <td class="td_title total">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($content as $v_content)
                            <tr>
                                <td class="td_item cart_product">
                                    <a href="{{ URL::to('chi-tiet-san-pham/' . $v_content->id) }}"><img style="width:120px"
                                            src="{{ asset('/public/upload/product/' . $v_content->options->image) }}"></a>
                                </td>
                                <td class="td_item cart_description">
                                    <h4><a href="">{{ $v_content->name }}</a></h4>
                                </td>
                                <td class="td_item cart_price">
                                    <p>{{ number_format($v_content->price) }} đ</p>
                                </td>
                                <td class="td_item prd_size">
                                    <p>{{ $v_content->options->size }}</p>
                                </td>
                                <td class="td_item cart_quantity">
                                    <div class="cart_quantity_button">
                                        <p>{{ $v_content->qty }}</p>
                                    </div>
                                </td>
                                <td class="td_item">
                                    <form style="position: relative;" action="{{ URL::to('/update-cart-qty') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden"value="{{ $v_content->rowId }}"name='rowId_cart'>
                                        <div class="value-button" id="decrease" onclick="decreaseValue()"
                                            value="Decrease Value">-</div>
                                        <input class="qlt-input" type="number" id="number"name="number" value="1" min="1"
                                            autocomplete="off" />
                                        <div class="value-button" id="increase" onclick="increaseValue()"
                                            value="Increase Value">+</div>
                                        <input type="submit"value='Cập nhật'name='update-qty'class="update-btn btn btn-default btn-sm">
                                    </form>
                                </td>
                                <td class="td_item">
                                    <form style="position: relative;" action="{{ URL::to('/update-cart-size') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden"value="{{ $v_content->rowId }}"name='rowId_cart'>
                                        <select class="wc-select" name="prd_size" value="XS">
                                            <option value="XS">XS</option>
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                        </select>
                                        <input
                                            type="submit"value='Cập nhật'name='update-size'class="update-btn btn btn-default btn-sm">
                                    </form>
                                </td>
                                <td class="td_item cart_total">

                                    <p class="cart_total_price">
                                        {{ number_format($total = $v_content->price * $v_content->qty * (1 - $v_content->options->discount)) }}
                                        đ</p>

                                    <?php
                                    $freq = DB::table('users')
                                        ->get()
                                        ->where('id', Session::get('user_id'))
                                        ->first();
                                    $temp = $freq->freq;
                                    if ($temp == 0) {
                                        $subtotal += $total * 0.9;
                                    } elseif ($temp / 5 == 0) {
                                        $subtotal += $total * 0.85;
                                    } else {
                                        $subtotal += $total;
                                    }
                                    ?>
                                </td>
                                <td class="td_item cart_delete">
                                    <a class="cart_quantity_delete"
                                        href="{{ URL::to('/delete-to-cart/' . $v_content->rowId) }}">
                                        <span class="delete-cart-icon"><i class="fa fa-times"></i></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <p style="margin-bottom: 0"><span style="font-weight:600">SubTotal:  </span>{{ number_format($subtotal) . ' ' . 'đ' }}</p>
                            </td>
                            <td>
                                <?php
                        $name = Session::get('user_name');
                        if ($name) {
                            echo '<a  href="'?>{{ URL::to('/login-checkout') }}"><button class="item__btn btn_thanhtoan">Thanh
                                    Toán</button></a>
                                <?php
                        } else {
                            echo '<a href="'?>{{ URL::to('/login-page') }}"><button class="item__btn btn_thanhtoan">Thanh
                                    Toán</button></a>
                                <?php
                        }
                        ?>
                            </td>
                        </tr>
                </table>
            </div>
        </div>
    </section>
    <!--/#cart_items-->
    @push('scripts')
        <script>
            function increaseValue() {
                var value = parseInt(document.getElementById('number').value, 10);
                value = isNaN(value) ? 0 : value;
                value++;
                document.getElementById('number').value = value;
            }

            function decreaseValue() {
                var value = parseInt(document.getElementById('number').value, 10);
                value = isNaN(value) ? 0 : value;
                value < 1 ? value = 1 : '';
                value--;
                document.getElementById('number').value = value;
            }
        </script>
    @endpush

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
