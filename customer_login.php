<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!--======logo in title bar=============-->
   <link href="images/logo PNG 2.png" rel="icon">
        <title>LOG IN </title>
        <meta content="width=device-width, initial-scale=1" name="viewport">
     <!-- Bootstrap 5 CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
     <!--- main css links----------------------->
     <link href="css/loginpage.css" rel="stylesheet">
     <!--- animation links----------------------->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    </head>
    <body>
        <section>
            <div class="container">
            <div class="entry-img">
                <div class="text">
                <p class="centered"> Welcome Back ! </p>
                </div>
              </div>
             <form method="post" action="checkout.php" class="mx-4">
                 <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="c_user">
                    <label for="floatingInput">Username</label>
                 </div>
                  <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="c_pass">
                    <label for="floatingPassword">Password</label>
                   </div>
                   <div class="bttn">
                   <button type="submit" class="sign" name="login">Sign In</button>
                   <p>You ain't signed up yet?<a href="customer_register.php"> Click here to join us!</a></p>
                </div>
             </form>
            </div>
        </section>
    </body>
    <?php
if(isset($_POST['login'])){
$customer_user = $_POST['c_user'];
$customer_pass = $_POST['c_pass'];
$select_customer = "select * from customers where username='$customer_user' AND password='$customer_pass'";
$run_customer = mysqli_query($con,$select_customer);
$user_id = mysqli_fetch_array($run_customer);
$check_customer = mysqli_num_rows($run_customer);
if($check_customer==0){
echo "<script>alert('password or username is wrong')</script>";
exit();}
$_SESSION['customer_user']=$customer_user;
$_SESSION['user_id']=$user_id['id'];
echo "<script>window.open('home.php','_self')</script>";}?>
</html>