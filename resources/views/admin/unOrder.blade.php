@extends('admin.admin_layout')
@section('admin_content')
    @foreach ($oder_id as $item)
    <div class="col-md-12">
            @foreach ($oder as $o)
                @if ($o->oder_id == $item->oder_id)
            <div class="row justify-content-center" style="margin: 0">
                <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                            <div class="oder-title">
                                Đơn hàng chưa duyệt
                            </div>
                            <div class="row">
                                <div class="receipt-header">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="receipt-left">
                                            <img class="img-responsive" alt=""
                                                src="{{ asset('/public/upload/userAvata/default.jpg') }}"
                                                style="width: 71px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="receipt-header receipt-header-mid d-flex">
                                    <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                                        <div class="receipt-right">
                                            <p><b>Tên khách hàng: </b> {{ $o->name }}</p>
                                            <p><b>SĐT: </b>{{ $o->phonenumber }}</p>
                                            <p><b>Địa chỉ: </b>{{ $o->address }} </p>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="receipt-right">
                                            <p><b>Mã đơn: #</b>{{ $o->oder_id }}</p>
                                            <p><b>Ngày :</b> 15 Aug 2016</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       

                    <div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tên SP</th>
                                    <th>SL</th>
                                    <th>Size</th>
                                    <th>Giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($oder_detail as $i)
                                    @if ($i->oder_id == $item->oder_id)
                                        <tr>
                                            <td class="">
                                                <div style="max-width: 218px;overflow: hidden;">{{ $i->product_name }}</div>
                                            </td>
                                            <td class="">{{ $i->qty }}</td>
                                            <td class="">{{ $i->size }}</td>
                                            <td class="">{{ $i->total_price }} đ</td>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">
                                        <h2><strong>Tổng: </strong></h2>
                                    </td>
                                    <td class="text-left text-danger">
                                        <h2><strong> {{ $o->subtotal }} </strong></h2>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="receipt-header receipt-header-mid receipt-footer">
                            <div class="accept__btn-wrapper">
                                <a href="{{ URL::to('/order/'.$o->oder_id) }}" class="accept__btn">
                                    Duyệt đơn
                                </a>
                            </div>

                            {{-- <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                                <div class="receipt-right">
                                    <p><b>Ngày :</b> 15 Aug 2016</p>
                                    <h5 style="color: rgb(140, 140, 140);">Cảm ơn đã mua hàng!</h5>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="receipt-left">
                                    <h1></h1>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @break
        @endif
        @endforeach
    @endforeach
@endsection
