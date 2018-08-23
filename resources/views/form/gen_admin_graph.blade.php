<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Generate Graph - theninesquares</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  
    <link rel="stylesheet" href="/public/register/css/style.css">
	
	<!-- Include Required Prerequisites -->
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />

	<!-- Include Date Range Picker -->
	<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

	@include('header.styles')
	
	<style>
		form {
			border:5px solid #000 !important;
		}
	</style>

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
  
<form action="/admin/graph" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
  <h1>
    Graph
    <br>
  </h1>
	
  <div class="float-label"> 
 	<input type="date" placeholder="Start Date" name="sdate" required>  
  </div>

 <div class="float-label">  
 	<input type="date"  placeholder="End Date" name="edate" required> 
  </div>
	

  <input class="btn_joe" type="submit" value="Submit"/>
  
</form>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script  src="/public/register/js/index.js"></script>




</body>

</html>
