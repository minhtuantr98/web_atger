<!DOCTYPE html>
<html>

<head>
    <base href="{{asset('layout/backend')}}/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="../../img/control.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <script type="text/javascript" src="../../editor/ckeditor/ckeditor.js"></script>
    <script src="js/lumino.glyphs.js"></script>
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{asset('admin/home')}}">Trang chủ Admin</a>
                <ul class="user-menu">
                    <li class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user">
                                <use xlink:href="#stroked-male-user"></use>
                            </svg>{{Auth::guard('admin')->user()->name}} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{route('admin.logout')}}"><svg class="glyph stroked cancel">
                                        <use xlink:href="#stroked-cancel"></use>
                                    </svg> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div><!-- /.container-fluid -->
    </nav>

    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <ul class="nav menu">
            <li role="presentation" class="divider"></li>
            <li class="{{ request()->is('admin/home') ? 'active' : '' }}"><a href="{{asset('admin/home')}}"><svg
                        class="glyph stroked dashboard-dial">
                        <use xlink:href="#stroked-dashboard-dial"></use>
                    </svg> Trang chủ</a></li>
            <li class="{{ request()->is('admin/category') ? 'active' : '' }}"><a
                    href="{{route('admin.get.list.category')}}"><svg class="glyph stroked clipboard with paper">
                        <use xlink:href="#stroked-clipboard-with-paper" /></svg> Danh mục</a></li>
            <li class="{{ request()->is('admin/product') ? 'active' : '' }}"><a
                    href="{{route('admin.get.list.product')}}"><svg class="glyph stroked bacon burger">
                        <use xlink:href="#stroked-bacon-burger" /></svg> Sản phẩm</a></li>
            <li class="{{ request()->is('admin/transaction') ? 'active' : '' }}"><a
                    href="{{route('admin.get.list.transaction')}}"><svg class="glyph stroked bag">
                        <use xlink:href="#stroked-bag"></use>
                    </svg> Đơn hàng</a></li>
            <li class="{{ request()->is('admin/contact') ? 'active' : '' }}"><a
                    href="{{route('admin.get.list.contact')}}"><svg class="glyph stroked email">
                        <use xlink:href="#stroked-email" /></svg> Liên hệ</a></li>
            <li class="{{ request()->is('admin/user') ? 'active' : '' }}"><a
                    href="{{route('admin.get.list.user')}}"><svg class="glyph stroked male-user">
                        <use xlink:href="#stroked-male-user"></use>
                    </svg> Thành viên</a></li>
            <li class="{{ request()->is('admin/manager') ? 'active' : '' }}"><a
            href="{{route('admin.get.list.manager')}}"><svg class="glyph stroked male-user">
                <use xlink:href="#stroked-male-user"></use>
            </svg> Thành viên Admin</a></li>
            <li role="presentation" class="divider"></li>
        </ul>

    </div>
    <!--/.sidebar-->
    <div class="col-lg-10 pull-right">
        @if(Session::has('flash-message'))
        <div class="alert alert-{!! Session::get('flash-level') !!}">
            {!! Session::get('flash-message') !!}
        </div>
        @endif
    </div>
    <!--Main-->
    @yield('main')
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/myscript.js"></script>
    <script>
    $('#calendar').datepicker({});

    ! function($) {
        $(document).on("click", "ul.nav li.parent > a > span.icon", function() {
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function() {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function() {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })

    function changeImg(input) {
        //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            //Sự kiện file đã được load vào website
            reader.onload = function(e) {
                //Thay đổi đường dẫn ảnh
                $('#avatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function() {
        $('#avatar').click(function() {
            $('#img').click();
        });
    });
    </script>
</body>

</html>