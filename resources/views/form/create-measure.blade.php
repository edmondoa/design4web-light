<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Create Measure - theninesquares</title>
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
	
  <div class="confirm">
  <i class='close'>×</i>
  <h1><i class="fa fa-check-circle fa-3x"></i>Measure Created</h1>
</div>
<form action="/measure/create" method="post">
	@php
		if($exist = true){
	@endphp
		<input type="hidden" name="data_exist" value="true">
	@php
		}else {
	
	@endphp
		<input type="hidden" name="data_exist" value="false">
	
	@php
	
	}
	
	@endphp
	
	
  	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<h1>
   Create Measure
    <br>
  </h1>
  
  <div class="float-label">
    <input type="text" name="m_a" id="f-name" />
    <label for="f-name">Measure</label>
	</div>
  <div class="float-label">
    <input type="text" name="t_a" id="f-name" />
    <label for="f-name">Target Measure</label>
   </div>	
	<br>
   <div class="float-label">
    <input type="text" name="m_b" id="f-name" />
    <label for="f-name">Measure</label>
  </div>
	
 <div class="float-label">
    <input type="text" name="t_b" id="f-name" />
    <label for="f-name">Target Measure</label>
  </div>	
<br>
   <div class="float-label">
    <input type="text" name="m_c" id="f-name" />
    <label for="f-name">Measure</label>
  </div>
	
  <div class="float-label">
    <input type="text" name="t_c" id="f-name" />
    <label for="f-name">Target Measure</label>
   </div>	 
  
  <input type="submit" class="btn_joe" value="Add Measure"/>

</form>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

  

    <script  src="/public/register/js/index.js"></script>



</body>

</html>
