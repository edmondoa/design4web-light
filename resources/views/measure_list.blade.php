<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Measure Lists - theninesquares</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="/public/register/css/style.css">
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
	
	<form action="/measure/edit" method="post" style="width:500px !important; margin-right:auto; margin-left:auto; padding:10px;">
 	<h1>
  View Measure
    <br>
  </h1>
  @foreach($measure_lists as $measure_lists)
  <div class="float-label" style="height:20px;margin-bottom:10px;">
	  <label>{{ $measure_lists->measure_a }} - <b>{{ $measure_lists->target_a }}</b></label>
	</div>
		<br>
  <div class="float-label" style="height:20px;margin-bottom:10px;">
	  <label>{{ $measure_lists->measure_b }} - <b>{{ $measure_lists->target_b }}</b></label>
  
   </div>	
	<br>
   <div class="float-label"style="height:20px;margin-bottom:10px;">
	   <label>{{ $measure_lists->measure_c }} - <b>{{ $measure_lists->target_c }}</b></label>

  </div>
	<input type="hidden" name="id" value="{{ $measure_lists->id }}">
  	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="submit" class="btn_joe" value="Edit" style="margin-top:50px;"/>
		
	</form>
	
	@endforeach
	
	  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script  src="/public/register/js/index.js"></script>
</body>
</html>

