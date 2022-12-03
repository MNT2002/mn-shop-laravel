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
                                <p>{{number_format( $v_content->price )}} VNĐ</p>
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
                            <p class="cart_total_price">{{ number_format($total=$v_content->price*$v_content->qty)}} VNĐ</p>
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
                    <td>    <p>SubTotal: {{ number_format($subtotal).' '.'VNĐ' }}</p>
                    </td>
                    <td>
                    <a href="#"><Button>Thanh Toán</Button></a>
                    </td>
                   </tr>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

@endsection
