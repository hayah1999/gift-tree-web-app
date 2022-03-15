<?php
session_start();
include("includes/db.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!--======logo in title bar=============-->
           <link href="images/logo PNG 2.png" rel="icon">
        <title>Gift Tree</title>
        <meta content="width=device-width, initial-scale=1" name="viewport">   
<!--BootStrap 4 css links------------------>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
<!--- main css links----------------------->
<link href="css/trial2.css" rel="stylesheet">
<link href="css/businesspage.css" rel="stylesheet">

<!--- animation links----------------------->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    </head>
<body>
<!--===================  Header==========-->
           <nav class="navbar fixed-top  navbar-expand-lg navbar-light">
            <a id="brando" class="navbar-brand" href="index.php?page=1">Gift Tree</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
              <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li  class="nav-item active">
                  <a id="listhover" class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a id="listhover" class="nav-link" href="gift_cards.php">Gift Cards</a>
                </li>
                <li class="nav-item">
                    <a id="listhover" class="nav-link" href="cermonial_cards.php">Ceremonial Cards</a>
                  </li>  
                  <li class="nav-item">
                    <a id="listhover" class="nav-link" href="business.php">Business</a>
                  </li>
                  <li  class="nav-item">
                    <a id="listhover" class="nav-link" href="contact.php">Contact Us</a>
                  </li>
                  <li  class="nav-item">
                    <a id="listhover" class="nav-link" href="cart.php"><i id="icons" class="fas fa-gift  fa-lg"></i>
                    <?php
            if(isset($_SESSION['user_id'])){
                $uid=$_SESSION['user_id'];// getting user id and save it in that variable.
                $select_cart_card = "select *
                from cart_card
                INNER JOIN cart ON cart_card.cart_id=cart.id where cart.user_id = '$uid'"; //taking ids from cart_card table & cart table
                $run_cart_card = mysqli_query($con,$select_cart_card);//connect the db and do the selecting function from db.
                $count_cards = mysqli_num_rows($run_cart_card);
                echo $count_cards; } // to show the no. of items in cart
            ?>Cart</a>
                  </li>
                  <li  class="nav-item">
                  <?php
if(isset($_SESSION['customer_user'])){
   $username = $_SESSION['customer_user'];
    echo "<a href='#' id='listhover' class='nav-link'>$username</a>";}    // if loged in show the user name.
?> </li>
            <li class="nav-item"><?php
if(!isset($_SESSION['customer_user'])){
  echo '<a href="checkout.php" id="listhover" class="nav-link"><i id="icons" class="fas fa-user fa-lg"></i>Sign In</a>';} // not loged in show sign in link.
  else
  {   echo '<a href="logout.php" id="listhover" class="nav-link">Log out</a>';} //if loged in show the log out link.  
?> </li>
              </ul>
            </div>
          </nav>
<!--=================Hero Section=====================-->
<section id="herosec" class="col-sm-12 col-lg-12">
  <div class="heroitems col-sm-12 col-lg-12">
    <h1 style="font-size:50px">Gift Tree</h1>
    <p>Love them, Gift them.</p>
    <a href="faq.php" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
    </div>
  </div>
</section>
<!-- ======= first box Section =====-->
<section class="container" id="box1">
<div class="row">
<article class="col-lg-6 d-flex flex-column justify-content-center">
  <h1>Looking to enhance your employee-organization relationship in a simple easy way.</h1>
</article>
<div class="col-lg-6 " id="theimage">
  <img src="images/hero-img.png" class="img-fluid">
</div>
</div>
</section>
<!-- ======= Second box Section =====-->
<section class="container" id="box1">
  <div class="row">
  <article class="col-lg-6">
    <h4>We can help you with that, drop the details here and our HR team will reach you as soon as possible </h4>
    <!--========form start==========-->
    <form method="post" name='business' onSubmit="return formValidation();">
      <div class="form-floating mb-3">
         <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
         <label for="floatingInput">Email address</label>
      </div>
       <div class="form-floating" id="pass">
         <input type="text" class="form-control" id="floatingInput" placeholder="text" name="type">
         <label for="floatingPassword">Business Type</label>
        </div>
        <div class="form-floating">
          <textarea class="form-control" placeholder="Leave a comment here" name="details" id="floatingTextarea2" style="height: 100px"></textarea>
          <label for="floatingTextarea2">Detailed describtion of the invitation</label>
        </div>
        <div class="bttn">
          <button type="submit" name="submit" class="submit">Submit</button>
          </div>
        </form>
  </article>
  <div class="col-lg-6 order-first" id="theimage">
    <img src="images/features-3.png" class="img-fluid">
  </div>
  </div>
  </section>
<!--==================================== FOOTER====-->
 <?php
include("includes/footer.php");
?>
<script>
    function formValidation() {
        var email = document.forms["business"]["email"];
        var type = document.forms["business"]["type"];
        var details = document.forms["business"]["details"];
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; //regular exepretion 
        if(!email.value.match(mailformat))
        {
          alert("You have entered an invalid email address!");
        email.focus();
        return false;}
        if (type.value == "") {
            window.alert("Please enter a valid type.");
            type.focus();
            return false;}
        if (details.value == "") {
            window.alert("Please enter a valid details.");
            details.focus();
            return false;}
        return true;}
</script>
<?php
if(isset($_POST['submit'])){
  $email=mysqli_real_escape_string($con,$_POST['email']);
  $type=mysqli_real_escape_string($con,$_POST['type']);
  $details=mysqli_real_escape_string($con,$_POST['details']);
$sql="INSERT INTO business(email,type,details) Values('$email','$type','$details')"; // insert the data into the db collected from the form.
mysqli_query($con,$sql); 
echo "<script>alert('Your Message Send Successfully')</script>";}?>
<!-- JQYERY, POPPERS, JSS-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>