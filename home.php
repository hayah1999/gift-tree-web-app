<?php
session_start();
include("includes/db.php"); // connect to db.
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
<!--- main css links----------------------->
<link href="css/trial2.css" rel="stylesheet">
<!--- animation links----------------------->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    </head>
<body>
<!--===================
           Header==========-->
           <nav class="navbar fixed-top  navbar-expand-lg navbar-light">
            <a id="brando" class="navbar-brand" href="index.php">Gift Tree</a>
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
                $uid=$_SESSION['user_id'];
                $select_cart_card = "select *
                from cart_card
                INNER JOIN cart ON cart_card.cart_id=cart.id where cart.user_id = '$uid'"; //taking ids from cart_card table & cart table
                $run_cart_card = mysqli_query($con,$select_cart_card);
                $count_cards = mysqli_num_rows($run_cart_card);
                echo $count_cards;// to show the no. of items in cart
            }
            ?>Cart</a>
                  </li>
                  <li  class="nav-item">
                  <?php
if(isset($_SESSION['customer_user'])){
  $email = $_SESSION['customer_user'];
    echo "<a href='#' id='listhover' class='nav-link'>$email</a>";
}    
?> </li>
     
            <li class="nav-item"><?php
if(!isset($_SESSION['customer_user'])){
  echo '<a href="checkout.php" id="listhover" class="nav-link"><i id="icons" class="fas fa-user fa-lg"></i>Sign In</a>';
} 
  else
  { 

      echo '<a href="logout.php" id="listhover" class="nav-link">Log out</a>';
  }   
?> </li>
              </ul>
            </div>
          </nav>
       
<!--------====================scroll button==========-->
<button onclick='window.location.href = "faq.php"' id="myBtn" title="Go to top"><i class="fas fa-comment"></i></button>
<script type="text/javascript">
  //Get the button
  var mybutton = document.getElementById("myBtn");
  
  // When the user scrolls down 280px from the top of the document, show the button
  window.onscroll = function() {scrollFunction()};
  
  function scrollFunction() {
    if (document.body.scrollTop >280 || document.documentElement.scrollTop > 280) {
      mybutton.style.display = "block";
    } else {
      mybutton.style.display = "none";
    }
  }
  
  </script>

<!--=================
  Hero Section=====================-->
<section id="herosec" class="col-sm-12 col-lg-12">
 
  <div class="heroitems col-sm-12 col-lg-12">
    <h1 style="font-size:50px">Gift Tree</h1>
    <p>Love them, Gift them.</p>
    <a href="faq.php" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
    </div>

  
</section>
<!--==========================
      provided Services Section
    ============================-->
    <section id="provided-services">
        <header class="headertitle">
          <h2>WHAT WE DO</h2>
        <hr>
        </header>
  <!--=====
    ================First feature-->
<section id="services" class="container">
<div class="row">
<article class="col-lg-7 col-md-7 col-sm-12 d-flex flex-column justify-content-center">
  <h4>GIFT CARDS</h4>
  <p>Worried that your friend might not like your gift or maybe you don’t know what he/she need right now or even you in a different continent. If yes, then you need to try our Gift cards, browse through the brands, choose the brand that your friend likes, charge it with the amount needed and send it to him.</p>
  <a href="gift_cards.php" class="bttn-get-started animate__animated animate__fadeInUp">Go Explore!</a>
</article>
<img class="col-lg-5 col-md-5 col-sm-12 order-first" src="images/First PNG.png">
</div>
</section>

<!---===================
  ====================second feature-->
<section id="services" class="container">
  <div class="row">
  <img class="col-lg-5 col-md-5 col-sm-12 order-last" src="images/secound PNG.png ">
  <article class="col-lg-7 col-md-7 col-sm-12 d-flex flex-column justify-content-center">
    <h4>CEREMONIAL  CARDS</h4>
    <p>Renew our old habits with a modern touch and show how your friend that you remember them by sending a ceremonial card celebrating the special times, the cards are digital sent through email and there is no hustle at all.</p>
    <a href="cermonial_cards.php" class="bttn-get-started animate__animated animate__fadeInUp">Go Explore!</a>
  </article>
 
  </div>
  </section>
</section>
<!--====================
 =================== Advertisment section====-->
 <div class="container">
  <div class="adv">
  <h3> Advertisment</h3>
  </div>
  </div>

  <!--==========================
      Features Services Section
    ============================-->
    <section id="feattured-services">
      <header class="headertitle">
        <h2>Our Features</h2>
       <hr>
      </header>
      <section id="features" class="container">
        <div class="row">
              <div class="col-sm img-container">
                  <img  src="images/no contact.svg " width="100px" height="100px" alt="">
                  <p id="icona">Contactless</p>
              </div>
              <div class="col-sm img-container ">
                <img  src="images/save.svg" width="100px" height="100px" alt="">
                 <p id="icona">Eco-Friendly</p>
              </div>
              <div class="col-sm img-container">
                <img  src="images/virtual.svg" width="100px" height="100px"alt=""><br>
                <p id="icona">Digitalized</p>
              </div>
       </div>
      </section>
      </section>
     <!--=============
      ==============last section=====================-->
      <section class="container values">
        <header class="headertitle">
          <h2>Our values</h2>
         <hr>
        </header>
        <div class="row">
          <div class="col-lg-6">
            <div class="box">
              <img src="images/values-1.png" class="img-fluid" alt="">
              <h3>Our Vision</h3>
              <p>We want a better eco-friendly environment in our country by decreasing paper and plastic waste by depending more on online payment and shopping while maintaining our lifestyle. Keep our old cultural habits with the technological revolution by updating them too to keep up with our modern days.</p>
            </div>
          </div>
          <div class="col-lg-6 ">
            <div class="box">
              <img src="images/values-2.png" class="img-fluid" alt="">
              <h3>Our Mission</h3>
              <p>Our website is made to digitalize the whole gift shopping experience for both the sender and the receiver to avoid and decrease as much waste as possible as there will be no printed papers sent for both of them. Enable each person to have a digital ceremonial card to remind him of a special occasion .</p>
            </div>
          </div>
        </div>   
      </section>
<!--====================
 =================== Advertisment section====-->
<div class="container">
<div class="adv">
<h3> Advertisment</h3>
</div>
</div>
<!--====================
 =================== FOOTER====-->
 <?php
include("includes/footer.php");
?>
<!-- JQYERY, POPPERS, JSS-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>