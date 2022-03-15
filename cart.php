<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--======logo in title bar=============-->
  <link href="images/logo PNG 2.png" rel="icon">
    <title>shopping cart Page</title>
    <!--- main css links----------------------->
    <link href="css/trial2.css" rel="stylesheet">
    <link rel="stylesheet" href="css/shopping cart.css">
<!--Bootstrap 4 css links------------------>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<?php
session_start();
include("includes/db.php"); //connect to the db.
include("includes/main.php"); // call the nav bar.
if(!isset($_SESSION['user_id'])){ // if the user not loged in can't open the cart and is directed to log in page.
  echo "<script>window.open('checkout.php','_self')</script>";} // the way to direct the user to another page.
  ?>
<!--===================BREADCRUMBS Bar============-->
<nav aria-label="breadcrumb"  id="crumbs">
  <ol class="breadcrumb"id="breadcrumb">
    <span class="headsup mr-auto">Your Cart</span>
    <li class="breadcrumb-item  ml-auto"><a href="home.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cart</li>
  </ol>
</nav>
<div class="container">
<!-- table Starts -->
<table class="table" >
<tr  style="background-color:#8FD8D2;">
<td colspan=4>
<i class="fas fa-gift  fa-lg"></i> shopping cart
</td>
</tr>
<!-- tbody Starts -->
<tbody>
<?php 
  $total=0;
  $uid=$_SESSION['user_id'];
  $select_cart = "select * from cart where user_id='$uid' ";
  $run_cart = mysqli_query($con,$select_cart);
  $cart = mysqli_fetch_array($run_cart);
  $cid = $cart['id'];
  $select_cart_card = "select * from cart_card where cart_id='$cid' ";
  $run_cart_card = mysqli_query($con,$select_cart_card);
  while($cart_card = mysqli_fetch_array($run_cart_card)){
    echo '<tr style="background-color:#FEDCD2">';
    $total += $cart_card['price'];
    $id=$cart_card['card_id'];
    $get_cards = "select * from cards where id='$id'";
    $run_cards = mysqli_query($con,$get_cards);
  $check_cards = mysqli_num_rows($run_cards);
  if($check_cards == 1){ // if the function check_cards returned with something in it.
  $row_cards = mysqli_fetch_array($run_cards); // this will be excuted where it get that card data that is stored in run_cards.
  echo '<td>';
  $img=$row_cards['photo'];
  echo "<img  src='admin_area/card_images/$img' style='width:150px' >"; // the image retrieved.
  echo '</td>';
  echo '<td>';
  echo $row_cards['name']; // the name retrieved.
  echo '</td>';
  echo '<td>';
  echo $cart_card['price'] .'EGP'; // the price retrieved
  echo '</td>';
  echo '<td>';
  echo "<form method='post' action='delete_item.php?id=$id'>";
  echo '  <button type="submit" name="login" class="btn btn-outline-danger btn-xs"><i id="icons"class="fa fa-trash" aria-hidden="true"></i></button>  ';// delete button.
  echo '</form>';
  echo '</td>';}
  echo '</tr>'; }
  echo '<tr style="background-color:#FEDCD2">';
  echo '<td colspan=3 style="font-weight:bold">';
  echo 'Total Price:'.$total; // show the final price.
  echo '</td>';
  echo '<td>';
  echo '<a href="checkout.php"><button type="button" class="btn btn-primary" style="background-color:#4ac0b6" >Proceed to pay</button></a>'; // proceed to pay button.
  echo '</td>';
  echo '</tr>';
  ?>
</table>
</div>
<?php include("includes/footer.php");?>
<!-- JQYERY, POPPERS, JSS-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
    </html>