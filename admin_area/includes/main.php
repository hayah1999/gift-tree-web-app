<body>
<nav class="navbar fixed-top  navbar-expand-lg navbar-light">
            <a href=""  class="navbar-brand">
                <!-- Logo Image -->
                <img id="brando" src="card_images/111.png" width="45" alt="">
              </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
              <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                  <li  class="nav-item">
                  <?php
if(!isset($_SESSION['admin_email'])){
  echo '<a href="checkout.php" class="login__link"><span class="fas fa-user fa-lg"></span> Sign In</a>';
} 
  else
  { 
      $email = $_SESSION['admin_email'];
      echo "<a href='#' id='listhover' class='nav-link'><i id='icons' class='fas fa-user fa-lg'></i>$email</a>";
  }   
?> </li>                 
                <li class="nav-item">
                <?php
if(!isset($_SESSION['admin_email'])){
  echo '<a href="checkout.php" class="login__link"><span class="fas fa-user fa-lg"></span> Sign In</a>';
} 
  else
  { 
      echo '<a href="logout.php" id="listhover" class="nav-link" >Log out</a>';
  }   
?>
                  </li>
              </ul>
            </div>
          </nav>
