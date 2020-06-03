<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Anh Tger | Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/img/control.png">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" href="/css/owl.theme.css">
    <link rel="stylesheet" href="/css/owl.transitions.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/fonts/font-icon.css">
    <link rel="stylesheet" href="/custom-slider/css/nivo-slider.css" type="text/css" />
    <link rel="stylesheet" href="/custom-slider/css/preview.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="/css/meanmenu.min.css">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/css/responsive.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body class="home-four">

    <header class="header-four">
        <div class="container">
            <div class="row">
                <!-- language division start -->
                <div class="col-md-4 text-left">
                    <div class="top-detail">
                        <!-- language division start -->
                        <div class="disflow">
                            <div class="expand lang-all disflow">
                                <a href="#"><img width="40" src="/img/country/vi.png" alt="">Việt Nam</a>
                            </div>
                            <div class="expand lang-all disflow" style="width:200px" >
                                <p><i style="color:red;font-size: 20px " class="fa fa-phone"> 036 957 4122</p></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 text-center">
                    <div class="top-logo" style="padding:0px">
                        <a href="#"><img src="/img/logobanhkem.png" alt="" /></a>
                    </div>
                </div>
                <!-- logo end -->
                <!-- top details area start -->
                <div class="col-md-3 text-right">
                    <div class="top-detail dflt-src">
                        <!-- search divition start -->
                        <form action="{{asset('search/')}}" id="searchform" method="get">
                            <div class="input-group" style="margin-top:15px; " >
                                <input style=" background-color: black; color:white;height:50px" type="text" class="form-control" id="keyword"   name="result" maxlength="128" placeholder="Tìm kiếm sản phẩm...">
                                
                                <span class="input-group-btn">
                                        <button type="submit" style="font-size: 24px" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- top details area end -->
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <!-- mainmenu area start -->
                    <div class="col-md-8 nop-xs ">
                        <div class="mainmenu">
                            <nav>
                                <ul>
                                    <a href="{{route('home')}}">
                                        <img src="/img/LogoTger.jpg" style="width: auto;height: 50px; ">
                                    </a>
                                    <li class="expand"><a href="{{route('home')}}">Trang chủ</a>
                                    </li>
                                    <li class="expand"><a href="">Tin tức</a>
                                    </li>
                                    <li class="expand"><a href="">Giới thiệu</a></li>
                                    <li class="expand"><a href="{{route('get.contact')}}">Liên hệ</a></li>
                                    <li class="expand">
                                        
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    
                    </div>
                    <!-- mainmenu area end -->
                    <div class="col-md-4 text-right">
                        <div class="top-detail">
                            <!-- addcart top start -->
                            <div class="disflow crt-edt">
                                <div class="circle-shopping expand">
                                    <div class="shopping-carts text-right">
                                        <div class="cart-toggler">
                                            <a href="{{asset('cart/show')}}"><i class="icon-bag"></i></a>
                                            <a href="{{asset('cart/show')}}"><span class="cart-quantity">{{Cart::count()}}</span></a>
                                        </div>
                                        @if(Cart::count() >0)
                                            <?php $cart=Cart::content(); ?>
                                            <div class="restrain small-cart-content">
                                                <ul class="cart-list">
                                                @foreach($cart as $item)
                                                    <li>
                                                        <a class="sm-cart-product" href="{{asset('detail/'.$item->id.'/'.$item->options->slug.'.html')}}">
                                                            <img src="{{pare_url_file($item->options->img)}}" alt="">
                                                        </a>
                                                        <div class="small-cart-detail">
                                                            <!-- <a class="remove" href="#"><i class="fa fa-times-circle"></i></a>
                                                            <a href="#" class="edit-btn"><img src="/img/btn_edit.gif" alt="Edit Button" /></a> -->
                                                            <a class="small-cart-name" href="{{asset('detail/'.$item->id.'/'.$item->options->slug.'.html')}}">{{$item->name}}</a>
                                                            <span class="quantitys"><strong>{{$item->qty}}</strong>x<span>{{number_format($item->price,0,',','.')}} đ</span></span>
                                                        </div>
                                                    </li>
                                                @endforeach
                                                </ul>
                                                <p class="total">Tổng hóa đơn: <span class="amount">{{Cart::total()}} đ</span></p>
                                                <p class="buttons">
                                                    <a href="{{asset('cart/show')}}" class="button">Kiểm tra giỏ hàng</a>
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- addcart top start -->
                            <div class="disflow">
                                <div class="expand dropps-menu" >
                                    <a href="#"><i class="fa fa-align-right"></i></a>
                                    <ul class="restrain language" style="width:200px">
                                        @if(Auth::check())
                                        <li><a href="{{route('get.info',Auth::guard()->user()->user_id)}}" style="font-size:15px; color:red;font-weight: bold;">{{Auth::guard()->user()->user_name}}</a></li>
                                        <li><a href="">Sản phẩm yêu thích</a></li>
                                        <li><a href="{{asset('cart/show')}}">Giỏ hàng</a></li>
                                        <li><a href="{{route('get.change.password')}}">Đổi mật khẩu</a></li>
                                        <li><a href="{{route('get.logout.user')}}">Đăng xuất</a></li>
                                        @else
                                        <li><a href="{{route('get.login')}}">Đăng nhập</a></li>
                                        <li><a href="{{route('get.register')}}">Đăng ký</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->
    <!-- main area start -->
    <div class="main-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!-- category menu start -->
                    <div class="left-category-menu">
                        <div class="left-product-cat">
                            <div class="category-heading" >
                                <h2 style="background: #46f28c">Danh mục</h2>
                            </div>
                            <!-- category-menu-list start -->
                            <div class="category-menu-list" style="display: block;">
                                <ul>
                                @foreach($categories as $item)
                                    <li>
                                        <a style="height: 40px;" href="{{ asset('category/'.$item->cate_id.'/'.$item->cate_slug.'.html')}}"><h5>{{$item->cate_name}}</h5></a>
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                            <!-- category-menu-list end -->
                        </div>
                    </div>
                    <!-- category menu end -->
                    <!-- block category area start -->
                    <div class="block-category side-area">
                        <!-- featured block start -->
                        <!-- block title start -->
                        <div class="bar-title">
                            <div class="bar-ping"><img src="/img/bar-ping.png" alt="" /></div>
                            <h2>Nổi bật</h2>
                        </div>
                        <!-- block title end -->
                        <!-- block carousel start -->
                        <div class="block-carousel">
                            <div class="block-content">
                                <!-- single block start -->
                                @foreach($product_featured as $product)
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="{{asset('detail/'.$product->pro_id.'/'.$product->pro_slug.'.html')}}"><img title="{{$product->pro_description}}" src="{{pare_url_file($product->pro_img)}}" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="{{asset('detail/'.$product->pro_id.'/'.$product->pro_slug.'.html')}}">{{$product->pro_name}}</a></h3>
                                        @if($product->pro_discount >0)
                                        <div class="cat-price" style="color:red; font-size: 12px" >{{number_format($product->pro_price - $product->pro_price*$product->pro_discount/100 ,0,',','.')}} đ
                                            <span class="old-price">{{number_format($product->pro_price,0,',','.')}} đ</span>
                                        </div>
                                        @else
                                            <div class="cat-price" style="color:red; font-size: 13px">{{number_format($product->pro_price,0,',','.')}} đ</div>
                                        @endif
                                       
                                    </div>
                                </div>
                                @endforeach
                                <!-- single block end -->
                               
                            </div>
                         
                        </div>
                        <!-- block carousel end -->
                    </div>
           
                </div>
                <div class="col-md-9 pull-right">
                @if(Session::has('flash-message'))
                <div class="alert alert-{!! Session::get('flash-level') !!}">
                    {!! Session::get('flash-message') !!}
                </div>
                @endif
            </div>
                @yield('main')

            </div>
        </div>
    </div>

                   <!-- FOOTER START -->
    <footer>
        <!-- top footer area start -->
        <div class="top-footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <div class="single-snap-footer">
                            <div class="snap-footer-title">
                                <h4>Thông tin shop</h4>
                            </div>
                            <div class="cakewalk-footer-content">
                                <p class="footer-des">Địa chỉ: 2xx Giải Phóng, Phường Phượng Liệt, Quận Thân Xuân, Tp. Hà Nội</p>
                                <a href="#" class="read-more">Xem nhiều hơn</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <div class="single-snap-footer">
                            <div class="snap-footer-title">
                                <h4>Giới thiệu</h4>
                            </div>
                            <div class="cakewalk-footer-content">
                                <ul>
                                    <li><a href="#">Về chúng tôi</a></li>
                                    <li><a href="#">Thông tin giao hàng</a></li>
                                    <li><a href="#">Điều khoản sử dụng</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <div class="single-snap-footer">
                            <div class="snap-footer-title">
                                <h4>Tài khoản</h4>
                            </div>
                            <div class="cakewalk-footer-content">
                                <ul>
                                    <li><a href="#">Tổng quan</a></li>
                                    <li><a href="#">Đăng nhập</a></li>
                                    <li><a href="#">Giỏ hàng</a></li>
                                    <li><a href="#">Sản phẩm ưa thích</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 hidden-sm">
                        <div class="single-snap-footer">
                            <div class="snap-footer-title">
                                <h4>Thông tin khác</h4>
                            </div>
                            <div class="cakewalk-footer-content">
                                <ul>
                                    <li><a href="#">Chính sách bảo mật</a></li>
                                    <li><a href="#">Liên hệ chúng tôi</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 hidden-sm">
                        <div class="single-snap-footer">
                            <div class="snap-footer-title">
                                <h4>Theo dõi chúng tôi</h4>
                            </div>
                            <div class="cakewalk-footer-content social-footer">
                                <ul>
                                    <li><a href="https://facebook.com/AnhTger" target="_blank"><i class="fa fa-facebook"></i></a><span> Facebook</span></li>
                                    <li><a href="https://plus.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a><span> Google Plus</span></li>
                                    <li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a><span> Twitter</span></li>
                                    <li><a href="https://youtube.com/" target="_blank"><i class="fa fa-youtube-play"></i></a><span> Youtube</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- top footer area end -->
        <!-- info footer start -->
        <div class="info-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <div class="info-fcontainer">
                            <div class="infof-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="infof-content">
                                <h3>Địa chỉ của hàng</h3>
                                <p>2xx Giải Phóng, Phường Phượng Liệt, Quận Thân Xuân, Tp. Hà Nội</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <div class="info-fcontainer">
                            <div class="infof-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="infof-content">
                                <h3>Điện thoại hỗ trợ</h3>
                                <p>+8436 957 4122</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <div class="info-fcontainer">
                            <div class="infof-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="infof-content">
                                <h3>Email hỗ trợ</h3>
                                <p>nguyentheanh.98tger@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 hidden-sm">
                        <div class="info-fcontainer">
                            <div class="infof-icon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <div class="infof-content">
                                <h3>Giờ mở cửa</h3>
                                <p>Các ngày trong tuần: 8:00 am - 21:00 pm</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- info footer end -->
        <!-- banner footer area start -->
        <div class="address-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <address>Copyright © <a href="">NguyenTheAnh</a> All Rights Reserved</address>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="footer-payment pull-right">
                            <a href="#"><img src="/img/payment.png" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer address area end -->
    </footer>
   
    <script src="/js/vendor/jquery-1.11.3.min.js"></script>
    <script src="/js/jquery-1.12.4.min.js"></script> 
    <script src="/js/bootstrap.min.js"></script>
    <script src="/custom-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
    <script src="/custom-slider/home.js" type="text/javascript"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/jquery.scrollUp.min.js"></script>
    <script src="/js/price-slider.js"></script>
    <script src="/js/jquery.elevateZoom-3.0.8.min.js"></script>
    <script src="/js/jquery.bxslider.min.js"></script>
    <script src="/js/jquery.meanmenu.js"></script>
    <script src="/js/wow.js"></script>
    <script src="/js/plugins.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/myscript.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#keyword').autocomplete({
                source: "{{route('autosearch')}}",
            })
        })    
    </script>
</body>

</html>