<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
<link rel='stylesheet' href='font-awesome.min.css'>
<link rel="stylesheet" href="./style.css">
</head>
<body>
<!-- partial:index.partial.html -->

<div class="container">
  <form action="sign-up.php" method="post">
    <div class="row">
      <h4>Account</h4>
      <div class="input-group input-group-icon">
        <input name='fname' type="text" placeholder="First Name"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
            <div class="input-group input-group-icon">
        <input name='lname' type="text" placeholder="Last Name"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input name='phone' type="text" placeholder="+91"/>
        <div class="input-icon"><i class="fa fa-phone"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input name='email' type="email" placeholder="Email Adress"/>
      <div class="input-icon"><i class="fa fa-envelope"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input name='password' type="password" placeholder="Password"/>
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input name='address' type="text" placeholder="Address"/>
      <div class="input-icon"><i class="fa fa-home"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input name='eaddress' type="text" placeholder="eaddress"/>
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input name='pvtkey' type="password" placeholder="pvtkey"/>
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
    </div>
    <input type="submit" value="Submit">
  </form>
</div>

<!-- partial -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="./script.js"></script>

</body>
</html>