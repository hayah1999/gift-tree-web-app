<?php
session_start();

include("includes/db.php"); // connect to db.
include("includes/header.php"); //call head tag.
include("includes/main.php"); // call nav bar.
if(!isset($_SESSION['admin_email'])){ // if the admin isn't loged in, redirect him to login page.
echo "<script>window.open('login.php','_self')</script>";
}
else {
?>
<?php
include("includes/sidebar.php"); // call side nav
?>
<div class="content container ">
<div class="box3 ">
 <header class="d-flex justify-content-center">Customer Table</header>
<table class="table table-bordered table-hover table-striped">
<!--==========table header=========-->
<thead>
<tr>
<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Phone</th>
<th>Address</th>
<th>Email</th>
<th> Delete</th>
</tr>
</thead>
<!--============== tbody Starts ===============-->
<tbody>
<?php
$i = 0; // a variable to reserve storage.
$get_customer = "select * from customers "; // get all rows from customer table.
$run_customer = mysqli_query($con,$get_customer); // connect to the db and execute the select function.
while($row_cards = mysqli_fetch_array($run_customer)){ // after fetching the data execute the while loop, why use while loop as it's an infinite loop and we can have any no. of customer so it is the suitable loop for us.
    $customer_id = $row_cards['id'];
    $customer_firstname = $row_cards['first_name'];
    $customer_lastname = $row_cards['last_name'];
    $customer_phone = $row_cards['phone'];
    $customer_address = $row_cards['address'];
    $customer_email = $row_cards['email'];
$i++; // this increment so that it get all customers in the table not only one.
?>
<!--=====table rows====-->
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $customer_firstname; ?></td>
<td><?php echo $customer_lastname; ?></td>
<td><?php echo $customer_phone; ?></td>
<td><?php echo $customer_address; ?></td>
<td><?php echo $customer_email; ?></td>
<td>
<div class="btn-group">
<a class="btn btn-danger" href="delete.php?ID=<?php echo $customer_id; ?>">Delete</a>
  </div>
</td>
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