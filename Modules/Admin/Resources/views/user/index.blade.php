@extends('admin::layouts.master')
@section('title','Anh Tger | Danh sách thành viên')
@section('main')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách thành viên</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th>STT</th>
											<th>Tên</th>
											<th>Email</th>
											<th>SĐT</th>
											<th>Địa chỉ</th>
											<th>Trạng thái</th>
											<!-- <th>Tùy chọn</th> -->
										</tr>
									</thead>
									<tbody>
									@if(isset($users))
									<?php $stt=1 ?>
										@foreach($users as $user)
											<tr style="font-size: 14px;color:black">
												<td><?php echo $stt ?></td>
												<td>{{$user->user_name}}</td>
												<td>{{$user->user_email}}</td>
												<td>{{$user->user_phone}}</td>
												<td>{{$user->user_address}}</td>
												<td>@if($user->status==1)<span class="btn btn-sm btn-info">Hoạt động</span> @else <span class="btn btn-sm btn-danger">Không</span> @endif</td>
												<!-- <td>
													<a href="" class="btn  btn-warning"><span title="Sửa" class="glyphicon glyphicon-edit"></span></a>
													<a href="" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')" class="btn  btn-danger"><span title="Xóa" class="glyphicon glyphicon-trash"></span></a>
												</td> -->
											</tr>
											<?php $stt++ ?>
										@endforeach
									@endif
									</tbody>
								</table>							
							</div>
						</div>
						<div class="row">
								<div class="col-md-5"></div>
								<div class="col-md-7" style="font-size: 25px" id="pagination">
								{{$users->links()}}
								</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				
			</div>
		
		</div><!--/.row-->
	</div>	<!--/.main-->
@stop