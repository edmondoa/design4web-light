<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Graph Measure - theninesquares</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="/public/register/css/style.css">
	
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js'></script>
	<script src='/public/chartjs/utils.js'></script>
	
	@include('header.styles')
	
	</head>
<body>
	
	<div id="canvas-holder-2" style="width:30%; direction:ltr; margin-left:auto; margin-right:auto; display:table;">
   <canvas id="chart-area" width="250" height="250"/>
</div>
<script>
var doughnutData = {
    labels: [
        "DM orange"
    ],
    datasets: [
        {
            data: [43667],
            backgroundColor: [
                "#ec8316"
            ],
            hoverBackgroundColor: [
                "#ff8300"
            ]
        }]
};

jQuery(document).ready(function() {
    var ctx = document.getElementById("chart-area").getContext("2d");

    window.myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: doughnutData,
        options: {
            responsive: true,
            elements: {
                arc: {
                    borderColor: "#000000"
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
	
	
	
	<div id="canvas-holder-1" style="width:30%; direction:ltr; margin-left:auto; margin-right:auto; display:table;">
   <canvas id="chart-area2" width="250" height="250"/>
</div>
<script>
var doughnutData1 = {
    labels: [
        "orange"
    ],
    datasets: [
        {
            data: [10913],
            backgroundColor: [
                "#ec8316"
            ],
            hoverBackgroundColor: [
                "#ff8300"
            ]
        }]
};

jQuery(document).ready(function() {
var ctx1 = document.getElementById("chart-area2").getContext("2d");

    window.myDoughnutChart2 = new Chart(ctx1, {
        type: 'doughnut',
        data: doughnutData1,
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

	
	
	<div id="canvas-holder-2" style="width:30%; direction:ltr; margin-left:auto; margin-right:auto; display:table;">
   <canvas id="chart-area3" width="250" height="250"/>
</div>
<script>
var doughnutData3 = {
    labels: [
        "measure three"
    ],
    datasets: [
        {
            data: [10913],
            backgroundColor: [
                window.chartColors.green,
            ],
            hoverBackgroundColor: [
                "#ff8300"
            ]
        }]
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
