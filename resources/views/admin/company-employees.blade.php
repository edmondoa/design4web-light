<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Company - theninesquares</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
@include('header.styles')
	
</head>

<body>
@php
		$get_user = Auth::user()->level;
	
	if($get_user == 'company'){
	@endphp
	
			@include('header.company_menu')
	
	@php
	}
	@endphp
	
	@php
	if($get_user == 'employee'){
	@endphp
	
			@include('header.employee_menu')
	
	@php
	}
	@endphp
	
	@php
	if($get_user == 'admin'){
	@endphp
	
			@include('header.admin_menu')
	
	@php
	}
	@endphp
	
 
<div style="640px; margin-left:auto; margin-right:auto;">
@foreach($employee_lists as $employee_lists)
 <div style="width:650px;clear:both;padding:5px;">
	  <div style="width:250px;float:left;">
	   <label>{{$employee_lists->employee_name }}</label> 
	 </div>

	  <div style="width:50px;float:left;">
	<form style="border:0px !important;" action="/company/employee/delete" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input name="id" type="hidden" value="{{$employee_lists->employee_id}}"/>
		<button type="submit" value="delete">delete</button>
	 </form></div>
	</div>
@endforeach
	</div>
</body>
</html>

