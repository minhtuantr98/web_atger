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
								<a href="{{asset('admin/manager/create')}}" class="btn btn-primary">Thêm thành viên quản lý</a>
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th>STT</th>
											<th>Tên</th>
											<th>Email</th>
											<th>SĐT</th>
											<th>Địa chỉ</th>
											<th>Quyền</th>
											<th>Trạng thái</th>
											<th>Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
									@if(isset($admins))
									<?php $stt=1 ?>
										@foreach($admins as $admin)
											<tr style="font-size: 14px;color:black">
												<td><?php echo $stt ?></td>
												<td>{{$admin->name}}</td>
												<td>{{$admin->email}}</td>
												<td>{{$admin->phone}}</td>
												<td>{{$admin->address}}</td>
												<td><a href="{{route('admin.get.active.manager',$admin->id)}}">@if($admin->level==1)<span class="btn btn-sm btn-info">Quản trị viên  @else <span class="btn btn-sm btn-success">Admin</span>@endif</a></td>
												<td>@if($admin->status==1)<span class="btn btn-sm btn-info">Hoạt động @else <span class="btn btn-sm btn-success">Không</span> @endif</td>
												<td>
													@if($admin->level==1) <a href="{{route('admin.get.delete.manager',$admin->id)}}" onclick="return confirm('Bạn có chắc muốn xóa tài khoản này không?')" class="btn  btn-danger"><span title="Xóa" class="glyphicon glyphicon-trash"></span></a>
													@endif
												</td>
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
								{{$admins->links()}}
								</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				
			</div>
		
		</div><!--/.row-->
	</div>	<!--/.main-->
@stop