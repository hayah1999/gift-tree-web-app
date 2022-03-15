<?php

session_start();
include("includes/db.php");
?>
<!DOCTYPE HTML>
<html>
<head>
        <meta charset="utf-8">
         <!--======logo in title bar=============-->
  <link href="card_images/logo PNG 2.png" rel="icon">
        <title>Admin Login</title>
        <meta content="width=device-width, initial-scale=1" name="viewport">
     <!-- Bootstrap 5 CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
     <!--- main css links----------------------->
     <link href="css/loginpage.css" rel="stylesheet">
     <!--- animation links----------------------->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    </head>
<body>
        <section >
            <div class="container">
            <div class="entry-img">
                <div class="text">
                <p class="centered"> Welcome Back ! </p>
                </div>
              </div>
             <form method="post" action="">
                 <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="admin_email">
                    <label for="floatingInput">E-mail</label>
                 </div>
                   <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password"  name="admin_pass">
                    <label for="floatingPassword">Password</label>
                   </div>
                   <div class="bttn">
                   <button type="submit" class="sign" name="login">
                   Sign In</button>
                </div>
             </form>
            </div>
        </section>
    </body>
</html>
<?php
if(isset($_POST['login'])){
$admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);
$admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);
if(empty($_POST['admin_email']) || empty($_POST['admin_pass'])) {
  echo "<script>alert('Email or Password is Empty')</script>";;
}
  else{
$get_admin = "select * from admin where email='$admin_email' AND password='$admin_pass'";
$run_admin = mysqli_query($con,$get_admin);
$count = mysqli_num_rows($run_admin);
if($count==1){
$_SESSION['admin_email']=$admin_email;
echo "<script>alert('You are Logged in into admin panel')</script>";
echo "<script>window.open('view_cards.php','_self')</script>";
}
else {
echo "<script>alert('Email or Password is Wrong')</script>";
}
  }
}
?>