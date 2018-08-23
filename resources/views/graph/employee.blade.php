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
	
		@foreach($emp_graph as $emp_graph)
			@php
			
				if($emp_graph->value_a >= $emp_graph->target_a){
					$color_a = 'window.chartColors.green';
				}else {
					$color_a = 'window.chartColors.red';
					}
			@endphp
	
	<h1>{{$emp_graph->measure_a}}</h1>
	<div id="canvas-holder-{{$i}}" style="width:30%; direction:ltr; margin-left:auto; margin-right:auto; display:table;">
   <canvas id="chart-area{{$i}}" width="250" height="250"/>
</div>
<script>
var doughnutData{{$i}} = {
    
    datasets: [
        {
            data: [10913],
            backgroundColor: [
				{{$color_a}}
            ],
            hoverBackgroundColor: [
               {{$color_a}}
            ]
        }]
};

jQuery(document).ready(function() {
var ctx{{$i}} = document.getElementById("chart-area{{$i}}").getContext("2d");

    window.myDoughnutChart{{$i}} = new Chart(ctx{{$i}}, {
        type: 'doughnut',
        data: doughnutData{{$i}},
        options: {
            responsive: true,
            elements: {
                arc: {
                    borderColor: "#333"
                }
            },
            cutoutPercentage: 50
        },
        animation:{
            animateScale: true
        }
    });
});
</script>

	
	
	
	
	
	@php
		$i++;
	@endphp
	
		
	@endforeach

	
	@php
		$j = 1;
	@endphp
	
	@foreach($emp_graph_measure_b as $emp_graph_measure_b)
		@php
			
				if($emp_graph_measure_b->value_b >= $emp_graph_measure_b->target_b){
					$color_a = 'window.chartColors.green';
				}else {
					$color_a = 'window.chartColors.red';
					}
			@endphp
	
	
			<h1>{{$emp_graph->measure_b}}</h1>
			<div id="canvas-measure_b-{{$j}}" style="width:30%; direction:ltr; margin-left:auto; margin-right:auto; display:table;">
		   <canvas id="chart-area_measure_b{{$j}}" width="250" height="250"/>
		</div>
		<script>
		var doughnutData_b{{$j}} = {
			
			datasets: [
				{
					data: [10913],
					backgroundColor: [
						{{$color_a}}
					],
					hoverBackgroundColor: [
					   {{$color_a}}
					]
				}]
		};

		jQuery(document).ready(function() {
		var ctx_b_{{$j}} = document.getElementById("chart-area_measure_b{{$j}}").getContext("2d");

			window.myDoughnutChart_b{{$j}} = new Chart(ctx_b_{{$j}}, {
				type: 'doughnut',
				data: doughnutData_b{{$j}},
				options: {
					responsive: true,
					elements: {
						arc: {
							borderColor: "#333"
						}
					},
					cutoutPercentage: 50
				},
				animation:{
					animateScale: true
				}
			});
		});
		</script>

	
	
		
	@php
		$j++;
	@endphp
	
	@endforeach
	

	
	
	@php
		$k = 1;
	@endphp
	
	@foreach($emp_graph_measure_c as $emp_graph_measure_c)
		@php
			
				if($emp_graph_measure_c->value_c >= $emp_graph_measure_c->target_c){
					$color_a = 'window.chartColors.green';
				}else {
					$color_a = 'window.chartColors.red';
					}
			@endphp
	
	
			<h1>{{$emp_graph_measure_c->measure_c}}</h1>
			<div id="canvas-measure_c-{{$k}}" style="width:30%; direction:ltr; margin-left:auto; margin-right:auto; display:table;">
		   <canvas id="chart-area_measure_c{{$k}}" width="250" height="250"/>
		</div>
		<script>
		var doughnutData_c{{$k}} = {
			
			datasets: [
				{
					data: [10913],
					backgroundColor: [
						{{$color_a}}
					],
					hoverBackgroundColor: [
					   {{$color_a}}
					]
				}]
		};

		jQuery(document).ready(function() {
		var ctx_c_{{$k}} = document.getElementById("chart-area_measure_c{{$k}}").getContext("2d");

			window.myDoughnutChart_c{{$k}} = new Chart(ctx_c_{{$k}}, {
				type: 'doughnut',
				data: doughnutData_c{{$k}},
				options: {
					responsive: true,
					elements: {
						arc: {
							borderColor: "#333"
						}
					},
					cutoutPercentage: 50
				},
				animation:{
					animateScale: true
				}
			});
		});
		</script>

	
	
		
	@php
		$k++;
	@endphp
	
	@endforeach
	

	<a href="/#">
	<button class="joe-button">View Last Week</button>
	</a>
	
	
</body>
</html>

