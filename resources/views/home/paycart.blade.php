@extends('layouts.master')
@section('main')

<div class="col-md-9">
    <div class="tab-content">
        <div class="tab-pane fade in active" id="shop-grid-tab">
            <div class="row">
                <div class="area-title">
                    <h2>Thanh toán hóa đơn mua hàng </h2>
                </div>
                <div class="table-responsive">
                    <form action="{{route('post.pay')}}" id="create_form" method="post">       
                        @csrf
                        <div class="form-group">
                            <label for="language">Loại hàng hóa: </label>
                            <select name="order_type" id="order_type" class="form-control">
                                <option value="topup">Nạp tiền điện thoại</option>
                                <option selected value="billpayment">Thanh toán hóa đơn</option>
                                <option value="fashion">Thời trang</option>
                                <option value="other">Khác - Xem thêm tại VNPAY</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bank_code">Ngân hàng:</label>
                            <select name="bank_code" id="bank_code" class="form-control">
                                <option value="">Không chọn</option>
                                <option value="NCB"> Ngan hang NCB</option>
                                <option value="AGRIBANK"> Ngan hang Agribank</option>
                                <option value="SCB"> Ngan hang SCB</option>
                                <option value="SACOMBANK">Ngan hang SacomBank</option>
                                <option value="EXIMBANK"> Ngan hang EximBank</option>
                                <option value="MSBANK"> Ngan hang MSBANK</option>
                                <option value="NAMABANK"> Ngan hang NamABank</option>
                                <option value="VNMART"> Vi dien tu VnMart</option>
                                <option value="VIETINBANK">Ngan hang Vietinbank</option>
                                <option value="VIETCOMBANK"> Ngan hang VCB</option>
                                <option value="HDBANK">Ngan hang HDBank</option>
                                <option value="DONGABANK"> Ngan hang Dong A</option>
                                <option value="TPBANK"> Ngân hàng TPBank</option>
                                <option value="OJB"> Ngân hàng OceanBank</option>
                                <option value="BIDV"> Ngân hàng BIDV</option>
                                <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                                <option value="VPBANK"> Ngan hang VPBank</option>
                                <option value="MBBANK"> Ngan hang MBBank</option>
                                <option value="ACB"> Ngan hang ACB</option>
                                <option value="OCB"> Ngan hang OCB</option>
                                <option value="IVB"> Ngan hang IVB</option>
                                <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="amount">Số tiền:</label>
                           
                            <input class="form-control"  name="amount"  value="{{Cart::total()}}"/>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input required type="email" class="form-control" id="email" name="email" value="@if(Auth::check()) {{Auth::guard()->user()->user_email}}  @endif">
                        </div>
                        <div class="form-group">
                            <label for="name">Họ và tên:</label>
                            <input required type="text" class="form-control" id="name" name="name" value="@if(Auth::check()) {{Auth::guard()->user()->user_name}}  @endif">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại:</label>
                            <input required type="text" class="form-control" id="phone" name="phone" value="@if(Auth::check()) {{Auth::guard()->user()->user_phone}}  @endif">
                        </div>
                        <div class="form-group">
                            <label for="add">Địa chỉ nhận hàng:</label>
                            <input required type="text" class="form-control" id="add" name="add" value="@if(Auth::check()) {{Auth::guard()->user()->user_address}}  @endif">
                        </div>
                        <div class="form-group">
                            <label for="add">Nội dung:</label>
                            <textarea  type="text" rows="5" class="form-control" id="content" name="content" >Thanh toán đơn hàng</textarea>
                        </div>
                        <div class="form-group">
                            <label for="language">Ngôn ngữ:</label>
                            <select name="language" id="language" class="form-control">
                                <option value="vn">Tiếng Việt</option>
                                <option value="en">English</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary pull-right" id="btnPopup">Xác nhận thông tin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<link href="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.css" rel="stylesheet"/>
        <script src="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.js"></script>
        <script type="text/javascript">
            $("#btnPopup").click(function () {
                var postData = $("#create_form").serialize();
                var submitUrl = $("#create_form").attr("action");
                $.ajax({
                    type: "POST",
                    url: submitUrl,
                    data: postData,
                    dataType: 'JSON',
                    success: function (x) {
                        if (x.code === '00') {
                            if (window.vnpay) {
                                vnpay.open({width: 768, height: 600, url: x.data});
                            } else {
                                location.href = x.data;
                            }
                            return false;
                        } else {
                            alert(x.Message);
                        }
                    }
                });
                return false;
            });
        </script>
@stop