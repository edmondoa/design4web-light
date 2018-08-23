<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome to Goshare </title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

 <link rel="stylesheet" href="/public/login/css/style.css">

      <style>

        a:link { text-decoration: none;  }
      
        a:hover { text-decoration: none;  }

   body { background:url('/public/img/bg_login.jpg');  }
       
      </style>

 
     

</head>

<body>
  <div class="user">
    <header class="user__header">
        <a href="/"><img src="public/img/gosharelogo.png" width="190" height="auto" alt="" /></a>
        <h1 class="user__title">Forgot your password?</h1>
    </header>
    
    <form action="{{ route('sendmail') }}" method="post" class="form">
       <div class="form__group">
            <input type="email" name="mail" placeholder="bill@hotmail.com" class="form__input" required />
		    <input type="hidden" name="title" value="this is a title" />
        </div>
        
        <button class="btn" type="submit">Submit</button>
		{{ csrf_field() }}
      <div class="form__group" style="text-align: center;padding-top:20px; margin-bottom:20px;">
        <a href="/register">Create Account?</a> or <a href="/login">Sign in</a>
        </div>

    </form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="public/login/js/index.js"></script>

</body>
</html>
