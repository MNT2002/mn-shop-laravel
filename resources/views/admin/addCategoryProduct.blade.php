@extends('admin.admin_layout')
@section('admin_content')
    <div class="all-category-product-wrapper">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm danh mục sản phẩm
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
                        <form role="form" action="{{ URL::to('/save-category-product') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="categoryProductName">Tên danh mục</label>
                                <input type="text" name="category_product_name" class="form-control"
                                    id="categoryProductName" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="categoryProductDesc">Mô tả danh mục</label>
                                <textarea style="resize: none" rows="4" name="category_product_desc" class="form-control" id="categoryProductDesc"
                                    placeholder="Mô tả danh mục"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Hiển thị</label>
                                <select name="category_product_status" class="form-control ">
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
                            <button type="submit" name="add_category_product" class="btn btn-info">Thêm danh mục</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
