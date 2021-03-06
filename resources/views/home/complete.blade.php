@extends('layouts.master')
@section('main')
<link rel="stylesheet" href="/css/complete.css">
<div class="col-md-9">
	<div id="wrap-inner">
		<div id="complete">
			<p class="info">Quý khách đã đặt hàng thành công!</p>
			<p>• Hóa đơn mua hàng của Quý khách đã được xác nhận</p>
			<p>• Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần Thông tin Khách hàng mà quý khách đã điền.</p>
			<p>• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại để xác thực lại đơn hàng và trước khi giao hàng 2-3 tiếng</p>
			<p>• Trụ sở chính: Hà Nội</p>
			<p>Cám ơn Quý khách đã lựa chọn Sản phẩm của chúng Tôi!</p>
		</div>
		<p class="text-right return"><a href="{{asset('/')}}">Quay lại trang chủ</a></p>
	</div>
</div>
@stop