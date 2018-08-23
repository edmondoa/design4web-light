<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Register Form (Responsive)</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  
      <link rel="stylesheet" href="/public/register/css/style.css">

</head>

<body>

  <div class="confirm">
  <i class='close'>×</i>
  <h1><i class="fa fa-check-circle fa-3x"></i>Employee Created</h1>
</div>
<form action="#">
  <h1>
    Employee Registration
    <br>
    <i class="fa fa-camera-retro fa-lg"></i>
  </h1>
  
  <div class="float-label">
    <input type="text" name="f-name" id="f-name" />
    <label for="f-name">Name</label>
  </div>
  
  <div class="float-label">
    <input type="email" name="email" id="email" />
    <label for="email">Email</label>
  </div>
    
  
  
  <div class="float-label">
    <fa class="fa eye fa-eye-slash"></fa>
    <input type="password" name="pw" id="pw" />
    <label for="pw">Password</label>
  </div>
  
  <div class="float-label">
    <fa class="fa eye fa-eye-slash"></fa>
    <input type="password" name="re-pw" id="repw" />
    <label for="re-pw">Re Password</label>
  </div>
	
  <button class="btn" type="submit">Submit</button>
  <button class="btn" id="clear" type="reset" value="Reset">Reset</button>
</form>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

  

    <script  src="/public/register/js/index.js"></script>




</body>

</html>
