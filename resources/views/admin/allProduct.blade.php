@extends('admin.admin_layout')
@section('admin_content')
<div class="all-category-product-wrapper">
    <div class="panel panel-default">
        <div class="panel-heading">
          Liệt kê sản phẩm
        </div>
        {{-- <div class="row w3-res-tb">
          <div class="col-sm-5 m-b-xs">
            <select class="input-sm form-control w-sm inline v-middle">
              <option value="0">Bulk action</option>
              <option value="1">Delete selected</option>
              <option value="2">Bulk edit</option>
              <option value="3">Export</option>
            </select>
            <button class="btn btn-sm btn-default">Apply</button>                
          </div>
          <div class="col-sm-4">
          </div>
          <div class="col-sm-3">
            <div class="input-group">
              <input type="text" class="input-sm form-control" placeholder="Search">
              <span class="input-group-btn">
                <button class="btn btn-sm btn-default" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div> --}}
        <div class="table-responsive">
          <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo "<h2 class='text-success text-center'>";
                        echo $message;
                        echo '</h2>';
                        Session::put('message', null);
                    }
                    ?>
          <table class="table table-striped b-t b-light">
            <thead>
              <tr>
                <th style="width:20px;">
                  <label class="i-checks m-b-none">
                    <input type="checkbox"><i></i>
                  </label>
                </th>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Giảm</th>
                <th>Thành tiền</th>
                <th>Danh mục</th>
                <th>Hiển thị</th>
                <th style="width:100px;">Edit</th>
                <th style="width:100px;">Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($all_product as $each_product)
                  
              <tr>
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                <td>
                    @if ($each_product->product_image_path)
                    <div class="product_image-wrapper">
                        <img class="product_image" src="{{ asset('/public/upload/product/'. $each_product->product_image_path) }}" alt="">
                    </div>
                    @else
                    <img class="product_image" src="" alt="">
                    @endif
                </td>
                <td>{{ $each_product->product_name }}</td>
                <td>{{ $each_product->product_price }}</td>

                <td>{{ $each_product->product_discount }}%</td>
                <td>{{ $each_product->product_price - ($each_product->product_price * $each_product->product_discount / 100) }}</td>

                <td>{{ $each_product->category_name }}</td>
                <td><span class="text-ellipsis">
                  <?php
                  if($each_product->product_status == 0) {
                  ?>
                    <a href="{{ URL::to('/active-product/'.$each_product->product_id) }}"><i class="fa-thumbs-styling text-danger fa-solid fa-thumbs-down"></i></a>
                  <?php 
                  } else {
                    ?>
                    <a href="{{ URL::to('/unactive-product/'.$each_product->product_id) }}"><i class="fa-thumbs-styling text-success fa-solid fa-thumbs-up"></i></a>
                    <?php
                  }
                  ?>
                </span></td>
                
                <td>
                  <a class="btn btn-category btn-primary" href="{{ URL::to('/edit-product/'.$each_product->product_id) }}">
                    <i class="fa-solid fa-pencil"></i>
                    Edit
                  </a>
                </td>
                <td>
                  <a onclick="return confirm('Bạn có chắc chắn xóa sản phẩm này không?')" class="btn btn-category btn-danger" href="{{ URL::to('/delete-product/'.$each_product->product_id) }}">
                    <i class="fa-solid fa-trash"></i>
                    Delete
                  </a>
                </td>
                @endforeach
              
            </tbody>
          </table>
        </div>
        <footer class="panel-footer">
          <div class="row">
            
            <div class="col-sm-5 text-center">
              {{-- <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small> --}}
            </div>
            <div class="col-sm-7 ">                
              <ul class="pagination pagination-sm m-t-none m-b-none">
                <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                <li><a href="">1</a></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">4</a></li>
                <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
              </ul>
            </div>
          </div>
        </footer>
      </div>
</div>
@endsection
