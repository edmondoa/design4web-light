<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Edit Employee - theninesquares</title>
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
	
	

@foreach($employees as $employees)
		{{ $employees->username }}
	
<form action="/employee/update" method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="emp_id" value="{{$employees->emp_detail}}">
	<input type="hidden" name="eid" value="{{ $eid }}">
  <h1>
    Update Employee
    <br>
  </h1>
  
  <div class="float-label">
    <input type="text" name="employee_name" id="emp_name"  placeholder="Employee Name" value="{{$employees->employee_name}}" required />
   
  </div>
  
  <div class="float-label">
    <input type="email" name="employee_email" id="email" placeholder="Employee Email"  value="{{$employees->employee_email}}" required />
  
  </div>
 
   
  <div class="float-label">
    <fa class="fa eye fa-eye-slash"></fa>
    <input type="password" name="password" placeholder="Employee Password" id="pw" required />
   
  </div>
  
  <div class="float-label">
    <fa class="fa eye fa-eye-slash"></fa>
    <input type="password" name="re-pw" placeholder="Employee re-type Password" id="repw" required />
  
  </div>
	<input class="btn_joe" type="submit" value="Submit"/>
  <button class="btn" id="clear" type="reset" value="Reset">Reset</button>
</form>

@endforeach


	
	
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

    <script  src="/public/register/js/index.js"></script>


</body>

</html>

