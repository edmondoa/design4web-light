<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Goshare New Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

 <link rel="stylesheet" href="/public/login/css/style.css">

      <style>

        a:link { text-decoration: none;  }
      
        a:hover { text-decoration: none;  }

   body { background:url('/public/img/bg_login.jpg');  }
       
      </style>

 <script>
	 
			 function checkpass() {
	var pass_one = $("#password").val();
	var pass_two = $("#re-password").val();
	if (pass_one == pass_two) {
	} else {
	  alert("password mismatch!");
	  document.getElementById("password").value = "";
	  document.getElementById("re-password").value = "";
	}
}
	</script>
     

</head>

<body>
  <div class="user">
    <header class="user__header">
        <a href="/"><img src="/public/img/gosharelogo.png" width="190" height="auto" alt="" /></a>
		
        <h1 class="user__title" style="text-align:center;">Forgot your password?</h1>
    </header>
    
    <form action="{{ route('newpassword') }}" method="post" class="form">
       <div class="form__group">
		   <input id="email" name="email" type="hidden" value="<?=$_GET['email'];?>" />
            <input id="password" type="password" name="password" placeholder="password" max-length="8" class="form__input" required />
           <input id="re-password" type="password" name="pass_two"  placeholder="retype password" max-length="8" 
onblur="checkpass()"  class="form__input" required />
		    
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
