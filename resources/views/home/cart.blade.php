@extends('layouts.master')
@section('main')


<link rel="stylesheet" href="/css/cart.css">

<script type="text/javascript">
	function updateCart(qty,rowId){
		$.get(
			'{{asset('cart/update')}}',
			{qty:qty,rowId:rowId},
			function(){
				location.reload();
			}
			)
	}
</script>
<div class="col-md-9">
	<div id="wrap-inner">
		@if(Cart::count()>=1)
		<div id="list-cart">
			<h3>Giỏ hàng của bạn</h3>
			<form>
				<table class="table table-bordered .table-responsive text-center">
					<tr class="active">
						<td width="22.222%">Ảnh sản phẩm</td>
						<td width="22.222%">Tên sản phẩm</td>
						<td width="11.111%">Số lượng</td>
						<td width="16.6665%">Đơn giá</td>
						<td width="16.6665%">Thành tiền</td>
						<td width="11.112%">Xóa</td>
					</tr>
					@foreach($items as $item)
					<tr>
						<td><img class="img-responsive" src="{{pare_url_file($item->options->img)}}" ></td>
						<td><a href="{{asset('detail/'.$item->id.'/'.$item->options->slug.'.html')}}" id="td_cart">{{$item->name}}</a></td>
						<td>
							<div class="form-group">
								<input class="form-control" type="number" onchange="updateCart(this.value,'{{$item->rowId}}')" value="{{$item->qty}}">
							</div>
						</td>
						<td><span class="price">{{number_format($item->price,0,',','.')}} đ</span></td>
						<td><span class="price">{{number_format($item->price* $item->qty,0,',','.')}} đ</span></td>
						<td><a href="{{asset('cart/delete/'.$item->rowId)}}" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này khỏi giỏ hàng?')"><b title="Xóa sản phâm">X</b></a></td>
					</tr>
					@endforeach
				</table>
				<div class="row" id="total-price">
					<div class="col-md-6 col-sm-12 col-xs-12">										
							Tổng thanh toán: <span class="total-price">{{$total}} đ</span>
																									
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<a href="{{asset('/')}}" class="my-btn btn">Mua tiếp</a>
						<a href="{{asset('cart/delete/all')}}" class="my-btn btn" onclick="return confirm('Bạn có chắc muốn xóa giỏ hàng?')">Xóa giỏ hàng</a>
					</div>
				</div>
			</form>             	                	
		</div>

		<div id="xac-nhan">
			<h3>Xác nhận mua hàng</h3>
			<form  method="post">
				<div class="form-group">
					<label for="email">Email address:</label>
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
					<label for="add">Địa chỉ:</label>
					<input required type="text" class="form-control" id="add" name="add" value="@if(Auth::check()) {{Auth::guard()->user()->user_address}}  @endif">
				</div>
				<div class="form-group">
					<label for="add">Ghi chú:</label>
					<textarea  type="text" rows="5" class="form-control" id="content" name="content" ></textarea>
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-default">Thực hiện đơn hàng</button>
					<a href="{{route('get.pay')}}" class="btn btn-success" style="background:green">Thanh toán online</a>
				</div>
				{{csrf_field()}}
			</form>
		</div>
		@else
		<br>
		<h2 style="color:red">Giỏ hàng rỗng !!!</h2>
		@endif
    </div>
</div>
@stop