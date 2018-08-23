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
	
 
	
	<div id="canvas-holder-2" style="width:30%; direction:ltr; margin-left:auto; margin-right:auto; display:table;">
   <canvas id="chart-area3" width="250" height="250"/>
</div>
<script>
var doughnutData3 = {
   datasets: [{
            data: [
                50,50,
               
               
            ],
                backgroundColor: [
                "#F7464A",
                "#46BFBD",
                
            ],
        }, {
            data: [
                30,30,40,
               
              
            ],
                backgroundColor: [
                "#F7464A",
                "#46BFBD",
               
            ],
        },   {
            data: [
                40,20,40,
               
              
            ],
                backgroundColor: [
                "#F7464A",
                "#46BFBD",
               
            ],
        },
        
        
        
        ],
        labels: [
            "Measure One",
            "Measure Two",
			"Measure Three",
            
        ]
};

jQuery(document).ready(function() {
var ctx2 = document.getElementById("chart-area3").getContext("2d");

    window.myDoughnutChart3 = new Chart(ctx2, {
        type: 'doughnut',
        data: doughnutData3,
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

	
</body>
</html>

