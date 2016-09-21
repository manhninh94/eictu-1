@extends('quanlylophoc.main')
@section('title')	
		Sinh nhật bạn cùng lớp 	
@endsection		

@section('content')
<div class="qllophoc_header">
	<header id="header" class="">
		<div class="header-content">
				<span class="title">eICTuClassmatersBirthday - Sinh nhật bạn cùng lớp</span>
		</div>
	</header>
<!--
	<table class="table_header" >
		<tr>
		  <td >eICTuClassmatersBirthday - Sinh nhật bạn cùng lớp</td>
		  <td align="right"><img src="{!! url('quanlylophoc/images/logout.png')!!}" />Logout</td>
		</tr>
	</table>
-->
</div>
<div class="qllophoc_content">	
	<div class="dssv">
	   <table class="table" >				
			<tr><td align="left" class="col-md-1" colspan="12" >30 ngày sắp tới sinh nhật của các bạn lớp mình có:</td></tr>
			@if (count($bansinhnhat) <1 || $bansinhnhat=="")
				<tr >
					<th class="col-md-1" colspan="12">
						Không có bạn nào sẽ sinh nhật trong 30 ngày tới.
					</th>
				</tr>
			@else
				@foreach ($bansinhnhat as $sv)						
					<tr >
						<th>{{ $loop->iteration }}.</th>
						<th>{{ $sv['hoten'] }}</th>								
						<th>{{ $sv['gioitinh'] }}</th>
						<th>{{ $sv['ns'] }}</th>
						<th class="col-md-8" colspan="8">{{ $sv['songay'] }}</th>
					</tr>
				@endforeach
			@endif				
				
		</table>	

   </div>
</div>
@endsection			


  