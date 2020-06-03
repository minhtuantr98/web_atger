@extends('layouts.master')
@section('main')
                
        
<div class="col-md-9 col-sm-12 col-xs-12">
    <div class="slider-area hm-1">
            <!-- slider -->
            <div class="bend niceties preview-2">
                <div id="ensign-nivoslider-2" class="slides">
                    <img src="/img/slider/home-4/banner01.png" alt="" title="#slider-direction-1" />
                    <img src="/img/slider/home-4/banner02.png" alt="" title="#slider-direction-2" />
                    <img src="/img/slider/home-4/banner03.png" alt="" title="#slider-direction-2" />
                </div>
                <!-- direction 1 -->
                <div id="slider-direction-1" class="t-cn slider-direction">
                    <div class="slider-progress"></div>
                </div>
                <!-- direction 2 -->
                <div id="slider-direction-2" class="slider-direction">
                    <div class="slider-progress"></div>
                </div>
            </div>
            <!-- slider end-->
        </div>
        <!-- end home slider -->
        <!-- unit banner area start -->
        <div class="unit-banner-area">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <!-- single banner start -->
                    <div class="single-banner">
                        <a href="#"><img src="/img/banner/tger.jpg" alt="" /></a>
                    </div>
                    <!-- single banner end -->
                </div>
                <div class="col-md-4 col-sm-4 hidden-xs">
                    <!-- single banner start -->
                    <div class="single-banner">
                        <a href="#"><img src="/img/banner/tger.jpg" alt="" /></a>
                    </div>
                    <!-- single banner end -->
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <!-- single banner start -->
                    <div class="single-banner">
                        <a href="#"><img src="/img/banner/tger.jpg" alt="" /></a>
                    </div>
                    <!-- single banner end -->
                </div>
            </div>
    </div>
          
  <!-- product-row start -->
        <div class="tab-content">
            
            <div class="tab-pane fade in active" id="shop-grid-tab">
                @foreach($products as $key => $value)
                <div class="row">
                    <div class="area-title">
                        <h2>{{$key}}</h2>
                    </div>
                    @foreach($value as $item)
                    <div class="shop-product-tab first-sale">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="two-product">
                                <!-- single-product start -->
                                <div class="single-product">
                                    <!-- <span class="sale-text">Sale</span> -->
                                    <div class="product-img">
                                        <a href="{{asset('detail/'.$item->pro_id.'/'.$item->pro_slug.'.html')}}">
                                            <img class="img-fluid primary-image"  src="{{pare_url_file($item->pro_img)}}" alt="" />
                                            <img class="img-fluid secondary-image" src="{{pare_url_file($item->pro_img)}}" alt="" />
                                        </a>
                                        <!-- <div class="action-zoom">
                                            <div class="add-to-cart">
                                                <a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                            </div>
                                        </div> -->
                                        <div class="actions">
                                            <div class="action-buttons" >
                                                <div class="add-to-links">
                                                    <div class="add-to-wishlist">
                                                        <a href="{{asset('detail/'.$item->pro_id.'/'.$item->pro_slug.'.html')}}" title="Xem chi tiết"><i  class="fa fa-search-plus"></i></a>
                                                    </div>
                                                    <div class="compare-button">
                                                        <a href="{{asset('cart/add/'.$item->pro_id)}}" title="Thêm vào giỏ hàng"><i class="icon-bag"></i></a>
                                                    </div>									
                                                </div>
                                                <div class="quickviewbtn">
                                                    <a href="#" title="Thêm vào yêu thích"><i style="color:red;" class="fa fa-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            @if($item->pro_discount >0)
                                            <span class="new-price" style="color:red; font-size: 15px" >{{number_format($item->pro_price - $item->pro_price*$item->pro_discount/100 ,0,',','.')}} đ</span>
                                            <strike class="new-price">{{number_format($item->pro_price,0,',','.')}} đ</strike>
                                            @else
                                                <span class="new-price" style="color:red; font-size: 15px">{{number_format($item->pro_price,0,',','.')}} đ</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h2 class="product-name"><a href="{{asset('detail/'.$item->pro_id.'/'.$item->pro_slug.'.html')}}">{{$item->pro_name}}</a></h2>
                                        <p class="product-description">{{$item->pro_description}}</p>
                                    </div>
                                </div>
                                <!-- single-product end -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- product-row end -->
                @endforeach
                
            </div>
            <!-- list view -->
         
            <!-- shop toolbar end -->
        </div>
</div>
		
@stop
         
 