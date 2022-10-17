@extends('admin.admin_layout')
@section('admin_content')
    <div class="">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật danh mục sản phẩm
                </header>
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
                <div class="panel-body">
                        <div class="position-center">
                            <form role="form" action="{{ URL::to('/update-category-product/'.$edit_category_product->category_id  ) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="categoryProductName">Tên danh mục</label>
                                    <input value="{{ $edit_category_product->category_name }}" type="text" name="category_product_name" class="form-control"
                                        id="categoryProductName" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="categoryProductDesc">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="4" name="category_product_desc" class="form-control" id="categoryProductDesc"
                                        placeholder="Mô tả danh mục">{{ $edit_category_product->category_desc }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="categoryProductDesc">Từ khóa danh mục</label>
                                    <textarea style="resize: none" rows="2" name="category_product_keywords" class="form-control" id="categoryProductDesc">{{ $edit_category_product->meta_keywords }}</textarea>
                                </div>
                               
                                <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật danh
                                    mục</button>
                            </form>
                        </div>

                </div>
            </section>

        </div>
    </div>
@endsection
