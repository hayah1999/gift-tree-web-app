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
 <header class="d-flex justify-content-center">Service Provider form</header>
<!--=========form=======================-->
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="form-group mx-4">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                    </div>
                        <div class="form-row mb-3 mx-4">
                          <div class="col">
                            <label >Name</label>
                            <input type="text" class="form-control" name="name" >
                          </div>
                          <div class="col">
                            <label >Type</label>
                            <input type="text" class="form-control" name="type" >
                          </div>
                        </div>
                        <div class="btnsub">
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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
//insert into service provider form
if(isset($_POST['submit'])){ // by clicking submit the following get executed.
  $email=mysqli_real_escape_string($con,$_POST['email']); // store the email entered in the form in this variable.
  $name=mysqli_real_escape_string($con,$_POST['name']); // store the name entered in the form in this variable.
  $type=mysqli_real_escape_string($con,$_POST['type']); // store the type entered in the form in this variable.
$sql="INSERT INTO service_provider(email,name,type) Values('$email','$name','$type')"; // insert those variables into the db.
$run=mysqli_query($con,$sql); // for connecting to db and executing insert function.
if($run){ // if executed the following pop up appear and the direct you to the view service provider page.
  echo "<script>alert('Service Provider inserted successfully')</script>";
  echo "<script>window.open('view service_provider.php','_self')</script>";
  }
  else{ // otherwise it display the error preventing it from execution.
    echo mysqli_error($con);
  }
}
} ?>
