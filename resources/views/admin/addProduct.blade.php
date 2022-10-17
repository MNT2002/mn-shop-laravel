@extends('admin.admin_layout')
@section('admin_content')
    <div class="all-category-product-wrapper">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm
                </header>
                <div class="panel-body">
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
                        <form role="form" action="{{ URL::to('/save-product') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="productName">Tên sản phẩm</label>
                                <input type="text" name="product_name" class="form-control"
                                    id="productName" placeholder="Tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="productImage">Hình ảnh sản phẩm</label>
                                <input type="file" name="product_image" class="form-control"
                                    id="productImage">
                            </div>
                            <div class="form-group">
                                <label for="productName">Giá sản phẩm (VND)</label>
                                <input type="text" name="product_price" class="form-control"
                                    id="productName" placeholder="Giá sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="productName">Giảm giá (%)</label>
                                <input type="text" name="product_discount" class="form-control"
                                    id="productName" placeholder="" value="0">
                            </div>
                            <div class="form-group">
                                <label for="productDesc">Mô tả sản phẩm</label>
                                <textarea style="resize: none" rows="2" name="product_desc" class="form-control" id="productDesc"
                                    placeholder="Mô tả sản phẩm"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Danh mục sản phẩm</label>
                                <select name="product_category" class="form-control ">
                                    @foreach ($category_product as $category)
                                    <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                        
                                    @endforeach
                                </select>
                            </div>
    
                            <div class="form-group">
                                <label for="">Hiển thị</label>
                                <select name="product_status" class="form-control ">
                                    <option value="0">Ẩn</option>
                                    <option selected value="1">Hiển thị</option>
                                </select>
                            </div>
                            @if ($errors->any())
                                <div class="d-flex flex-column justify-content-center">
                                    @foreach ($errors->all() as $error)
                                        <p class="text-danger text-center">
                                            {{ $error }}
                                        </p>
                                    @endforeach
                                </div>
                            @endif
                            <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
