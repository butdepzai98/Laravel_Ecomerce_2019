@extends('client.layout.master')
@section('title')
    Trang Checkout (Trang Giỏ Hàng)
@endsection

@section('header-top')
    <div class="page-head_agile_info_w3l">
    </div>
@endsection

@section('content')
    <div class="services-breadcrumb">
        <div class="agile_inner_breadcrumb">
            <div class="container">
                {{ Breadcrumbs::render('checkout', $breadcumb) }}
            </div>
        </div>
    </div>

    <div class="privacy py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2">
            <!-- tittle heading -->
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                <span>C</span>heckout
            </h3>
            <!-- //tittle heading -->
            <div class="checkout-right">
                <h4 class="mb-sm-4 mb-3">Giỏ Hàng Đang Có:
                    <span>{!! Cart::getTotalQuantity() !!} Sản Phẩm</span>
                </h4>
                <div class="table-responsive">
                    <table class="timetable_sub">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Sản Phẩm</th>
                                <th>Số Lượng</th>
                                <th>Tên</th>

                                <th>Đơn Giá</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt=1;?>
                            @foreach($cart as $value)
                                <tr class="rem{!! $value->id !!}">
                                    <td class="invert">{!! $stt++ !!}</td>
                                    <td class="invert-image">
                                        <a href="">
                                        <img src="upload/img/product/{{ $value->attributes["img"] }}" alt="" class="img-responsive">
                                        </a>
                                    </td>
                                    <td class="invert">
                                        <div class="quantity">
                                            <div class="quantity-select">
                                                <div class="entry value">
                                                    <input type="number" name="quantity" class="quantity" data-id="{{ $value->id }}" min="1" value="{{ $value->quantity }}">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="invert">{{ $value->name }}</td>
                                    <td class="invert">{{ number_format($value->price, 0, ' ', '.') }} VNĐ</td>
                                    <td class="invert">
                                        <div class="rem">
                                            <a class="close1" data-id="{!! $value->id !!}"> </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                                <tr>
                                    <td colspan="4" class="text-danger font-weight-bold">Thành tiền: </td>
                                    <td colspan="2" class="table-danger">{!! number_format(Cart::getSubTotal(), 0, ' ', '.') !!} VNĐ</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="checkout-left">
                <div class="address_form_agile mt-sm-5 mt-4">
                    <a href="{!! route('payment') !!}" class="btn btn-outline-primary">Thêm địa chỉ nhận hàng</a>
                    <div class="checkout-right-basket">
                        <a href="{!! route('payment') !!}">Thanh Toán
                            <span class="far fa-hand-point-right"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection