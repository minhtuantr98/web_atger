@extends('layouts.master')
@section('main')

<style>
    .wrapper {
    position: relative;
}


.wrapper span {
    position: absolute;
    right: 10px;
    top: 28px;
    font-size: 25px;
    color:cornflowerblue;
}
</style>
    <div class="col-xs-9 col-md-9 col-lg-9">
        <div class="panel panel-success">
            <div class="panel-heading" style="text-align: center"><h3>Thông tin cá nhân</h3></div>
            <div class="panel-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="row" style="margin-bottom:10px">
                        <div class="col-xs-12">
                            <div class="form-group wrapper" >
                                <label>Tên:</label>
                                <input required type="text" id="name" name="name" readonly class="form-control" value="{{$user->user_name}}">
                                <span id="ed_name"  class="glyphicon glyphicon-edit"></span>
                            </div>
                            <div class="form-group wrapper" >
                                <label>Email:</label>
                                <input required type="email" id="email" readonly name="email" class="form-control" value="{{$user->user_email}}">
                                <!-- <span  class="glyphicon glyphicon-edit"></span> -->
                            </div>
                            <div class="form-group wrapper" >
                                <label>Địa chỉ nhận hàng:</label>
                                <input required type="text" id="address" readonly name="address" class="form-control" value="{{$user->user_address}}" >
                                <span id="ed_address"  class="glyphicon glyphicon-edit"></span>
                            </div>
                            <div class="form-group wrapper" >
                                <label>Số điện thoại:</label>
                                <input required type="text" id="phone" readonly name="phone" class="form-control" value="{{$user->user_phone}}" >
                                <span id="ed_phone"   class="glyphicon glyphicon-edit"></span>
                            </div>
                            <input type="submit" id="submit" style="display: none" name="submit" style="width:100px" value="Lưu" class="btn btn-success pull-right" onclick="return confirm('Bạn có chắc muốn thay đổi thông tin cá nhân không?')">
                        </div>
                    </div>
                    {{csrf_field()}}
                </form>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $( document ).ready(function() {
            document.getElementById('ed_name').onclick = function() {
                if ( document.getElementById('name').readOnly==true) {
                    document.getElementById('name').readOnly=false;
                    document.getElementById('submit').style.display = "block";
                }

            };

            document.getElementById('ed_address').onclick = function() {
                if ( document.getElementById('address').readOnly==true) {
                    document.getElementById('address').readOnly=false;
                    document.getElementById('submit').style.display = "block";

                }

            };
            document.getElementById('ed_phone').onclick = function() {
                if ( document.getElementById('phone').readOnly==true) {
                    document.getElementById('phone').readOnly=false;
                    document.getElementById('submit').style.display = "block";

                }

            };
        });

    </script>
@stop