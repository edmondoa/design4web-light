<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Goshare Account Setting</title>
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
        <a href="/"><img src="/public/img/gosharelogo.png" width="190" height="auto" alt="" /></a>
        <h1 class="user__title">Replace Password?</h1>
    </header>
    
    <form action="{{ route('updatepasswordnow') }}" method="post" class="form">
       <div class="form__group">
		    <input type="hidden" name="id" value="{{ $users->id }}" />
		   <label>
			   Old Password:
		    <input type="password" name="old_pass" class="form__input" required />
		   </label>
		   <label>
			   New Password:
            <input type="password" name="password" class="form__input" required />
		   </label>
		   <label>
			   Re type Password:
            <input type="password" name="pass_two" class="form__input" required />
		   </label>
		   
        </div>
        
        <button class="btn" type="submit">Submit</button>
		{{ csrf_field() }}
      <div class="form__group" style="text-align: center;padding-top:20px; margin-bottom:20px;">
       
        </div>

    </form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="public/login/js/index.js"></script>

</body>
</html>
