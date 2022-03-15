<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("includes/main.php");

?>
<?php
$price=0;
$entertain=False;
$card_id = $_GET['id'];
$get_product = "select * from cards where id='$card_id'";
$run_product = mysqli_query($con,$get_product);
$check_product = mysqli_num_rows($run_product);
if($check_product == 0){ // if there is no product found direct to home page.
echo "<script> window.open('home.php','_self') </script>";
}
else{ // othewise collect all attributes in that row.
$row_cards = mysqli_fetch_array($run_product);
$card_id = $row_cards['id'];
$card_title = $row_cards['name'];
$card_desc = $row_cards['details'];
$card_img1 = $row_cards['photo'];
$card_cat = $row_cards['category'];
$card_uses = $row_cards['usability'];
$card_brand = $row_cards['brand'];
$card_price = $row_cards['price'];
?>
<!--========
============BREAD CRUMB=======
===========-->
<nav aria-label='breadcrumb'  id='crumbs'>
  <ol class='breadcrumb'id='breadcrumb'>
  <span class="headsup mr-auto">Our Cards desscription</span>
    <li class='breadcrumb-item  ml-auto'><a href='home.php'>Home</a></li>
    <li class='breadcrumb-item active' aria-current='page'>Card Details</li>
  </ol>
</nav>


  <!--=================== Description section=================-->
  <section class="container-fluid" id="desc">
      <div class="row">

       
          <!--====================
           =================== Advertisment section====-->
           <div class="col-lg-2">
           <div class="container">
            <div class="adv "style="height:650px;">
            <h3> Advertisment</h3>
            </div>
            </div>
          
          </div>
          <!--=================== image part===============-->
          <div class="col-lg-5 picture">
              <img class="img-fluid" src='admin_area/card_images/<?php echo $card_img1 ?>' alt="Card">
          </div>
       <!--=================== Information Part=================-->

        <?php 
if($_GET['type']==1) { // if the type selected is gift cards execute the following.
  ?>

<div class="col-lg-4 description">
               <div class="prod-desc">
                   <h3><?php echo $card_title ?> Card</h3>
                   <ul>
                   <li><strong>Category:</strong> <?php echo $card_cat ?></li>
                   <li><strong>Product usability: </strong><?php echo $card_uses ?></li>
                   <li><strong>Brand:</strong> <a href='$card_brand'><?php echo $card_brand ?></a></li>
                 </ul>
             </div>
             <div class="prod-desc">
                <h3>Description</h3>
                <p><?php echo $card_desc ?></p>
               
                <!--==============Price Section=========================-->

              <form action='' method='post' class='form-horizontal' ><!-- form-horizontal Starts -->
<?php
if($card_cat=='Entertainment'){
  $price=$card_price*1.11;
  $entertain=True;
  ?>
        <!--==============Price Section=========================-->
           <section id="prices">
                    <h3> Price</h3>
                    <p><?php echo $card_price ?> EGP per card</p>
           </section>
  <?php
}
else{
?>
 <section id="prices">
<div class='input-group mb-3'>
                  <div class='input-group-prepend'>
                    <label class='input-group-text' for='inputGroupSelect01'>Options</label>
                  </div>
                  <select class='custom-select' id='price1' name='price1'>

      <option value='100'>100 EGP</option>
      <option value='200'>200 EGP</option>
      <option value='300'>300 EGP</option>
      <option value='400'>400 EGP</option>
      <option value='500'>500 EGP</option>
      <option value='600'>600 EGP</option>
      <option value='700'>700 EGP</option>
      <option value='800'>800 EGP</option>
      <option value='900'>900 EGP</option>
      <option value='1000'>1000 EGP</option>
        <option value='1100'>1100 EGP</option>
        <option value='1200'>1200 EGP</option>
        <option value='1300'>1300 EGP</option>
        <option value='1400'>1400 EGP</option>
        <option value='1500'>1500 EGP</option>
        <option value='1600'>1600 EGP</option>
        <option value='1700'>1700 EGP</option>
        <option value='1800'>1800 EGP</option>
        <option value='1900'>1900 EGP</option>
        <option value='2000'>2000 EGP</option>
                    
                  </select>
                </div>
                <?php
}
?>


        <!-----==================Button==========-->
        <div class="cartadding">
        <button  type='submit' name='add_cart'>Add to cart</button>
    </div>
</form><!-- form-horizontal Ends -->
</div>
       </div>
</div>
       <?php
}
else{ // if the type selected is ceremonial cards execute the following.
  ?>
           <!--=================== Information Part=================-->
           <div class="col-lg-4 description">         
               <div class="prod-desc">
                <h3><?php echo $card_title ?> Card</h3>
                <p> <?php echo $card_desc ?> </p>
                 <!--==============Price Section=========================-->
                 <section id="prices">
                    <h3> Price</h3>
                    <p>10 EGP per card</p>
                 </section>
                 <form action='' method='post' class='form-horizontal' >
        <div class="cartadding">
        <button type='submit' name='add_cart' >Add to cart</button>
    </div>
    </form>
      </div>
</div>
      <?php
}
?>
       </section>
<?php
if(isset($_POST['add_cart'])){ // upon clicking on the button add to cart.
  if(!isset($_SESSION['user_id'])){ // if the user not loged in will be directed to log in page.
    echo "<script>alert('You must log in first')</script>";
  }
  else{ // otherwise the following get executed.
  $user_id = $_SESSION['user_id'];
  $get_cart = "select * from cart where user_id = '$user_id' "; // get all from cart that belongs to that user id.
  $run_cart = mysqli_query($con,$get_cart); 
  $cart_id = mysqli_fetch_array($run_cart);
  $cid = $cart_id['id'];
  $check_cart = mysqli_num_rows($run_cart);
  if ($check_cart == 0) { // if cart is empty.
    $insert_cart = "insert into cart (user_id) values ('$user_id')"; // add the user id into it.
    $run_insert_cart = mysqli_query($con,$insert_cart); // connecting and excuting the insert function into db.
    $get_last_cart = "select * FROM cart ORDER BY id DESC LIMIT 1"; // here get all feom the last cart inserted.
  $run_get_cart = mysqli_query($con,$get_last_cart);
  $cart_id1 = mysqli_fetch_array($run_get_cart); // fitch the card data that is in the selected cart.
  $cid = $cart_id1['id'];
}
$flag=true; // if item haven't been added before then execute the following.
$get_cart_card = "select * from cart_card where card_id = '$card_id' and cart_id = '$cid' "; //get from cart_card the id of the product and the id of the cart.
$run_cart_card = mysqli_query($con,$get_cart_card);
$check_cart_card = mysqli_num_rows($run_cart_card); // here where it checks whether the item exists or not.
  if($check_cart_card > 0){ //if yes then execute the following.
    $flag=false;
    echo "<script>alert('This item exist already in the cart')</script>";

  }
else{
  if($entertain==False){ // if the card selected not entertainig category then execute the following.
  $price=10; // the price of ceremonial cards.
  }
  if(isset($_POST['price1'])){ // the calue chosen.
  $price = $_POST['price1']*1.11; // multiply the price with our percentage.
  }
  $insert_cart_card = "insert into cart_card (cart_id,card_id,price) values ('$cid','$card_id','$price')"; // then insert collected data into the cart_card table.
  $run_cart_card = mysqli_query($con,$insert_cart_card) or die(mysqli_error($con)); // insert after connection other wise abort due to error.
  // echo $run_cart_card;
  echo "<script>alert('added to the cart successfully')</script>";
}
}
}
?>
<!--=============footer===================-->
<?php

include("includes/footer.php");

?>

<!-- JQYERY, POPPERS, JSS-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<?php } ?>