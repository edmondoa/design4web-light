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
	
 
	

@php
	$n = 0;
	$m_two = 0;
	$m_three = 0;
	
@endphp
<ul>
@foreach($emp_measure as $emp_measure) 
@php
	
	 $n += $emp_measure->value_a;
		if($n < $emp_measure->target_a){
				$color_code = 'red';
			}else {
				$color_code = 'green';
			}

	  $m_two += $emp_measure->value_b;
		if($m_two < $emp_measure->target_b){
				$color_code_mB = 'red';
			}else {
				$color_code_mB = 'green';
			}
	
		$m_three += $emp_measure->value_c;
		if($m_three < $emp_measure->target_c){
				$color_code_mC = 'red';
			}else {
				$color_code_mC = 'green';
			}
@endphp

<li>{{$emp_measure->date_posted }} - {{$emp_measure->measure_a}} - {{	$emp_measure->value_a }} - {{ $color_code }} </li>
<li>{{$emp_measure->date_posted }} - {{$emp_measure->measure_b}} -  {{	$emp_measure->value_b }} - {{ $color_code_mB }}</li>
<li>{{$emp_measure->date_posted }} - {{$emp_measure->measure_c}} -  {{	$emp_measure->value_c }} - {{ $color_code_mC }}</li>

@endforeach
	</ul>	


</body>

</html>

