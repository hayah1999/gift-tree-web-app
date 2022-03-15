<?php
session_start();
include("includes/db.php");
?>
<?php
$id = $_GET['id']; // get the id of the card to delete it from the cart.
$del_cart_card = "delete FROM cart_card where card_id = '$id'";
$run_del = mysqli_query($con,$del_cart_card);
header("Refresh:0; url=cart.php");
  ?>