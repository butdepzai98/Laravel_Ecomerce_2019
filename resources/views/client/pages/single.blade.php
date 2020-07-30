@extends('client.layout.master')
@section('title')
    Trang chi tiết sản phẩm
@endsection

@section('header-top')
    <div class="page-head_agile_info_w3l">
    </div>
@endsection

@section('content')
<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            {{ Breadcrumbs::render('product', $prtt, $breadcumb) }}
        </div>
    </div>
</div>

    <div class="banner-bootom-w3-agileits py-5">
        <div class="container py-xl-4 py-lg-2">
            <!-- tittle heading -->
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                <span>S</span>ản
                <span>P</span>hẩm</h3>
            <!-- //tittle heading -->
            <div class="row">
                <div class="col-lg-5 col-md-8 single-right-left ">
                    <div class="grid images_3_of_2">
                        <div class="flexslider">
                            <div class="clearfix"></div>
                            <div class="flex-viewport" style="overflow: hidden; position: relative;">
                                <ul class="slides" style="width: 1000%; transition-duration: 0s; transform: translate3d(-1311px, 0px, 0px);">
                                    @foreach($product as $img)
                                        <li data-thumb="upload/img/product/{!! $img->image !!}" class="clone" aria-hidden="true" style="width: 437px; margin-right: 0px; float: left; display: block;">
                                            <div class="thumb-image">
                                                <img src="upload/img/product/{!! $img->image !!}" data-imagezoom="true" class="img-fluid" alt="" draggable="false"> </div>
                                        </li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                            <ol class="flex-control-nav flex-control-thumbs">
                                @foreach($product as $imgcon)
                                <li><img src="upload/img/product/{!! $imgcon->image !!}" draggable="false" class="flex-active">
                                </li>
                                @endforeach
                            </ol>
                            <ul class="flex-direction-nav">
                                <li class="flex-nav-prev"><a class="flex-prev" href="#">Previous</a>
                                </li>
                                <li class="flex-nav-next"><a class="flex-next" href="#">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @foreach($product as $value)
                <div class="col-lg-7 single-right-left simpleCart_shelfItem">
                        <div class="addCard">
                            <a href="{!! route('addToCart',['id'=>$value->id]) !!}" class="btn btn-outline-danger float-right">Thêm vào giỏ hàng <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                        </div>
                        <h3 class="mb-3">{{ $value->name }}</h3>
                        <p class="mb-3">
                        <span class="item_price">{!! number_format($value->price, 0, ' ', '.') !!} VNĐ</span>
                        <del class="mx-2 font-weight-light">{!! number_format($value->promotion, 0, ' ', '.') !!} VNĐ</del>
                        <label> Hãng : <a href="producttype/{{ $value->productType_id }}">{{ $value->productType->name }}</a>
                        </label>
                    </p>
                    
                    <div class="product-single-w3l">
                            <p class="my-3">
                                    <i class="far fa-hand-point-right mr-2"></i>
                            Mô tả
                            </p>
                            <div class="motaSP">
                                {!! $value->description !!}
                            </div>
                        <p class="my-sm-4 my-3">
                                <i class="fas fa-retweet mr-3"></i>Net banking &amp; Credit/ Debit/ ATM card
                        </p>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection