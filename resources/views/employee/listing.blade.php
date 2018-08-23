<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Create Employee - theninesquares</title>
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
@foreach($employees as $employees)
 <div style="width:550px;clear:both;padding:5px;">
	  <div style="width:250px;float:left;">
	   <label>{{ $employees->username }}</label> 
	 </div>
	 <div style="width:50px;float:left;">
	 <a href="/employee/edit/{{$employees->id}}"><button>edit</button></a>
	 </div>
	  <div style="width:50px;float:left;">
	<form style="border:0px !important;" action="/employee/delete" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input name="eid" type="hidden" value="{{$employees->emp_detail}}"/>
		<input name="id" type="hidden" value="{{$employees->id}}"/>
		<input type="submit" class="btn_joe" value="Delete"/>
		
	 </form></div>
	 <div style="width:50px;float:left;">
	<form style="border:0px !important;" action="/company/employee/history" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input name="eid" type="hidden" value="{{$employees->emp_detail}}"/>
		<input name="id" type="hidden" value="{{$employees->id}}"/>
		
	 </form></div>
	</div>
@endforeach
	</div>
</body>
</html>

