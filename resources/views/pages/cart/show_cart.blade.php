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
                        <td class="ud-size">UpdateSize</td>
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
                            <form action="{{ URL ::to('/update-cart-qty') }}" method="POST" style="width:150px">
                                {{ csrf_field() }}
                                <input type="hidden"value="{{ $v_content->rowId }}"name ='rowId_cart'>
                                    <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                                    <input class="qlt-input" type="number" id="number"name="number" value="" autocomplete="off"/>
                                    <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
                                    <input type="submit"value='Cập nhật'name='update-qty'class="btn btn-default btn-sm">
                        </form>
                        </td>
                        <td>
                            <form action="{{ URL ::to('/update-cart-size') }}" method="POST">
                                {{ csrf_field() }}
                            <input type="hidden"value="{{ $v_content->rowId }}"name ='rowId_cart'>
                            <select class="wc-select" name="prd_size" value="XS">
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                            <input type="submit"value='Cập nhật'name='update-size'class="btn btn-default btn-sm">
                        </form>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{ number_format($total=$v_content->price*$v_content->qty*(1-$v_content->options->discount))}} VNĐ</p>
                            <?php
                            $freq=DB::table('users')->get()->where('id',Session::get('user_id'))->first();
                            $temp=$freq->freq;
                            if($temp==0 ){
                                          $subtotal+=$total*0.9;
                          }
                             else
                                    if($temp/5==0)
                                     {
                                             $subtotal+=$total*0.85;  
                                     }
                             else
                            {
                                         $subtotal+=$total;
                             }
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
                        <?php
                        $name = Session::get('user_name');
                        if ($name) {
                            echo '<a  href="http://localhost/mn-shop-laravel/login-checkout"><button>Thanh Toán</button></a>';
                        } else {
                            echo '<a href="'?>{{ URL::to("/login-page")}}"><button>Thanh Toán</button></a>
                        <?php
                        }
                        ?>
                    </td>
                   </tr>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->
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
@endsection
