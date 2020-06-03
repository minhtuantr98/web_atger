@extends('admin::layouts.master');
@section('title','Chỉnh sủa quản trị viên')
@section('main')		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Quản trị viên</div>
					<div class="panel-body">
						<form method="post" enctype="multipart/form-data">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Tên</label>
										<input required type="text" name="name" class="form-control" value="{{$admin->name}}">
									</div>
									<div class="form-group" >
										<label>Email</label>
										<input required type="email" name="email" class="form-control" value="{{$admin->email}}">
									</div>
                                    <div class="form-group" >
										<label>Password</label>
										<input required type="password" name="password" class="form-control" value="{{$admin->password}}">
									</div>
									<!-- <div class="form-group" >
										<label>Ảnh sản phẩm</label>
										<input required id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
					                    <img id="avatar" class="thumbnail" width="300px" src="img/new_seo-10-512.png">
									</div> -->
									<div class="form-group" >
										<label>Address</label>
										<input required type="text" name="address" class="form-control" value="" placeholder="Hà Nội">
									</div>
                                    <div class="form-group" >
										<label>Số điện thoại</label>
										<input required type="text" name="phone" class="form-control" value="" placeholder="0987654321">
									</div>
								
									<div class="form-group" >
										<label>Quyền</label><br>
										Admin: <input type="radio" name="level" value="2">
										Quản trị viên: <input type="radio" checked name="level" value="1">
									</div>
									<input type="submit" name="submit" style="width:100px" value="Thêm" class="btn btn-primary">
									<a href="#" style="width:100px ; margin-left:20px" class="btn btn-danger">Hủy bỏ</a>
								</div>
							</div>
							{{csrf_field()}}
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

@stop
