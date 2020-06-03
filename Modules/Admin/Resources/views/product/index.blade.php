@extends('admin::layouts.master')
@section('title','Anh Tger | Danh sách sản phẩm')
@section('main')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách sản phẩm</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<a href="{{asset('admin/product/create')}}" class="btn btn-primary">Thêm sản phẩm</a>
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th>STT</th>
											<th >Tên Sản phẩm</th>
											<th>Giá bán</th>
											<th >Ảnh sản phẩm</th>
											<th>Đã bán</th>
											<th>Nổi bật</th>
											<th>Danh mục</th>
											<th>Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
									<?php $stt=1 ?>
									@foreach($productlist as $product)
										<tr>
											<td><?php echo $stt ?></td>
											<td style="color:black;">{{$product->pro_name}}
												<ul>
													<li style="color:red;">Giá:{{number_format($product->pro_price,0,',','.')}} VNĐ</li>
													<li style="color:blue;">Khuyến mãi:{{$product->pro_discount}} %</li>
												</ul>

											</td>
											<td style="color:black;">{{number_format($product->pro_price - $product->pro_price*$product->pro_discount/100 ,0,',','.')}} VND</td>
											<td>
												<img width="100px" src="{{ pare_url_file($product->pro_img) }}" class="thumbnail">
											</td>
											<td>{{$product->pro_sold}}</td>
											<td>@if($product->pro_featured==1)<span class="btn btn-sm btn-info">Nổi bật</span> @else <span class="btn btn-sm btn-danger">Không</span> @endif</td>
											<td>{{$product->cate_name}}</td>
											<td>
												<a href="{{asset('admin/product/update/'.$product->pro_id)}}" class="btn  btn-warning"><span title="Sửa" class="glyphicon glyphicon-edit"></span></a>
												<a href="{{asset('admin/product/delete/'.$product->pro_id)}}" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')" class="btn  btn-danger"><span title="Xóa" class="glyphicon glyphicon-trash	
"></span></a>
											</td>
										</tr>
										<?php $stt++ ?>
										@endforeach

									</tbody>
								</table>							
							</div>
						</div>
						<div class="row">
								<div class="col-md-5"></div>
								<div class="col-md-7" style="font-size: 25px" id="pagination">
									{{$productlist->links()}}
								</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				
			</div>
		
		</div><!--/.row-->
	</div>	<!--/.main-->
@stop