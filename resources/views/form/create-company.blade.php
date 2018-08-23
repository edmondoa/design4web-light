<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Create Company - theninesquares</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  
      <link rel="stylesheet" href="/public/register/css/style.css">

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
  
<form action="/company/create" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
  <h1>
    Create Company
    <br>
  </h1>
  
  <div class="float-label">
    <input type="text" name="company_name" id="f-name" />
    <label for="f-name">Company Name</label>
  </div>
  
  <div class="float-label">
    <input type="email" name="email" id="email" />
    <label for="email">Company Email</label>
  </div>
  
 
  
  
  <div class="float-label">
    <fa class="fa eye fa-eye-slash"></fa>
    <input type="password" name="password" id="pw" />
    <label for="pw">Password</label>
  </div>
  
  <div class="float-label">
    <fa class="fa eye fa-eye-slash"></fa>
    <input type="password" name="re-pw" id="repw" />
    <label for="re-pw">Re Password</label>
  </div>
  <input class="btn_joe" type="submit" value="Submit"/>
  
</form>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

  

    <script  src="/public/register/js/index.js"></script>




</body>

</html>
