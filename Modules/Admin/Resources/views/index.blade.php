@extends('admin::layouts.master')
@section('title','Trang quản trị')
@section('main')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Trang chủ</h1>
			</div>
		</div><!--/.row-->
									
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{$total_products}}</div>
							<div class="text-muted"><a href="{{route('admin.get.list.product')}}">Sản phẩm</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{$new_contacts}} / {{$total_contacts}}</div>
							<div class="text-muted"><a href="{{route('admin.get.list.contact')}}">Liên hệ</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{$total_users}}</div>
							<div class="text-muted"><a href="{{route('admin.get.list.user')}}">Người dùng</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{$new_trans}} / {{$total_trans}}</div>
							<div class="text-muted"><a href="{{route('admin.get.list.transaction')}}">Đơn hàng mới</a></div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<figure class="highcharts-figure">
				<div class="col-md-12" id="container" data-list-day={{$listday}} data-money={{$arrRevenTransactionMonth}} ></div>
			</figure>
		</div>
		<div class="row">
			<figure class="highcharts-figure">
				<div class="col-md-12" id="container2" data-list-month={{$listmonth}} data-money={{$arrRevenTransactionYear}} ></div>
			</figure>
		</div>
		
		
	</div>	<!--/.main-->

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script>
	// Create the chart
	let listday=$('#container').attr("data-list-day");
	listday=JSON.parse(listday);

	let listMonney= $('#container').attr("data-money");
	listMonney=JSON.parse(listMonney);

	let listmonth=$('#container2').attr("data-list-month");
	listmonth=JSON.parse(listmonth);

	let listMonneyMonth= $('#container2').attr("data-money");
	listMonneyMonth=JSON.parse(listMonneyMonth);


	Highcharts.chart('container', {
		chart: {
			type: 'line'
		},
		title: {
			text: 'Thống kê doanh thu từng ngày trong tháng',
			style:{
				fontSize:'24px',
				color:'red'
			}
		},
	
		xAxis: {
			categories: listday
		},
		yAxis: {
			title: {
				text: 'Doanh thu',
				style: {
				fontSize: '18px',
				color: 'green'
				}
			},
			
		},
		tooltip:{
			crosshairs:true,
			shared:true
		},
		credits: {
		enabled: false  // hide Highchar.com
		},
		plotOptions: {
			line: {
				dataLabels: {
					enabled: true
				},
				enableMouseTracking: false
			}
		},
		series: [{
			name: 'Giao dịch hoàn tất',
			data: listMonney
		}]
	});

	Highcharts.chart('container2', {
		chart: {
			type: 'line'
		},
		title: {
			text: 'Thống kê doanh thu từng tháng trong năm',
			style:{
				fontSize:'24px',
				color:'red'
			}
		},
	
		xAxis: {
			categories: listmonth
		},
		yAxis: {
			title: {
				text: 'Doanh thu',
				style: {
				fontSize: '18px',
				color: 'green'
				}
			},
			
		},
		tooltip:{
			crosshairs:true,
			shared:true
		},
		credits: {
		enabled: false  // hide Highchar.com
		},
		plotOptions: {
			line: {
				dataLabels: {
					enabled: true
				},
				enableMouseTracking: false
			}
		},
		series: [{
			name: 'Giao dịch hoàn tất',
			data: listMonneyMonth
		}]
	});
</script>
@stop


