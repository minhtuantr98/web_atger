@extends('admin::layouts.master')
@section('title','Anh Tger | Danh sách liên hệ')
@section('main')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách liên hệ</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th>STT</th>
											<th>Tên</th>
											<th width="200">Email</th>
											<th>Tiêu đề</th>
											<th>Nội dung</th>
											<th>Ngày</th>
											<th>Trạng thái</th>
											<th width="90">Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
									@if(isset($contacts))
									<?php $stt=1 ?>
										@foreach($contacts as $contact)
											<tr style="font-size: 14px;color:black">
												<td><?php echo $stt ?></td>
												<td>{{$contact->c_name}}</td>
												<td>{{$contact->c_email}}</td>
												<td>{{$contact->c_title}}</td>
												<td>{{$contact->c_content}}</td>
												<td>{{date('H:m d-m-y ', strtotime($contact->created_at))}}</td>
												<td><a href="{{route('admin.get.active.contact',$contact->id)}}">@if($contact->c_status==1)<span class="btn btn-sm btn-info">Đã xử lý</span> @else <span class="btn btn-sm btn-danger">Chờ xử lý</span> @endif</a></td>
												<td>
													<a href="{{route('admin.get.delete.contact',$contact->id)}}" onclick="return confirm('Bạn có chắc muốn xóa liên hệ này không?')" class="btn  btn-danger btn-sm"><span title="Xóa" class="glyphicon glyphicon-trash"></span></a>
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
									{{$contacts->links()}}
								</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	
	<div class="modal fade" id="myModalOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" >Đơn hàng mã #<b class="transaction_id"></b></h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="md_content">
			
			</div>
			<div class="modal-footer">
				<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
			</div>
		</div>
	</div>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>

<script type="text/javascript">
		$(function(){
			$(".js_order_item").click(function(event){
				event.preventDefault();
				let $this=$(this);
				let url =$this.attr('href');
				$(".transaction_id").text('').text($this.attr('data-id'));
				$.ajax({
					url:url,
				}).done(function(result){
					if (result) {
						$("#md_content").html(result.html);
					}
				});
				$("#myModalOrder").modal('show');

			});
		})
</script>
@stop