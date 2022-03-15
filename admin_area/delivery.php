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
<body>
<?php
include("includes/sidebar.php");
?>
<div class="content container ">
<div class="box ">
 <header class="d-flex justify-content-center">Delivery form</header>
<!--=========form=======================-->
         <form class="form-horizontal " method="post" enctype="multipart/form-data">
           <div class="form-group mx-4">
                  <label >Name</label>
                  <input type="text" class="form-control" placeholder="Ahmed"  name="name" >
           </div>
           <div class="form-group mx-4">
                  <label >Date </label>
                  <input type="date" class="form-control" name="date" >
           </div>
           <div class="form-group mx-4">
                  <label for="inputAddress">Address</label>
                  <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address">
           </div>               
          <div class="btnsub ">
             <button type="submit" class="btn btn-primary " name="submit">Submit</button>
         </div>
         </form>
          
        </div>
    </div>
<!-- JQYERY, POPPERS, JSS-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
<?php
//insert into delivery form
if(isset($_POST['submit'])){
  $name=mysqli_real_escape_string($con,$_POST['name']);
  $date=mysqli_real_escape_string($con,$_POST['date']);
  $address=mysqli_real_escape_string($con,$_POST['address']);
$sql="INSERT INTO delivery(name,date,address) Values('$name','$date','$address')"; 
$run=mysqli_query($con,$sql); 
if($run){
  echo "<script>alert('Delivery inserted successfully')</script>";
  echo "<script>window.open('view delivery.php','_self')</script>";
  }
  else{
    echo mysqli_error($con);
  }
}
}
 ?>
