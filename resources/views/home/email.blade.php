<div id="wrap-inner">
<div id="khach-hang">
	<h3>Thông tin khách hàng</h3>
	<p>
		<span class="info">Khách hàng: </span>
		{{$info['name']}}
	</p>
	<p>
		<span class="info">Email: </span>
		{{$info['email']}}

	</p>
	<p>
		<span class="info">Điện thoại: </span>
		{{$info['phone']}}
	</p>
	<p>
		<span class="info">Địa chỉ: </span>
		{{$info['add']}}

	</p>
	<p>
		<span class="info">Ghi chú: </span>
		{{$info['content']}}

	</p>
</div>						
<div id="hoa-don">
	<h3>Hóa đơn mua hàng</h3>							
	<table border="1" cellspacing="0" class="table-bordered table-responsive">
		<tr class="bold">
			<td width="30%">Tên sản phẩm</td>
			<td width="25%">Giá</td>
			<td width="20%">Số lượng</td>
			<td width="15%">Thành tiền</td>
		</tr>
		@foreach($cart as $item)
		<tr>
			<td>{{$item->name}}</td>
			<td class="price">{{number_format($item->price,0,',','.')}} đ</td>
			<td>{{$item->qty}}</td>
			<td class="price">{{number_format($item->price* $item->qty,0,',','.')}} đ</td>
		</tr>
		@endforeach
		<tr>
			<td colspan="3">Tổng tiền:</td>
			<td class="total-price">{{$total}} đ </td>
		</tr>
	</table>
</div>
<div id="xac-nhan">
	<br>
	<p align="justify">
		<b>Quý khách đã đặt hàng thành công!</b><br />
		• Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần Thông tin Khách hàng mà quý khách đã điền.<br />
		• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại để xác thực lại đơn hàng và trước khi giao hàng 2-3 tiếng<br />
		<b><br/>Cám ơn Quý khách đã lựa chọn Sản phẩm của chúng Tôi!</b>
	</p>
</div>
</div>	

