<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome to Share it</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
      
       <meta property="og:title"         content="Go share" />
          <meta property="og:type"          content="website" />
			<meta property="og:description" content="Vil du og gerne have rabat, join goshare.dk og opnå nemt, sikkert og enkelt store rabatter!"/>
          <meta property="og:url"           content="http://goshare.design4web.dk/products" />
        <meta property="og:site_name"     content="Goshare"/>
	 <meta name="author" content="Design4web">
       
	
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="login/css/style.css">

      <style type="text/css">
      body { background:url('img/bg_login.jpg'); background-size:100%; }

      </style>

  
    @include('analytics')

</head>

<body>
  <div class="user">
    <header class="user__header">
        <img src="img/gosharelogo.png" width="190" height="auto" alt="" />
        <h1 class="user__title">Welcome to Goshare</h1>
    </header>
    
    <form action="/users/login" class="form" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form__group">
            <input type="text" name="username" placeholder="Username" class="form__input" />
        </div>
        
        
        <div class="form__group">
            <input type="password" name="password" placeholder="Password" class="form__input" />
        </div>
        
        <button class="btn" value="submit" type="submit">Login</button>
        
        <a href="/register"><button class="btn" type="button">New Account?</button></a>
        <button class="btn blue-btn" type="button"><a href="/forgotpassword">forgot password?</a></button>
    </form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="/login/js/index.js"></script>

</body>
</html>
