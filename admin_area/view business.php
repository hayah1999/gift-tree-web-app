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
 <header class="d-flex justify-content-center">Business Table</header>
<table class="table table-bordered table-hover table-striped">
<!--==========table header=========-->
<thead>
<tr>
<th>ID</th>
<th>Email</th>
<th>Type</th>
<th> Detalis</th>
<th> Delete</th>
</tr>
</thead>
<!--========== tbody Starts=========== -->
<tbody>
<?php
$i = 0;
$get_business = "select * from business";
$run_business = mysqli_query($con,$get_business);
while($row_business = mysqli_fetch_array($run_business)){
$id = $row_business['id'];
$email = $row_business['email'];
$type = $row_business['type'];
$details = $row_business['details'];
$i++;
?>
<!--=====table rows====-->
<tr>
<td> <?php echo $id; ?> </td>
<td> <?php echo $email; ?> </td>
<td> <?php echo $type; ?> </td>
<td> <?php echo $details; ?> </td>
<td>
<div class="btn-group">
         <a class="btn btn-danger" href="delete.php?Id_b=<?php echo $id; ?>">Delete</a>
              </div>
</td>
</tr>
<?php } ?>
</tbody><!-- tbody Ends -->
</table><!-- table table-bordered table-hover table-striped Ends -->
</div><!-- table-responsive Ends -->
</div><!-- 2 row Ends -->
<?php } ?>