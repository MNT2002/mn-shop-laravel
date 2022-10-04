@extends('admin.admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm danh mục sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form">
                        <div class="form-group">
                            <label for="categoryProductName">Tên danh mục</label>
                            <input type="text" name="category_product_name" class="form-control" id="categoryProductName" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="categoryProductDesc">Password</label>
                            <textarea style="resize: none" rows="4" name="category_product_desc" class="form-control" id="categoryProductDesc" placeholder="Mô tả danh mục"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Hiển thị</label>
                            <select class="form-control ">
                                <option>Ẩn</option>
                                <option>Hiển thị</option>
                            </select>
                        </div>
                        <button type="submit" name="add_category_product" class="btn btn-info">Thêm</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
</div>
@endsection
