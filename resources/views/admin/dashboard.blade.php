@extends('admin.admin_layout')

@section('admin_content')

    <div class="all-category-product-wrapper">
        <div class="panel panel-default">
            <div class="panel-heading">
                Chào mừng bạn đến với Admin Page
            </div>

            <div class="table-responsive">
                <div class="dashboard-box">
                    <a href="{{ URL::to('/users') }}" class="status-btn all-user-icon__btn">
                        Người dùng
                        <span class="all-user-icon__notification">
                            {{ $users }}
                        </span>
                    </a>

                    <a href="{{ URL::to('/ordered') }}" class="status-btn all-order-icon__btn">
                        Đơn đã duyệt
                        <span class="all-user-icon__notification">
                            {{ $orders }}
                        </span>
                    </a>

                    <a href="{{ URL::to('/un-order') }}" class="status-btn all-order-icon__btn">
                        Đơn chưa duyệt
                        <span class="all-order-icon__notification">
                            {{ $orders }}
                        </span>
                    </a>

                </div>
            </div>
        </div>
    </div>
@endsection
