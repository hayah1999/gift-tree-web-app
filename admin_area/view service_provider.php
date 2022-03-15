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
 <header class="d-flex justify-content-center">Service Provider Table</header>
<table class="table table-bordered table-hover table-striped">
<!--==========table header=========-->
<thead>
<tr>
<th>ID</th>
<th>Email</th>
<th>Name</th>
<th>Type</th>
<th> Delete</th>
</tr>
</thead>
<!--============== tbody Starts ===============-->
<tbody>
<?php
$i = 0;
$get_provider = "select * from service_provider ";
$run_provider = mysqli_query($con,$get_provider);
while($row_provider = mysqli_fetch_array($run_provider)){
    $provider_id = $row_provider['id'];
    $provider_email = $row_provider['email'];
    $provider_name = $row_provider['name'];
    $provider_type = $row_provider['type'];
$i++;
?>
<!--=====table rows====-->
<tr>
<td><?php echo $i; ?></td>
<td><?php echo  $provider_email; ?></td>
<td><?php echo $provider_name; ?></td>
<td><?php echo  $provider_type; ?></td>
<td>
<div class="btn-group">
<a class="btn btn-danger" href="delete.php?I_D=<?php echo  $provider_id; ?>">Delete</a></div>
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