@extends('admin.admin_layout')
@section('admin_content')
<div class="all-category-product-wrapper">
    <div class="panel panel-default">
        <div class="panel-heading">
          Liệt kê danh mục sản phẩm
        </div>
    
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
                <th>Tên danh mục</th>
                <th>Hiển thị</th>
                <th style="width:100px;">Edit</th>
                <th style="width:100px;">Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($all_category_product as $each_cate_pro)
                  
              <tr>
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                <td>{{ $each_cate_pro->category_name }}</td>
                <td><span class="text-ellipsis">
                  <?php
                  if($each_cate_pro->category_status == 0) {
                  ?>
                    <a href="{{ URL::to('/active-category-product/'.$each_cate_pro->category_id) }}"><i class="fa-thumbs-styling text-danger fa-solid fa-thumbs-down"></i></a>
                  <?php 
                  } else {
                    ?>
                    <a href="{{ URL::to('/unactive-category-product/'.$each_cate_pro->category_id) }}"><i class="fa-thumbs-styling text-success fa-solid fa-thumbs-up"></i></a>
                    <?php
                  }
                  ?>
                </span></td>
                
                <td>
                  <a class="btn btn-category btn-primary" href="{{ URL::to('/edit-category-product/'.$each_cate_pro->category_id) }}">
                    <i class="fa-solid fa-pencil"></i>
                    Edit
                  </a>
                </td>
                <td>
                  <a onclick="return confirm('Bạn có chắc chắn xóa danh mục này không?')" class="btn btn-category btn-danger" href="{{ URL::to('/delete-category-product/'.$each_cate_pro->category_id) }}">
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
