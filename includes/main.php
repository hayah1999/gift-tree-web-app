<body >
<!--===================
           Header==========-->
           <nav class="navbar navbar-expand-lg navbar-light">
           <a href="index.php?page=1"  class="navbar-brand">
              <!-- Logo Image -->
              <img id="brando" src="images/logo PNG.png" width="45" alt="">
            </a>
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
                INNER JOIN cart ON cart_card.cart_id=cart.id where cart.user_id = '$uid'";
                $run_cart_card = mysqli_query($con,$select_cart_card);
                $count_cards = mysqli_num_rows($run_cart_card);
                echo $count_cards;
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

