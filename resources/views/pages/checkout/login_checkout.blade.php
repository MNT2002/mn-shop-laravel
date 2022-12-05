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
          <input class="input-order" type="text" placeholder="Vui lòng nhập tên" name="name" id="name" required>
      
          <label for="address"><b>Địa chỉ giao hàng :</b></label>
          <input class="input-order" type="text" placeholder="Vui lòng nhập địa chỉ" name="address" id="address" required>
      
      
          <label for="phonenumber"><b>Số điện thoại :</b></label>
          <input class="input-order" type="text" placeholder="Vui lòng nhập số điện thoại" name="phonenumber" id="phonenumber" required>
          <hr>
      
          <button type="submit" class="registerbtn ">Thanh Toán</button>
        </div>
      </form>
</div>
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
