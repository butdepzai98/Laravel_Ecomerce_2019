@extends('client.layout.master')
@section('title')
    Trang Chủ
@endsection

@section('content')
	{{-- BreadCumb --}}
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				{{ Breadcrumbs::render('home') }}
			</div>
		</div>
	</div>
	{{-- End-BreadCumb --}}

    {{-- Banner --}}
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<!-- Indicators-->
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="3" class="active"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item item1">
				<div class="container">
					<div class="w3l-space-banner">
						<div class="carousel-caption p-lg-5 p-sm-4 p-3">
							<p>Get flat
								<span>10%</span> Cashback</p>
							<h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">The
								<span>Big</span>
								Sale
							</h3>
							<a class="button2" href="product.html">Shop Now </a>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item item2">
				<div class="container">
					<div class="w3l-space-banner">
						<div class="carousel-caption p-lg-5 p-sm-4 p-3">
							<p>advanced
								<span>Wireless</span> earbuds</p>
							<h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Best
								<span>Headphone</span>
							</h3>
							<a class="button2" href="product.html">Shop Now </a>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item item3">
				<div class="container">
					<div class="w3l-space-banner">
						<div class="carousel-caption p-lg-5 p-sm-4 p-3">
							<p>Get flat
								<span>10%</span> Cashback</p>
							<h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">New
								<span>Standard</span>
							</h3>
							<a class="button2" href="product.html">Shop Now </a>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item item4 active">
				<div class="container">
					<div class="w3l-space-banner">
						<div class="carousel-caption p-lg-5 p-sm-4 p-3">
							<p>Get Now
								<span>40%</span> Discount</p>
							<h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Today
								<span>Discount</span>
							</h3>
							<a class="button2" href="product.html">Shop Now </a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
    </div>
    
    <!-- top Products -->
    <div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>O</span>ur
				<span>N</span>ew
				<span>P</span>roducts</h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<h3 class="heading-tittle text-center font-italic">{!! $apple[0]->productType->name !!}</h3>
							<div class="row">
								@foreach($apple as $value)
								<div class="col-md-4 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img class="img-fluid" src="upload/img/product/{!! $value->image !!}" alt="">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="product/{{ $value->id }}" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="product/{{ $value->id }}">{!! $value->name !!}</a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price">{!! number_format($value->price, 0, ' ', '.') !!} VNĐ</span>
												<br>
												@if(($value->promotion)>0)
													<del>{!! number_format($value->promotion, 0, ' ', '.') !!} VNĐ</del>
												@endif
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<a href="{!! route('addToCart',['id'=>$value->id]) !!}" class="btn btn-primary">Thêm vào giỏ hàng</a>
											</div>
										</div>
									</div>
								</div>
								@endforeach

							</div>
						</div>
						<!-- //first section -->
						<!-- second section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<h3 class="heading-tittle text-center font-italic">{!! $vinsmart[0]->productType->name !!}</h3>
							<div class="row">
								@foreach($vinsmart as $value)
								<div class="col-md-4 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img class="img-fluid" src="upload/img/product/{!! $value->image !!}" alt="">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="product/{{ $value->id }}" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="product/{{ $value->id }}">{!! $value->name !!}</a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price">{!! number_format($value->price, 0, ' ', '.') !!} VNĐ</span>
												<br>
												@if(($value->promotion)>0)
													<del>{!! number_format($value->promotion, 0, ' ', '.') !!} VNĐ</del>
												@endif
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<a href="{!! route('addToCart',['id'=>$value->id]) !!}" class="btn btn-primary">Thêm vào giỏ hàng</a>
											</div>
										</div>
									</div>
								</div>
								@endforeach
								
							</div>
						</div>
						<!-- //second section -->
						<!-- third section -->
						<div class="product-sec1 product-sec2 px-sm-5 px-3">
							<div class="row">
								<h3 class="col-md-4 effect-bg">Summer Carnival</h3>
								<p class="w3l-nut-middle">Get Extra 10% Off</p>
								<div class="col-md-8 bg-right-nut">
									<img src="assets/client/images/image1.png" alt="">
								</div>
							</div>
						</div>
						<!-- //third section -->
						<!-- fourth section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mt-4">
							<h3 class="heading-tittle text-center font-italic">{!! $laptop[0]->Category->name !!}</h3>
							<div class="row">
								@foreach($laptop as $value)
								<div class="col-md-4 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img class="img-fluid" src="upload/img/product/{!! $value->image !!}" alt="">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="product/{{ $value->id }}" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="product/{{ $value->id }}">{!! $value->name !!}</a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price">{!! number_format($value->price, 0, ' ', '.') !!} VNĐ</span>
												<br>
												@if(($value->promotion)>0)
													<del>{!! number_format($value->promotion, 0, ' ', '.') !!} VNĐ</del>
												@endif
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<a href="{!! route('addToCart',['id'=>$value->id]) !!}" class="btn btn-primary">Thêm vào giỏ hàng</a>
											</div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
						<!-- //fourth section -->
					</div>
				</div>
				<!-- //product left -->

				<!-- product right -->
				<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
					<div class="side-bar p-sm-4 p-3">
						<div class="search-hotel border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Search Here..</h3>
							<form action="#" method="post">
								<input type="search" placeholder="Product name..." name="search" required="">
								<input type="submit" value=" ">
							</form>
						</div>
						<!-- price -->
						<div class="range border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Price</h3>
							<div class="w3l-range">
								<ul>
									<li>
										<a href="#">Under $1,000</a>
									</li>
									<li class="my-1">
										<a href="#">$1,000 - $5,000</a>
									</li>
									<li>
										<a href="#">$5,000 - $10,000</a>
									</li>
									<li class="my-1">
										<a href="#">$10,000 - $20,000</a>
									</li>
									<li>
										<a href="#">$20,000 $30,000</a>
									</li>
									<li class="mt-1">
										<a href="#">Over $30,000</a>
									</li>
								</ul>
							</div>
						</div>
						<!-- //price -->
						<!-- discounts -->
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Discount</h3>
							<ul>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">5% or More</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">10% or More</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">20% or More</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">30% or More</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">50% or More</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">60% or More</span>
								</li>
							</ul>
						</div>
						<!-- //discounts -->
						<!-- reviews -->
						<div class="customer-rev border-bottom left-side py-2">
							<h3 class="agileits-sear-head mb-3">Customer Review</h3>
							<ul>
								<li>
									<a href="#">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<span>5.0</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<span>4.0</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star-half"></i>
										<span>3.5</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<span>3.0</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star-half"></i>
										<span>2.5</span>
									</a>
								</li>
							</ul>
						</div>
						<!-- //reviews -->
						<!-- electronics -->
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Electronics</h3>
							<ul>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">Accessories</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">Cameras &amp; Photography</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">Car &amp; Vehicle Electronics</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">Computers &amp; Accessories</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">GPS &amp; Accessories</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">Headphones</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">Home Audio</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">Home Theater, TV &amp; Video</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">Mobiles &amp; Accessories</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">Portable Media Players</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">Tablets</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">Telephones &amp; Accessories</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">Wearable Technology</span>
								</li>
							</ul>
						</div>
						<!-- //electronics -->
						<!-- delivery -->
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Cash On Delivery</h3>
							<ul>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">Eligible for Cash On Delivery</span>
								</li>
							</ul>
						</div>
						<!-- //delivery -->
						<!-- arrivals -->
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">New Arrivals</h3>
							<ul>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">Last 30 days</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">Last 90 days</span>
								</li>
							</ul>
						</div>
						<!-- //arrivals -->
						<!-- best seller -->
						<div class="f-grid py-2">
							<h3 class="agileits-sear-head mb-3">Best Seller</h3>
							<div class="box-scroll">
								<div class="scroll" style="top: -64.695px;">
									<div class="row">
										<div class="col-lg-3 col-sm-2 col-3 left-mar">
											<img src="assets/client/images/k1.jpg" alt="" class="img-fluid">
										</div>
										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
											<a href="">Samsung Galaxy On7 Prime (Gold, 4GB RAM + 64GB Memory)</a>
											<a href="" class="price-mar mt-2">$12,990.00</a>
										</div>
									</div>
									<div class="row my-4">
										<div class="col-lg-3 col-sm-2 col-3 left-mar">
											<img src="assets/client/images/k2.jpg" alt="" class="img-fluid">
										</div>
										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
											<a href="">Haier 195 L 4 Star Direct-Cool Single Door Refrigerator</a>
											<a href="" class="price-mar mt-2">$12,499.00</a>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-3 col-sm-2 col-3 left-mar">
											<img src="assets/client/images/k3.jpg" alt="" class="img-fluid">
										</div>
										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
											<a href="">Ambrane 13000 mAh Power Bank (P-1310 Premium)</a>
											<a href="" class="price-mar mt-2">$1,199.00 </a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- //best seller -->
					</div>
					<!-- //product right -->
				</div>
			</div>
		</div>
    </div>
    <!-- //top products -->
@endsection