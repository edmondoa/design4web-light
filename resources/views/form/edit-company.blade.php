<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>edit Company - theninesquares</title>
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
  
	
	@foreach($company as $company)
<form action="/company/update" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="cid" value="{{ $company->company_id }}">
  <h1>
    edit Company
    <br>
  </h1>
  
  <div class="float-label">
    <input type="text" placeholder="company name" name="company_name" id="f-name" value="{{ $company->company_name }}" />
 
  </div>
  
  <div class="float-label">
    <input type="email" placeholder="company email" name="email" id="email" value="{{ $company->company_email }}" />

  </div>
    
  
  <div class="float-label">
    <fa class="fa eye fa-eye-slash"></fa>
    <input type="password" placeholder="password" name="password" id="pw" />
    
  </div>
  
  <div class="float-label">
    <fa class="fa eye fa-eye-slash"></fa>
    <input type="password" placeholder="re-type password" name="re-pw" id="repw" />
  
  </div>
  <input class="btn_joe" type="submit" value="Submit"/>
  
</form>
	
	@endforeach
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

  

    <script  src="/public/register/js/index.js"></script>




</body>

</html>
