
@if($orders)
<table class="table table-bordered .table-responsive text-center">
    <tr class="active">
        <td>STT</td>
        <td width="22.222%">Ảnh sản phẩm</td>
        <td width="22.222%">Tên sản phẩm</td>
        <td width="11.111%">Số lượng</td>
        <td width="16.6665%">Đơn giá</td>
        <td width="16.6665%">Thành tiền</td>
    </tr>
    <?php $i=1?>
    @foreach($orders as $item)
    <tr>
        <td>{{$i}}</td>
        <td><img width="100" class="img-responsive" src="{{isset($item->product->pro_img)? pare_url_file($item->product->pro_img) : ''}}" ></td>
        <td><a href="{{route('get.detail.product',[$item->product->pro_id,$item->product->pro_slug])}}">{{$item->product->pro_name}}</a></td>
        <td>{{$item->or_qty}}</td>
        <td>{{number_format($item->or_price,0,',','.')}} đ</td>
        <td>{{number_format($item->or_price*$item->or_qty,0,',','.')}} đ</td>
    </tr>
    <?php $i++ ?>
    @endforeach
</table>
@endif