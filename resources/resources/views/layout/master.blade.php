<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="https://www.facebook.com/2008/fbml">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	@yield('og')
    <meta name="author" content="Design4web">
	
	<title>Adstool - Danmarks forende</title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/3-col-portfolio.css" rel="stylesheet">
    <link href="/css/bootstrap-table.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">    
    <!-- Temporary navbar container fix -->
    <style>
    .navbar-toggler {
        z-index: 1;
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
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=441207849567726";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script>

    var popupSize = {
        width: 780,
        height: 550
    };

    $(document).on('click', '.social-buttons > a', function(e){

        var
            verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
            horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

        var popup = window.open($(this).prop('href'), 'social',
            'width='+popupSize.width+',height='+popupSize.height+
            ',left='+verticalPos+',top='+horisontalPos+
            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            e.preventDefault();
        }

    });
</script>
<div id="fb-root"></div>
    <!-- Navigation -->
    @include('layout.nav')
    <!-- Page Content -->
    <div class="container">
        @yield('content') 
    </div>
    <!-- /.container -->

    <!-- Footer -->
    @include('layout.footer')

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
	<script src="http:/connect.facebook.net/en_US/all.js" type="text/javascript"></script>
	<script type="text/javascript"></script>
    @show

</body>

</html>
