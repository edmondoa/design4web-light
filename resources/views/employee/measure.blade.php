<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Create Employee - theninesquares</title>
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
	
 

@foreach($emp_measure as $emp_measure)
  
<form action="/employee/measure" method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="cid" value="{{Auth::user()->user_id }}">
	<input type="hidden" name="measure_id" value="{{ $emp_measure->mid }}">
  <h1>
    Measure Employee
    <br>
  </h1>
 
  <div class="float-label">
    <input type="text" name="value_a" id="f-name" />
    <label for="f-name">{{ $emp_measure->measure_a }}</label>
  </div>
  
  <div class="float-label">
    <input type="text" name="value_b" id="f-name" />
    <label for="f-name">{{ $emp_measure->measure_b }}</label>
  </div>
  
  <div class="float-label">
    <input type="text" name="value_c" id="f-name" />
    <label for="f-name">{{ $emp_measure->measure_c }}</label>
  </div>
 
  
	<input class="btn_joe" type="submit" value="Submit"/>
  <button class="btn" id="clear" type="reset" value="Reset">Reset</button>
</form>
@endforeach
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

  

    <script  src="/public/register/js/index.js"></script>




</body>

</html>
