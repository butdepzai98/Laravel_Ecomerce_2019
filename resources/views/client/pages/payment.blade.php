@extends('client.layout.master')
@section('title')
    Trang Thanh Toán
@endsection

@section('header-top')
    <div class="page-head_agile_info_w3l">
    </div>
@endsection

@section('content')
{{-- <div class="privacy py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>P</span>ayment</h3>
        <!-- //tittle heading -->
        <div class="checkout-right">
            <!--Horizontal Tab-->
            <div id="parentHorizontalTab" style="display: block; width: 100%; margin: 0px;">
                <ul class="resp-tabs-list hor_1">
                    <li class="resp-tab-item hor_1 resp-tab-active" aria-controls="hor_1_tab_item-0" role="tab" style="background-color: white; border-color: rgb(193, 193, 193);">Cash on delivery (COD)</li>
                    <li class="resp-tab-item hor_1" aria-controls="hor_1_tab_item-1" role="tab" style="background-color: rgb(245, 245, 245); border-color: rgb(193, 193, 193);">Credit/Debit</li>
                    <li class="resp-tab-item hor_1" aria-controls="hor_1_tab_item-2" role="tab" style="background-color: rgb(245, 245, 245); border-color: rgb(193, 193, 193);">Net Banking</li>
                    <li class="resp-tab-item hor_1" aria-controls="hor_1_tab_item-3" role="tab" style="background-color: rgb(245, 245, 245); border-color: rgb(193, 193, 193);">Paypal Account</li>
                </ul>
                <div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193);">

                    <h2 class="resp-accordion hor_1 resp-tab-active" role="tab" aria-controls="hor_1_tab_item-0" style="background: none white; border-color: rgb(193, 193, 193);"><span class="resp-arrow"></span>Cash on delivery (COD)</h2><div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
                        <div class="vertical_post check_box_agile">
                            <h5>COD</h5>
                            <div class="checkbox">
                                <div class="check_box_one cashon_delivery">
                                    <label class="anim">
                                        <input type="checkbox" class="checkbox">
                                        <span> We also accept Credit/Debit card on delivery. Please Check with the agent.</span>
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-1" style="background-color: rgb(245, 245, 245); border-color: rgb(193, 193, 193);"><span class="resp-arrow"></span>Credit/Debit</h2><div class="resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-1">
                        <form action="#" method="post" class="creditly-card-form agileinfo_form">
                            <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                                <div class="credit-card-wrapper">
                                    <div class="first-row form-group">
                                        <div class="controls">
                                            <label class="control-label">Name on Card</label>
                                            <input class="billing-address-name form-control" type="text" name="name" placeholder="John Smith">
                                        </div>
                                        <div class="w3_agileits_card_number_grids my-3">
                                            <div class="w3_agileits_card_number_grid_left">
                                                <div class="controls">
                                                    <label class="control-label">Card Number</label>
                                                    <input class="number credit-card-number form-control" type="text" name="number" inputmode="numeric" autocomplete="cc-number" autocompletetype="cc-number" x-autocompletetype="cc-number" placeholder="•••• •••• •••• ••••">
                                                </div>
                                            </div>
                                            <div class="w3_agileits_card_number_grid_right mt-2">
                                                <div class="controls">
                                                    <label class="control-label">CVV</label>
                                                    <input class="security-code form-control" Â·="" inputmode="numeric" type="text" name="security-code" placeholder="•••">
                                                </div>
                                            </div>
                                            <div class="clear"> </div>
                                        </div>
                                        <div class="controls">
                                            <label class="control-label">Expiration Date</label>
                                            <input class="expiration-month-and-year form-control" type="text" name="expiration-month-and-year" placeholder="MM / YY">
                                        </div>
                                    </div>
                                    <button class="submit mt-3">
                                        <span>Make a payment </span>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-2" style="background-color: rgb(245, 245, 245); border-color: rgb(193, 193, 193);"><span class="resp-arrow"></span>Net Banking</h2><div class="resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-2">
                        <div class="vertical_post">
                            <form action="#" method="post">
                                <h5>Select From Popular Banks</h5>
                                <div class="swit-radio">
                                    <div class="check_box_one">
                                        <div class="radio_one">
                                            <label>
                                                <input type="radio" name="radio" checked="">
                                                <i></i>Syndicate Bank</label>
                                        </div>
                                    </div>
                                    <div class="check_box_one">
                                        <div class="radio_one">
                                            <label>
                                                <input type="radio" name="radio">
                                                <i></i>Bank of Baroda</label>
                                        </div>
                                    </div>
                                    <div class="check_box_one">
                                        <div class="radio_one">
                                            <label>
                                                <input type="radio" name="radio">
                                                <i></i>Canara Bank</label>
                                        </div>
                                    </div>
                                    <div class="check_box_one">
                                        <div class="radio_one">
                                            <label>
                                                <input type="radio" name="radio">
                                                <i></i>ICICI Bank</label>
                                        </div>
                                    </div>
                                    <div class="check_box_one">
                                        <div class="radio_one">
                                            <label>
                                                <input type="radio" name="radio">
                                                <i></i>State Bank Of India</label>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <h5>Or Select Other Bank</h5>
                                <div class="section_room_pay">
                                    <select class="year">
                                        <option value="">=== Other Banks ===</option>
                                        <option value="ALB-NA">Allahabad Bank NetBanking</option>
                                        <option value="ADB-NA">Andhra Bank</option>
                                        <option value="BBK-NA">Bank of Bahrain and Kuwait NetBanking</option>
                                        <option value="BBC-NA">Bank of Baroda Corporate NetBanking</option>
                                        <option value="BBR-NA">Bank of Baroda Retail NetBanking</option>
                                        <option value="BOI-NA">Bank of India NetBanking</option>
                                        <option value="BOM-NA">Bank of Maharashtra NetBanking</option>
                                        <option value="CSB-NA">Catholic Syrian Bank NetBanking</option>
                                        <option value="CBI-NA">Central Bank of India</option>
                                        <option value="CUB-NA">City Union Bank NetBanking</option>
                                        <option value="CRP-NA">Corporation Bank</option>
                                        <option value="DBK-NA">Deutsche Bank NetBanking</option>
                                        <option value="DCB-NA">Development Credit Bank</option>
                                        <option value="DC2-NA">Development Credit Bank - Corporate</option>
                                        <option value="DLB-NA">Dhanlaxmi Bank NetBanking</option>
                                        <option value="FBK-NA">Federal Bank NetBanking</option>
                                        <option value="IDS-NA">Indusind Bank NetBanking</option>
                                        <option value="IOB-NA">Indian Overseas Bank</option>
                                        <option value="ING-NA">ING Vysya Bank (now Kotak)</option>
                                        <option value="JKB-NA">Jammu and Kashmir NetBanking</option>
                                        <option value="JSB-NA">Janata Sahakari Bank Limited</option>
                                        <option value="KBL-NA">Karnataka Bank NetBanking</option>
                                        <option value="KVB-NA">Karur Vysya Bank NetBanking</option>
                                        <option value="LVR-NA">Lakshmi Vilas Bank NetBanking</option>
                                        <option value="OBC-NA">Oriental Bank of Commerce NetBanking</option>
                                        <option value="CPN-NA">PNB Corporate NetBanking</option>
                                        <option value="PNB-NA">PNB NetBanking</option>
                                        <option value="RSD-DIRECT">Rajasthan State Co-operative Bank-Debit Card</option>
                                        <option value="RBS-NA">RBS (The Royal Bank of Scotland)</option>
                                        <option value="SWB-NA">Saraswat Bank NetBanking</option>
                                        <option value="SBJ-NA">SB Bikaner and Jaipur NetBanking</option>
                                        <option value="SBH-NA">SB Hyderabad NetBanking</option>
                                        <option value="SBM-NA">SB Mysore NetBanking</option>
                                        <option value="SBT-NA">SB Travancore NetBanking</option>
                                        <option value="SVC-NA">Shamrao Vitthal Co-operative Bank</option>
                                        <option value="SIB-NA">South Indian Bank NetBanking</option>
                                        <option value="SBP-NA">State Bank of Patiala NetBanking</option>
                                        <option value="SYD-NA">Syndicate Bank NetBanking</option>
                                        <option value="TNC-NA">Tamil Nadu State Co-operative Bank NetBanking</option>
                                        <option value="UCO-NA">UCO Bank NetBanking</option>
                                        <option value="UBI-NA">Union Bank NetBanking</option>
                                        <option value="UNI-NA">United Bank of India NetBanking</option>
                                        <option value="VJB-NA">Vijaya Bank NetBanking</option>
                                    </select>
                                </div>
                                <input type="submit" value="PAY NOW">
                            </form>
                        </div>
                    </div>
                    <h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-3" style="background-color: rgb(245, 245, 245); border-color: rgb(193, 193, 193);"><span class="resp-arrow"></span>Paypal Account</h2><div class="resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-3">
                        <div id="tab4" class="tab-grid" style="display: block;">
                            <div class="row">
                                <div class="col-md-6 pay-forms">
                                    <img class="pp-img" src="public/assets/client/images/paypal.png" alt="Image Alternative text" title="Image Title">
                                    <p>Important: You will be redirected to PayPal's website to securely complete your payment.</p>
                                    <a class="btn btn-primary">Checkout via Paypal</a>
                                </div>
                                <div class="col-md-6 number-paymk">
                                    <form action="#" method="post" class="creditly-card-form-2 shopf-sear-headinfo_form">
                                        <section class="creditly-wrapper payf_wrapper">
                                            <div class="credit-card-wrapper">
                                                <div class="first-row form-group">
                                                    <div class="controls">
                                                        <label class="control-label">Card Holder </label>
                                                        <input class="billing-address-name form-control" type="text" name="name" placeholder="John Smith">
                                                    </div>
                                                    <div class="paymntf_card_number_grids my-2">
                                                        <div class="fpay_card_number_grid_left">
                                                            <div class="controls">
                                                                <label class="control-label">Card Number</label>
                                                                <input class="number credit-card-number-2 form-control" type="text" name="number" inputmode="numeric" autocomplete="cc-number" autocompletetype="cc-number" x-autocompletetype="cc-number" placeholder="•••• •••• •••• ••••">
                                                            </div>
                                                        </div>
                                                        <div class="fpay_card_number_grid_right mt-2">
                                                            <div class="controls">
                                                                <label class="control-label">CVV</label>
                                                                <input class="security-code-2 form-control" Â·="" inputmode="numeric" type="text" name="security-code" placeholder="•••">
                                                            </div>
                                                        </div>
                                                        <div class="clear"> </div>
                                                    </div>
                                                    <div class="controls">
                                                        <label class="control-label">Valid Thru</label>
                                                        <input class="expiration-month-and-year-2 form-control" type="text" name="expiration-month-and-year" placeholder="MM / YY">
                                                    </div>
                                                </div>
                                                <input class="submit" type="submit" value="Proceed Payment">
                                            </div>
                                        </section>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Plug-in Initialisation-->
        </div>
    </div>
</div> --}}

<form method="post">
    <div class="row">
        <div class="col-sm-8">
            <div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193);">
                <div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
                    <div class="vertical_post check_box_agile">
                        <h5 style="float: left;"><i class="fas fa-map-marker-alt"></i> Địa chỉ nhận hàng</h5>
                        <a href="#address" style="float: right;" data-toggle="modal">Thay đổi >></a>
                        <div class="checkbox" style=" clear: both;">
                            <div class="check_box_one cashon_delivery">
                                <label class="anim">
                                    @if( count($user->customer) >0 )
                                        <ul style="list-style: none;"> 
                                            @foreach( $user->customer as $key => $cus )
                                                <li>
                                                    <input type="radio" class="rdoAddress" name="rdoaddress" value="{{$cus->email}}" style="float: left;">
                                                        <span style="float: left;">
                                                            <i class="name{{ $key }}">{{ $user->name }}</i> | <i class="phone{{$key}}">{{ $cus->phone }}</i>
                                    &emsp;&emsp;&emsp;&emsp;<a class="text-danger delAddress" data-id="{!! $cus->id !!}">Xóa</a>
                                                            <p class="address{{$key}}">{{ $cus->address }}</p>
                                                        </span>
                                                </li> 
                                            @endforeach     
                                        </ul>
                                    @else
                                        {{ 'Bạn chưa thêm địa chỉ nhận hàng' }}
                                    @endif    
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193);margin-top: 10px;">
                <div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
                    <div class="vertical_post check_box_agile">
                        <h5><i class="fas fa-truck"></i> Phương thức vận chuyển</h5>
                        <div class="checkbox">
                            <div class="check_box_one cashon_delivery">
                                <label class="anim">
                                    <input type="checkbox" class="checkbox" checked style="float: left;">
                                    <span style="float: left;">
                                        Chuyển phát tiêu chuẩn
                                        <p>Dự kiến giao hàng sau 3-4 ngày</p>
                                    </span>
                                    <span style="float: right; margin-left: 240px;">{{ number_format('20000') }} VNĐ</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193);margin-top: 10px;margin-bottom: 10px;">
                <div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
                    <div class="vertical_post check_box_agile">
                        <div class="checkbox">
                            <div class="check_box_one cashon_delivery">
                                <label class="anim">
                                    <h5 class="modal-title text-center"><i class="fas fa-comments"></i> Ghi Chú</h5>
                                </label>
                                <div class="form-group">
                                    <textarea name="note" class="note form-control" placeholder="Bạn có nhắn gì tới shop không?" rows="4" maxlength="1000"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193);">
                <div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
                    <div class="vertical_post check_box_agile">
                        <h5 style="text-align: center;"><i class="fas fa-shopping-cart"></i> Thông tin đơn hàng</h5>
                        <div class="checkbox">
                            <div class="check_box_one cashon_delivery">
                                <label class="anim">
                                    <p style="float: left;font-weight: bold;">Tổng Tiền</p>
                                    <p style="margin-left: 10px;float: left;">{{ number_format($price) }} VNĐ</p>
                                </label>
                                <label class="anim">
                                    <p style="float: left;font-weight: bold;">Phí vận chuyển</p>
                                    <p style="margin-left: 10px;float: left;">{{ number_format(20000) }} VNĐ</p>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193); margin-top: 10px;">
                
            </div>
            <div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193); margin-top: 10px;">
                <div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
                    <div class="vertical_post check_box_agile">
                        <div class="checkbox">
                            <div class="check_box_one cashon_delivery">
                                <label class="anim">
                                    <p style="float: left;font-weight: bold;">Tổng thanh toán</p>
                                    <p style="margin-left: 3px;float: left;" class="paytotal">{{ number_format($price + 20000) }} VNĐ</p>
                                </label>
                                <label class="anim">
                                    <button type="button" class="btn submit check_out payment">Tiến hành thanh toán</button>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</form>    
<div class="modal fade" id="address" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Thay đổi địa chỉ giao hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form >
                    <div class="form-group">
                        <label class="col-form-label">Địa Chỉ Email</label>
                        <input type="text" class="form-control email" value="{{ $user->email ?? '' }}" placeholder="Nhập địa chỉ email" name="email" required="">
                        <label class="col-form-label errorEmail" style="color: red;"></label>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Số điện thoại</label>
                        <input type="text" class="form-control phone" placeholder="Nhập số điện thoại" name="phone" required="">
                        <label class="col-form-label errorPhone" style="color: red;"></label>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Địa Chỉ</label>
                        <textarea class="form-control address" name="address" id="" rows="3" placeholder="Nhập địa chỉ nhận hàng" required=""></textarea>
                        <label class="col-form-label errorAddress" style="color: red;"></label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" class="actives" name="active" checked >
                        <label class="" for="customControlAutosizing" >Dùng địa chỉ này cho các đơn hàng sau</label>
                    </div>
                    <div class="right-w3l">
                        <a class="btn btn-primary form-control addAdress">Lưu</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection