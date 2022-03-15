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
 <header class="d-flex justify-content-center">Delivery Table</header>
<table class="table table-bordered table-hover table-striped">
<!--==========table header=========-->
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Date</th>
<th>Address</th>
<th> Delete</th>
</tr>
</thead>
<!--============== tbody Starts ===============-->
<tbody>
<?php
$i = 0;
$get_delivery = "select * from delivery ";
$run_delivery = mysqli_query($con,$get_delivery);
while($row_delivery = mysqli_fetch_array($run_delivery)){
 $delivery_id = $row_delivery['id'];
 $delivery_name = $row_delivery['name'];
 $delivery_date = $row_delivery['date'];
 $delivery_address = $row_delivery['address'];
$i++;
?>
<!--=====table rows====-->
<tr>
<td><?php echo $i; ?></td>
<td><?php echo   $delivery_name; ?></td>
<td><?php echo $delivery_date; ?></td>
<td><?php echo $delivery_address; ?></td>
<td>
<div class="btn-group"><a class="btn btn-danger" href="delete.php?I_d=<?php echo   $delivery_id ; ?>">Delete</a></div></td>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<!-- JQYERY, POPPERS, JSS-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>


<?php } ?>
