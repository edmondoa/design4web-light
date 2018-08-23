<!DOCTYPE html>
<html lang="en">
<head>
	<title>Welcome to Theninesquares</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/public/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/public/login/vendor/bootstrap/css/bootstrap.min.css">
	
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
	

	
<div id="info" style="padding:10px;width:300px;">
	<h3>Hi Super Admin!</h3>
	
	
</div>
	<div style="width:100%; height:5px;"></div>
<div style="border:1px solid #f4f4f4;padding:10px;width:300px;min-height:400px;float:left;margin-right:10px;">
	<h5 style="width:100%; background-color:#f4f4f4;padding:5px;">Companies</h5>
	<ul>
		@foreach($company as $company)
		<li>{{$company->company_name}}</li>
		@endforeach
	</ul>
	
</div>
	


	
	@foreach($donut_graph_main as $donut_graph_main)
	
	
	@php
		$total_a =  (($donut_graph_main->value_a /  $donut_graph_main->target_a) *100);
		$less_a = 100- $total_a;
	
		if($total_a >=100){
			$total_a = 100;
			$total_a = 100;
			$less_a = 0;
		}
	
	$counter = 'c1'.$donut_graph_main->company_id;
	
	@endphp
	
	
<div class="cont">
	<h4 style="text-align:left;color:#999;">{{$donut_graph_main->company_name }} </h4>
<div class="box">	
	<div id="canvas-holder{{$counter}}" style="width:250px; direction:ltr; margin-left:auto; margin-right:auto; display:table;">
		<div style=""><h1 style="color:#999;">{{$total_a}}%</h1><h4>{{$donut_graph_main->measure_a }} </h4></div>
   <canvas id="Achart-area{{$counter}}" width="150" height="150"/>
		
</div>
<script>
	var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};
	
var AdoughnutData{{$counter}} = {
    
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
var ctx{{$counter}} = document.getElementById("Achart-area{{$counter}}").getContext("2d");

    window.myDoughnutChart{{$counter}} = new Chart(ctx{{$counter}}, {
        type: 'doughnut',
        data: AdoughnutData{{$counter}},
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

	</div>
	
	
	@php
		$total_b =  (($donut_graph_main->value_b /  $donut_graph_main->target_b) *100);
		$total_bb = round($total_b);
		$less_b = 100 - $total_b;
	
		if($total_b >=100){
			$total_b = 100;
			$total_bb = 100;
			$less_b = 0;
			}
	@endphp
	
	
	
<div class="box">		
	<div id="canvas-holder{{$counter}}" style="width:250px; direction:ltr; margin-left:auto; margin-right:auto; display:table;">
		<div style=""><h1 style="color:#999;">{{ $total_bb}}%</h1><h4>{{$donut_graph_main->measure_b }} </h4></div>
   <canvas id="Bchart-area{{$counter}}" width="150" height="150"/>
		
</div>
<script>
var BdoughnutData{{$counter}} = {
    
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
var ctx{{$counter}} = document.getElementById("Bchart-area{{$counter}}").getContext("2d");

    window.myDoughnutChart{{$counter}} = new Chart(ctx{{$counter}}, {
        type: 'doughnut',
        data: BdoughnutData{{$counter}},
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
</div>
	
	
	@php
		$total_c =  (($donut_graph_main->value_c /  $donut_graph_main->target_c) *100);
		$less_c = 100- $total_c;
	
	if($total_c >=100){
			$total_c = 100;
			$total_c = 100;
			$less_c = 0;
		}
	
	@endphp
	
	
	
<div class="box">		
	<div id="canvas-holder{{$counter}}" style="width:250px; direction:ltr; margin-left:auto; margin-right:auto; display:table;">
		<div style=""><h1 style="color:#999;">{{ $total_c }}%</h1>
		<h4>{{$donut_graph_main->measure_c }} </h4>
		</div>
   <canvas id="Cchart-area{{$counter}}" width="200" height="200"/>
		
</div>
<script>
var CdoughnutData{{$counter}} = {
    
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
var ctx{{$counter}} = document.getElementById("Cchart-area{{$counter}}").getContext("2d");

    window.myDoughnutChart{{$counter}} = new Chart(ctx{{$counter}}, {
        type: 'doughnut',
        data: CdoughnutData{{$counter}},
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

</div>
	
	</div>

@endforeach
		
	
	
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
			width:100%;
			border-top:1px solid #f4f4f4;
			margin-top:50px;
			padding-top:20px;
		}
	</style>


</body>
</html>
