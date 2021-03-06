<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Graph - theninesquares</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js'></script>
	<script src='/public/chartjs/utils.js'></script>
	
	@include('header.styles')
	
	<style>
		h1 { text-align:center; }
		.joe-button {
			width:90%;
			font-size:16px;
			padding:20px;
			margin:50px;
			background-color:#eb3a2c;
			color:#fff;
		}
		
		body { margin:0, 0,0,0; padding:0,0,0,0; }
			
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
	
		$i = 1;
	@endphp
	
	
	
	@foreach($donut_graph_a as $donut_graph_a)
	
	
	
	@php
		$total_a =  (($donut_graph_a->value_a /  $donut_graph_a->target_a) *100);
		$less_a = 100- $total_a;
	
		if($total_a >=100){
			$total_a = 100;
			$total_a = 100;
			$less_a = 0;
		}
	
	@endphp
	
	
	@endforeach
<div class="containers">
<div class="box">	
	<div id="canvas-holder1" style="width:250px; direction:ltr; margin-left:auto; margin-right:auto; display:table;">
		<div style=""><h1 style="color:#999;">{{$total_a}}%</h1></div>
   <canvas id="chart-area1" width="150" height="150"/>
</div>
<script>
	var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};
	
var doughnutData1 = {
    
    datasets: [
        {
            data: [
				{{ $total_a}},
				{{ $less_a}}
				],
            backgroundColor: [
				'#108445', '#d02633'
				
            ],
			
        }
	
	]
	
};

jQuery(document).ready(function() {
var ctx1 = document.getElementById("chart-area1").getContext("2d");

    window.myDoughnutChart1 = new Chart(ctx1, {
        type: 'doughnut',
        data: doughnutData1,
        options: {
            responsive: true,
            elements: {
                arc: {
                    borderColor: "#fff"
                }
            },
            cutoutPercentage: 40
        },
        animation:{
            animateScale: true
        }
    });
});
</script>

	
	
		<div class="contentContainer">
		
	@foreach($gen_graph_a as $gen_graph_a)	
			@php
			
				if($gen_graph_a->value_a >= $gen_graph_a->target_a){
					$color_a = 'progressBarValue';
				}else {
					$color_a = 'progressBarRed';
					}
			
				$bar_width = round(($gen_graph_a->value_a / $gen_graph_a->target_a)*100);
			
				
			
			@endphp
	
	
	  <div class="progressBar">
		<h4>{{$gen_graph_a->employee_name }} - {{$gen_graph_a->measure_a }} - {{$gen_graph_a->value_a}}/ {{$gen_graph_a->target_a}}</h4>
		<div class="progressBarContainer">
		  <div class="{{$color_a}}"  style="width:{{$bar_width }}%"></div>
		</div>
	  </div>
	
		
	@endforeach
	
	</div>

	</div>
	
	
	@foreach($donut_graph_b as $donut_graph_b)
	
	
	
	@php
		$total_b =  (($donut_graph_b->value_b /  $donut_graph_b->target_b) *100);
		$total_bb = round($total_b);
		$less_b = 100- $total_b;
	
		if($total_b >=100){
			$total_b = 100;
			$total_bb = 100;
			$less_b = 0;
			}
	@endphp
	
	
	@endforeach
	
<div class="box">		
	<div id="canvas-holder2" style="width:250px; direction:ltr; margin-left:auto; margin-right:auto; display:table;">
		<div style=""><h1 style="color:#999;">{{ $total_bb}}%</h1></div>
   <canvas id="chart-area2" width="150" height="150"/>
</div>
<script>
var doughnutData2 = {
    
    datasets: [
        {
            data: [
				{{$total_b}},
				{{$less_b}}
				],
            backgroundColor: [
				'#108445', '#d02633'
			
            ]
        }]
};

jQuery(document).ready(function() {
var ctx2 = document.getElementById("chart-area2").getContext("2d");

    window.myDoughnutChart2 = new Chart(ctx2, {
        type: 'doughnut',
        data: doughnutData2,
        options: {
            responsive: true,
            elements: {
                arc: {
                    borderColor: "#fff"
                }
            },
            cutoutPercentage: 40
        },
        animation:{
            animateScale: true
        }
    });
});
</script>

	
	<div class="contentContainer">
	@foreach($gen_graph_b as $gen_graph_b)
		@php
			
				if($gen_graph_b->value_b >= $gen_graph_b->target_b){
					$color_b = 'progressBarValue';
				}else {
					$color_b = 'progressBarRed';
					}
		
			$bar_width_b = round(($gen_graph_b->value_b / $gen_graph_b->target_b)*100);
			@endphp
	
	
	<div class="progressBar">
		<h4>{{$gen_graph_b->employee_name }} - {{$gen_graph_b->measure_b}} - {{$gen_graph_b->value_b}}/{{$gen_graph_b->target_b}}</h4>
		<div class="progressBarContainer">
		  <div class="{{$color_b}}"  style="width:{{$bar_width_b}}%"></div>
		</div>
	  </div>	
	
		
	
	@endforeach
	</div>

	</div>
	
	
	@foreach($donut_graph_c as $donut_graph_c)
	
	
	@php
		$total_c =  (($donut_graph_c->value_c /  $donut_graph_c->target_c) *100);
		$less_c = 100- $total_c;
	
	if($total_c >=100){
			$total_c = 100;
			$total_c = 100;
			$less_c = 0;
		}
	@endphp
	
	
	@endforeach
	
<div class="box">		
	<div id="canvas-holder3" style="width:250px; direction:ltr; margin-left:auto; margin-right:auto; display:table;">
		<div style=""><h1 style="color:#999;">{{ $total_c  }}%</h1></div>
   <canvas id="chart-area3" width="200" height="200"/>
</div>
<script>
var doughnutData3 = {
    
    datasets: [
        {
            data: [
				{{$total_c }},
				{{$less_c }}
				  ],
            backgroundColor: [
				'#108445', '#d02633'
				
            ]
        }]
};

jQuery(document).ready(function() {
var ctx3 = document.getElementById("chart-area3").getContext("2d");

    window.myDoughnutChart3 = new Chart(ctx3, {
        type: 'doughnut',
        data: doughnutData3,
        options: {
            responsive: true,
            elements: {
                arc: {
                    borderColor: "#fff"
                }
            },
            cutoutPercentage: 40
        },
        animation:{
            animateScale: true
        }
    });
});
</script>

	
	<div class="contentContainer">
	@foreach($gen_graph_c as $gen_graph_c)
		@php
			
				if($gen_graph_c->value_c >= $gen_graph_c->target_c){
					$color_c = 'progressBarValue';
				}else {
					$color_c = 'progressBarRed';
					}
		
		$bar_width_c = round(($gen_graph_c->value_c / $gen_graph_c->target_c)*100);
		
		@endphp
	
		
	<div class="progressBar">
		<h4>{{$gen_graph_c->employee_name }} - {{$gen_graph_c->measure_c}} - {{$gen_graph_c->value_c}}/ {{$gen_graph_c->target_c}}</h4>
		<div class="progressBarContainer">
		  <div class="{{$color_c}}" style="width:{{$bar_width_c}}%"> </div>
		</div>
	  </div>	
	
		
	
	@endforeach
	</div>
	
	</div>

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


