@extends('admin.admin_layout')
@section('admin_content')
    <div class="all-category-product-wrapper">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật thông tin sản phẩm
                </header>
                <div class="panel-body">
                    @if ($errors->any())
                    <div class="d-flex flex-column justify-content-center">
                        @foreach ($errors->all() as $error)
                            <p class="text-danger text-center">
                                {{ $error }}
                            </p>
                        @endforeach
                    </div>
                @endif
                    <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo "<h2 class='text-success text-center'>";
                        echo $message;
                        echo '</h2>';
                        Session::put('message', null);
                    }
                    ?>

                    <div class="position-center">
                        @foreach ($edit_product as $product)
                            
                        <form role="form" action="{{ URL::to('/update-product/'.$product->product_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="productName">Tên sản phẩm</label>
                                <input type="text" name="product_name" class="form-control"
                                    id="productName" value="{{ $product->product_name }}">
                            </div>
                            <div class="form-group">
                                <label for="productImage">Hình ảnh sản phẩm</label>
                                <input type="file" name="product_image" class="form-control"
                                    id="productImage">
                                <div class="product_image-wrapper">
                                    <img class="product_image" src="{{ asset('/public/upload/product/'. $product->product_image_path) }}" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="productName">Giá sản phẩm</label>
                                <input type="text" name="product_price" class="form-control"
                                    id="productName" value="{{ $product->product_price }}">
                            </div>
                            <div class="form-group">
                                <label for="productDesc">Mô tả sản phẩm</label>
                                <textarea style="resize: none" rows="2" name="product_desc" class="form-control" id="productDesc">{{ $product->product_desc }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Danh mục sản phẩm</label>
                                <select name="product_category" class="form-control ">
                                    @foreach ($category_product as $category)
                                    @if ($category->category_id == $product->category_id)
                                    <option selected="" value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                    @else
                                    <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                    @endif
                                        
                                    @endforeach
                                </select>
                            </div>
    
                            <div class="form-group">
                                <label for="">Hiển thị</label>
                                <select name="product_status" class="form-control ">
                                    @if ($product->product_status == 0)
                                    <option selected value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                    @else
                                    <option value="0">Ẩn</option>
                                    <option selected value="1">Hiển thị</option>
                                    @endif
                                </select>
                            </div>
                           
                            <button type="submit" name="add_product" class="btn btn-info">Cập nhật sản phẩm</button>
                        </form>
                        @endforeach
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
