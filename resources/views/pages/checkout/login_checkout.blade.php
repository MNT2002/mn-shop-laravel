@extends("layouts.defaultHeaderFooter")
@section("content")
<div class="info-user">
    <form action="{{ URL::to('/checkout-info') }}"  method="POST">
        {{ csrf_field() }}
        <div class="container">
          <h1>Thông tin nhận hàng</h1>
          <p>Vui lòng điền các thông tin dưới đây</p>
          <hr>
      
          <label for="name"><b>Họ và Tên người nhận :</b></label>
          <input type="text" placeholder="Vui lòng nhập tên" name="name" id="name" required>
      
          <label for="address"><b>Địa chỉ giao hàng :</b></label>
          <input type="text" placeholder="Vui lòng nhập địa chỉ" name="address" id="address" required>
      
      
          <label for="phonenumber"><b>Số điện thoại :</b></label>
          <input type="text" placeholder="Vui lòng nhập số điện thoại" name="phonenumber" id="phonenumber" required>
          <hr>
      
          <button type="submit" class="registerbtn">Thanh Toán</button>
        </div>
      </form>
</div>
@endsection