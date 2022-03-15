<?php
session_start();
include("includes/db.php");
?>

<?php
if(!isset($_SESSION['customer_user'])){ // if the user not loged in. 
include("customer_login.php"); // take him to the log in page.
}else{
include("placeorder.php"); // else then to the palce order page and that happens when user click on proceed to pay that happen to be in cart page.
}
?>

