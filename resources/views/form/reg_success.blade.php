<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Go Share</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
    <meta property="og:title"         content="Go share" />
          <meta property="og:type"          content="website" />
			<meta property="og:description" content="Vil du og gerne have rabat, join goshare.dk og opnå nemt, sikkert og enkelt store rabatter!"/>
          <meta property="og:url"           content="http://goshare.design4web.dk" />
        <meta property="og:site_name"     content="Goshare"/>
	 <meta name="author" content="Design4web">
	
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="/public/login/css/style.css">


         <link rel="stylesheet" href="/public/css/globalstyle.css">

      <style type="text/css">
          
          body { background:url('/public/img/bg_login.jpg');  }
		
		  .col-A {
		  	float:left;
			width:40%;
			padding-right:40px;
			  margin-top:20px;
		  }
		  
		  .col-C {
		  	float:left;
			width:10%;
			padding-right:10px;
			  margin-left:20px;
		  }
		  
		  .btn-login {
			  font-size:1pt;
		  }
		  
		  .opret {
		  	background-color:#98cd67;
			border:0px;
			border-radius:9px;
			 padding:6px;
			 margin-left:262px;
			  width:150px;
			  
		  }
         
		  .form__input {
		 	padding:5px !important;
			  padding-left:0px !important;
		  }
		  
		  .user {
		  	padding-top:10px !important; 
		  }
		  
		
		  @media screen and (max-width : 800px){


				.opret {
					margin-left:0px;
				}

				.col-A {
					float:none;
					width:100%;

				}

		  }

      </style> 

       @include('analytics')
</head>


<body>
  <div class="user" style="max-width:640px !important;">
    <header class="user__header">
         <a href="#"><img src="/public/img/gosharelogo.png" width="190" height="auto" alt="" /></a>
       
    </header>
	  <div style="font-family:verdana; font-size:20px;margin-bottom:20px;margin-top:12px;">Velkommen to Goshare</div>
	  <p style="width:99%;line-height:15pt;">
	  Registration Success. Activation will be send to your email. Click here to <a href="/login"><strong>Login</strong></a>
	  </p>
	 
	</div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="/public/login/js/index.js"></script>

</body>
</html>
