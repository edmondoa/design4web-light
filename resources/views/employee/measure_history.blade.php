<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Employee Measure Lists - theninesquares</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
	
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js'></script>
	<script src='/public/chartjs/utils.js'></script>
	
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
		$color_set_a = "red";
		$color_set_b = "red";
		$color_set_b = "red";
	@endphp

<div class="containers">	
	<h1 style="text-align:center;">Measure Listings</h1>
	
@foreach($measure_lists as $measure_lists)
	
	<div class="box">	
	<ul>
		<li><h4>{{ $measure_lists->date_posted }}</h4></li>
		<li>
			@php 
				if ($measure_lists->value_a >= $measure_lists->target_a){
					
					$color_set_a = 'progressBarValue';
				}else {
					$color_set_a = 'progressBarRed';
					}
			
				$bar_width = round(($measure_lists->value_a / $measure_lists->target_a)*100);
			
			@endphp
			
			 <div class="progressBar">
				<h4>{{ $measure_lists->measure_a}} - {{$measure_lists->value_a}}/{{$measure_lists->target_a}}</h4>
				<div class="progressBarContainer">
				  <div class="{{$color_set_a}}"  style="width:{{$bar_width }}%"></div>
				</div>
			  </div>
			
		
		</li>
		
		
		<li>
		@php 
				if ($measure_lists->value_b >= $measure_lists->target_b){
					
					$color_set_b = 'progressBarValue';
				}else {
					$color_set_b = 'progressBarRed';
					}
				
			$bar_width_b = round(($measure_lists->value_b / $measure_lists->target_b)*100);
			
		@endphp
			
			 <div class="progressBar">
				<h4>{{ $measure_lists->measure_b}} - {{$measure_lists->value_b}}/{{$measure_lists->target_b}}</h4>
				<div class="progressBarContainer">
				  <div class="{{$color_set_b}}"  style="width:{{$bar_width_b }}%"></div>
				</div>
			  </div>
			
			 
		
		</li>
		<li>
		
		@php 
			
				if ($measure_lists->value_c >= $measure_lists->target_c){
					
					$color_set_c = 'progressBarValue';
				}else {
					$color_set_c = 'progressBarRed';
					}
			
				$bar_width_c = round(($measure_lists->value_c / $measure_lists->target_c)*100);
			
			
		@endphp	
			
			 <div class="progressBar">
				<h4>{{ $measure_lists->measure_c}} - {{$measure_lists->value_c}}/{{$measure_lists->target_c}}</h4>
				<div class="progressBarContainer">
				  <div class="{{$color_set_c}}"  style="width:{{$bar_width_c }}%"></div>
				</div>
			  </div>
			
		</li>
	</ul>
	</div>

@endforeach

	</div>
	
	<style>
	.contentContainer {
 
  padding: 20px;
  max-width: 350px;
  min-width: 150px;
  margin: 0vh auto;
}

/*///////////////////////////////////////////////////////
    // Progress Bars \\ 
///////////////////////////////////////////////////////*/

.progressBar {
  margin-bottom: 26px;
  margin-bottom: 1.66em;
}

.progressBar h4 {
	color:#999;
  font-size: 12px;
  text-transform: none;
  font-family: Arial, Helvetica, sans-serif;
  margin-bottom: 7px;
  margin-bottom: .33em;
}

.progressBarContainer {
  width: 100%;
  max-width: 350px;
  height: 26px;
  height: 1.66em;
  background: #108445;
  background: rgba(16,132,69,.75);
  overflow: hidden;
  border-radius: 5px;
}

.progressBarRed {
  height: 1.66em;
  float: left;
 background: rgba(16,132,69,.75);
  background: #d02633 !important;
  
	color:white;
	padding:2px;
	padding-left:5px;
	padding-top:4px;
}

		
.progressBarValue {
  height: 1.66em;
  float: left;
  background: #108445;
  background: rgba(16,132,69,.65);
	color:white;
	padding:2px;
	padding-left:5px;
	padding-top:4px;
}
		

.value-00 { width: 0; }

.value-10 { width: 10%; }

.value-20 { width: 20%; }

.value-30 { width: 30%; }

.value-40 { width: 40%; }

.value-50 { width: 50%; }

.value-60 { width: 60%; }

.value-70 { width: 70%; }

.value-80 { width: 80%; }

.value-90 { width: 90%; }

.value-100 { width: 100%; }
		

.separation {
	margin-bottom:40px;
	width:100%;height:5px;
background: rgba(88,204,182,.75);
}
		
		.box { width:250px !important;
			padding:20px;
			float:left;
			
		}
		
		.containers {
			width:870px;
			margin-left:auto;
			margin-right:auto;
		}
	</style>

		
</body>

</html>



