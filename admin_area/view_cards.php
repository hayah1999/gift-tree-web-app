<?php

session_start();
include("includes/db.php");
include("includes/header.php");
include("includes/main.php");
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_self')</script>";
}
else {
?>
<?php
include("includes/sidebar.php");
?>
<div class="content container ">
<div class="box3 ">
 <header class="d-flex justify-content-center">Products Table</header>
<table class="table table-bordered table-hover table-striped">
<!--==========table header=========-->
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Image</th>
<th>Category</th>
<th>Usability</th>
<th>Brand</th>
<th>Details</th>
<th> Delete</th>
</tr>
</thead>
<!--============== tbody Starts ===============-->
<tbody>
<?php
$i = 0;
$get_card = "select * from cards ";
$run_card = mysqli_query($con,$get_card);
while($row_cards = mysqli_fetch_array($run_card)){
  $card_id = $row_cards['id'];
  $card_title = $row_cards['name'];
  $card_desc = $row_cards['details'];
  $card_img1 = $row_cards['photo'];
  $card_cat = $row_cards['category'];
  $card_uses = $row_cards['usability'];
  $card_brand = $row_cards['brand'];
$i++;
?>
<!--=====table rows====-->
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $card_title; ?></td>
<td><img src="card_images/<?php echo $card_img1; ?>" width="60" height="60"></td>
<td><?php echo $card_cat; ?></td>
<td>
<?php echo $card_uses; ?>
</td>
<td><?php echo $card_brand; ?> </td>
<td><?php echo $card_desc; ?></td>
<td>
<div class="btn-group"><a class="btn btn-danger" href="delete.php?id=<?php echo $card_id; ?>">Delete</a></div></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<?php } ?>
<!-- JQYERY, POPPERS, JSS-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>