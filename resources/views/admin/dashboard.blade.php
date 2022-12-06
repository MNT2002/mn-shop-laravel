@extends('admin.admin_layout')

@section('admin_content')
    <style>
        .dashboard-box {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 120px;
        }

        .all-user-icon__btn {
            position: relative;
        }

        .all-user-icon__notification,
        .all-order-icon__notification {
            position: absolute;
            right: -16px;
            top: -16px;
            z-index: 100;
            display: inline-block;
            min-width: 38px;
            padding: 9px 8px;
            font-size: 14px;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            background-color: rgb(198, 32, 32);
            border-radius: 50%;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
            border: 2px solid var(--text-color)
        }

        .all-user-icon__notification {
            background-color: rgb(4, 255, 0);
        }

        .all-user-icon__notification:hover,
        .all-order-icon__notification:hover {
            background-color:
        }
    </style>

    <div class="all-category-product-wrapper">
        <div class="panel panel-default">
            <div class="panel-heading">
                Chào mừng bạn đến với Admin Page
            </div>

            <div class="table-responsive">
                <div class="dashboard-box">
                    <button class="status-btn all-user-icon__btn">
                        Người dùng
                        <span class="all-user-icon__notification">
                            {{ $users }}
                        </span>
                    </button>

                    <button class="status-btn all-order-icon__btn">
                        Đơn hàng
                        <span class="all-order-icon__notification">
                            {{ $orders }}
                        </span>
                    </button>

                </div>
            </div>
        </div>
    </div>
@endsection
