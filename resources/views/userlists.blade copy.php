<!doctype html>

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="https://www.facebook.com/2008/fbml">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
       
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Adstool - Danmarks forende">
        <meta name="author" content="Design4web">
        
        
    <title>Goshare - Danmarks forende</title>

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="public/css/normalize.css">
        <link rel="stylesheet" href="public/css/main.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:500" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Lora' rel='stylesheet'>

        

        <style>

    

        h2 {font-family: 'Lora';font-size: 18px; }
        p {font-family: 'Lora';font-size: 14px; color:#999; }
        body { margin-top:-20px; margin:0 !important; }
      
        
        #share_contents ul.context { width:100%; margin-left: auto; margin-right: auto; padding: 0; list-style-type: none; -webkit-padding-start: 0; }
        #share_contents ul.context li {float: left; padding: 10px; list-style: none; width:350px; padding-bottom: 15px; border-bottom: 1px solid #999; margin-bottom: 15px; margin:1vh;}
        #share_contents  #social { width: 500px; }
        #social ul li { float: left; width:243px; padding: 2px; }

	
		
		ul.context p { height:80px; }
        

        #mnu_header { width: 220px; float: left; background-color:lightblue ; padding:8px; padding-top: 50px; height: 95vh;  }
        #share_contents { width: 900px; float: left; padding-left: 10px; }


        #userslists ul {width:100%;  clear: both; list-style: none; border-bottom: 1px solid #fff}
        #userslists ul li { float: left; padding: 5px;  }
        #userslists ul li:first-child {width:200px;}


        #userslists ul li:nth-child(2) {width:150px; text-align: center;}
        #userslists ul li:nth-child(3) {width:90px; text-align: center;}
      
        #userslists ul li:nth-child(4) {width:90px; text-align: center;}
        #userslists ul li:nth-child(5) {width:60px; text-align: center;}
        #userslists ul li:nth-child(6) {width:60px; text-align: center;}

        #userslists { margin-bottom: 20px; }

		</style>


	<script src="/public/vendor/jquery/jquery.min.js"></script>
	<script src="http:/connect.facebook.net/en_US/all.js" type="text/javascript"></script>	
	
    @include('analytics')

    
    </head>
	<body ng-app="addsTool">
<div id="fb-root"></div>
       <div id="mnu_header">
      
		   <div id="logo"><img src="/public/img/gosharelogo.png" height="50" width="auto"></div>
           <div id="menus">

            
            <h3>Campaign Tool</h3>
            <ul>
            
            <li><button>Create Campaign</button></li>
            <li><button>Campaign lists</button></li>
            </ul>

            <h3>Products</h3>
            <ul>
            
            <li><button>Create Products</button></li>
            <li><button>Product lists</button></li>
            </ul>

            <h3>Users</h3>
            <ul>
            <li><a href="/admin/users">User-lists</a></li>
            </ul>


            </div>

            <button>Account Settings</button>
           <button>Logout</button>

        </div>


        <div id="share_contents">
       

			<div id="userslists">
            <h1>Userlists</h1>           
            <ul >

                <li><b>Name</b></li>
                <li><b>Email</b></li>
                <li><b>Address</b></li>
                <li><b>Country </b></li>

                 <li><b>action</b></li>
                <li><b>action</b></li>
            </ul>
          
                
            </div>

        @foreach($users as $user)
			<div id="userslists">
           
			<ul >
				<li>{{ $user->name }}  <span style="margin-left:20px; color:gray;"><i>{{ $user->action}} </i></span>  </li>

              
				<li>{{ $user->email }} </li>
				<li>{{ $user->adress }} </li>
				<li>{{ $user->country }} </li>
                 <li>   <a href="/admin/users/action/?act=suspend&i={{ $user->id }}">suspend</a></li>
                <li>    <a href="/admin/users/action/?act=delete&i={{ $user->id }}">delete</a></li>
			</ul>
          
			</div>

			  @endforeach

           

        </div>

        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        
        <script src="js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
        <script src="/public/js/plugins.js"></script>
        <script src="/public/js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
            window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
            ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>

  </body>
 
	
	
</html>
