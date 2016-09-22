@extends('layouts.app')
@section('css')
<link rel="stylesheet" type="text/css" href="{!! url('public/dormitory/css/bootstrap.min.css')!!}">
<link rel="stylesheet" type="text/css" href="{!! url('public/dormitory/css/font-awesome.min.css')!!}">
<link rel="stylesheet" type="text/css" href="{!! url('public/dormitory/css/main.css')!!}">

@endsection
@section('content')
<div id="updateStudent">
	<div class="container">
		<div class="top">
			<div class="inner-top">
				<p class="caption">eICTuStudentDormitorySearch - Tra cứu chỗ ở trong KTX</p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<h3 class="redirect">Sinh viên cập nhật nơi ở trong KTX</h3>
			</div>
		</div>
		<div class="contentUpdate">
			<h3>Tìm kiếm thông tin nơi ở sinh viên trong KTX bằng mã sinh viên</h3>
			<div class="box">
				<form action="" method="get" id="fSearch" class="form-horizontal" accept-charset="utf-8">
					<div class="form-group">
						<label class="col-sm-3 control-label"><i class="fa fa-circle-o"></i> Mã số sinh viên:</label>
						<div class="col-sm-4">
							<input type="text" name="" value="" class="form-control" placeholder="">
						</div>
						<div class="col-sm-2">
							<button type="sumit" class="btn btn">Tìm kiếm</button>
						</div>
					</div>
				</form>

				<div id="result">
					<h3>Kết quả tìm kiếm:</h3>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="{!! url('public/dormitory/js/jquery-1.12.4.min.js')!!}"></script>
	<script type="text/javascript" src="{!! url('public/dormitory/js/bootstrap.min.js')!!}"></script>
</div>
@endsection