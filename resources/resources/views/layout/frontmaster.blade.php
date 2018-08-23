<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Adstool - Danmarks forende">
    <meta name="author" content="Design4web">
	
	<meta property="og:url"           content="http://addtool.design4web.dk/product" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Adstool - Danmarks forende" />
	<meta property="og:description"   content="Advertising tool - Danmarks forende" />
	<meta property="og:image" content="">
	
    <title>Adstool - Danmarks forende</title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/3-col-portfolio.css" rel="stylesheet">
    <link href="/css/bootstrap-table.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.theme.css">
<!-- Custom stylesheet-->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">    
    <!-- Temporary navbar container fix -->
    <style>
	body{background: #eee;}
	.container{background: #fff; padding: 20px !important;;}
	.navbar-inverse .navbar-nav .nav-link,.navbar-inverse .navbar-nav .nav-link:hover,
	.navbar-inverse .navbar-nav .active > .nav-link, .navbar-inverse .navbar-nav .nav-link.active, .navbar-inverse .navbar-nav .nav-link.open, .navbar-inverse .navbar-nav .open > .nav-link{color: #000;}
    .navbar-toggler {
        z-index: 1;
    }
    .bg-inverse{background: none !important; color: #000 !important;padding: 0px }
	.navbar{padding: 1px 1rem;}
	.py-3{padding-top: 1px !important;}
	.card{border: none !important;}
	.card a img{border: 1px solid #ccc;}
	.row {
    margin-left: -8px;
    margin-right: -8px;
		}
    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    </style>

</head>

<body ng-app="addsTool">
<div id="fb-root"></div>
    <!-- Navigation -->
    @include('layout.frontnav')
    <!-- Page Content -->
    <div class="container">
		
					<div class="col-sm-12 text-center wow animated fadeInUp">
						<h2>ADSTOOL - DANMARKS FORENDE</h2>
						<div class="sub-heading">
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting <br>
						     industry. Lorem Ipsum has been the industry's standard dummy</p>
						</div>						
					</div>
				
        @yield('content') 
    </div>
    <!-- /.container -->

    <!-- Footer -->
    @include('layout.frontfooter')

    @section('html_footer')
    <!-- Bootstrap core JavaScript -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/tether/tether.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/vendor/bootbox.min.js"></script>
    <script src="/vendor/bootstrap-notify.min.js"></script>
     <script src="/js/bootstrap-table.js"></script>

    <!-- Angular -->
    <script src="/angular/angular.min.js"></script>
    <script src="/angular/angular-resource.js"></script>
    <script src="/angular/ui-bootstrap-tpls.js"></script>
    <script src="/angular/app.js"></script>
   
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="assets/js/jquery.js"></script>
    <!-- <script src="assets/js/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
	<script src="assets/js/smoothscroll.js"></script>
	<script src="assets/js/jquery.scrollTo.min.js"></script>
	<script src="assets/js/jquery.localScroll.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="assets/js/owl.carousel.js"></script>
    <script src="assets/js/jquery.flexslider-min.js"></script>
    <script src="assets/js/jquery.magnific-popup.js"></script>
    <script src="assets/js/jquery.ajaxchimp.min.js"></script>
	<script src="assets/js/jquery.nav.js"></script>
    <script src="assets/js/jquery.placeholder.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/script.js"></script>

   <script type="text/javascript">
    	$(function() {
				// Invoke the plugin
				$('input, textarea').placeholder();
			});
    </script>


   <script>
      function initialize() {
      	 // Create an array of styles.
	  var styles = [
	    {
	      stylers: [
	        { hue: "#0AABE1" },
	        { saturation: 0 }
	      ]
	    },
	    {
	      featureType: 'water',
	      stylers: [
	       { visibility: "on" },
	       { color: "#9a9efd" },
	       { weight: 2.2 },
	       { gamma: 2.54 }
	      ] 
	    },
	    {
	      featureType: "road",
	      elementType: "geometry",
	      stylers: [
	        { lightness: 100 },
	        { visibility: "simplified" }
	      ]
	    },{
	      featureType: "road",
	      elementType: "labels",
	      stylers: [
	        { visibility: "off" }
	      ]
	    }
	  ];

	  // Create a new StyledMapType object, passing it the array of styles,
	  // as well as the name to be displayed on the map type control.
	  var styledMap = new google.maps.StyledMapType(styles,
	    {name: "Styled Map"});

        var mapCanvas = document.getElementById('map');
        var denmark = new google.maps.LatLng(55.6798605, 12.3860469);
		var mapOptions = {
		   zoom: 13,
		   center: denmark,
		   mapTypeControlOptions: {
		   mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
		  },
		  scrollwheel: false,
		  disableDefaultUI: true
		};
        var map = new google.maps.Map(mapCanvas, mapOptions)

        //Associate the styled map with the MapTypeId and set it to display.
		  map.mapTypes.set('map_style', styledMap);
		  map.setMapTypeId('map_style');

        // To add the marker to the map, use the 'map' property
		  var image = 'img/marker.png';
		  var marker = new google.maps.Marker({
		      position: denmark,
		      map: map,
		      title:"Design4web Danmark",
		      icon: image
		  });
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    @show
</body>

</html>
