@extends('admin.admin_layout')
@section('admin_content')
    <div class="all-category-product-wrapper">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thêm người dùng
            </div>
            
            <form class="form" action="/mn-shop-laravel/users" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Avata</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" name="image">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="name" type="text" placeholder="Nhập tên đăng nhập của bạn">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="email" type="email" placeholder="Nhập email của bạn">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="password" type="password" placeholder="Nhập mật khẩu">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Confirm password</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="confirm_password" type="password" placeholder="Nhập lại mật khẩu">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Quyền hạn</label>
                    <div class="col-sm-10 d-flex align-items-center">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="quyen" id="quyen1" value="0" checked="">
                            <label class="form-check-label" for="quyen1">Thường</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="quyen" id="quyen0" value="1">
                            <label class="form-check-label" for="quyen0">Admin</label>
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-sm-12">
                        <button style="width:100%" type="submit" class="btn btn-primary">Thêm</button>
                    </div>
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

            </form>
        </div>
    </div>
@endsection
