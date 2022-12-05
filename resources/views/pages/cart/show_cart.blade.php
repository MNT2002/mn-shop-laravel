@extends('layouts.defaultHeaderFooter')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{ URL::to('/') }}">Home</a></li>
            </ol>
        </div>
        
        <div class="table-responsive cart_info">
           <?php
           $content=Cart::content();
            $subtotal=0;
           ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="Prd-name">Name</td>
                        <td class="price">Price</td>
                        <td class='size'>Size</td>
                        <td class="quantity">Quantity</td>
                        <td class="ud-quantity">Update</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $v_content)
                        
                    <tr>
                        <td class="cart_product">
                            <a href=""><img style="width:200px"
                                src="{{ asset('/public/upload/product/' . $v_content->options->image) }}"></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{ $v_content->name }}</a></h4>
                            </td>
                            <td class="cart_price">
                                <p>{{number_format( $v_content->price )}} đ</p>
                        </td>
                        <td class="prd_size">
                            <p>{{ $v_content->options->size }}</p>
                        </td>
                        <td class="cart_quantity" >
                            <div class="cart_quantity_button">
                                <p>{{ $v_content->qty }}</p>
                            </div>
                        </td>
                        <td>
                            <form action="{{ URL ::to('/update-cart-qty') }}" method="POST">
                                {{ csrf_field() }}
                            <input class="cart_quantity_input" type="text" name="quantity" value="" autocomplete="off" size="1">
                            <input type="hidden"value="{{ $v_content->rowId }}"name ='rowId_cart'>
                            <input type="submit"value='Cập nhật'name='update-qty'class="btn btn-default btn-sm">
                        </form>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{ number_format($total=$v_content->price*$v_content->qty)}} đ</p>
                            <?php
                            
                           $subtotal+=$v_content->price*$v_content->qty;
                            ?>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId) }}"><i class="fa fa-times"></i></a>
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
                    <td>    <p>SubTotal: {{ number_format($subtotal).' '.'đ' }}</p>
                    </td>
                    <td>
                        <?php
                        $name = Session::get('user_name');
                        if ($name) {
                            echo '<a  href="'?>{{ URL::to("/login-checkout") }}"><button class="btn_thanhtoan">Thanh Toán</button></a>
                        <?php
                        } else {
                            echo '<a href="'?>{{ URL::to("/login-page")}}"><button class="btn_thanhtoan">Thanh Toán</button></a>
                        <?php
                        }
                        ?>
                    </td>
                   </tr>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->


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
