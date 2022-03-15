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
 <header class="d-flex justify-content-center">Cards form</header>
<!--=========form=======================-->
<form class="form-horizontal " method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->
<div class="centered ">
<div class="form-group  mx-4" ><label!-- form-group Starts -->
<label class="col-md-3 control-" > Card name </label>
<div class="col-md-6" >
<input type="text" name="card_name" class="form-control" required >
</div>
</div><!-- form-group Ends -->

<div class="form-group  mx-4" ><!-- form-group Starts -->
<label class="col-md-3 control-label" > Card Category </label>
<div class="col-md-6" >
<select name="card_cat" class="form-control" >
<option> Select  a card Category </option>
<option value='1' >Gift Card</option>
<option value='2' >Cermonial Card</option>
</select>
</div>
</div><!-- form-group Ends -->

<div class="form-group  mx-4" ><!-- form-group Starts -->
<label class="col-md-3 control-label" > Category </label>
<div class="col-md-6" >
<input type="text" name="category" class="form-control" required >
</div>
</div><!-- form-group Ends -->

<div class="form-group  mx-4" ><!-- form-group Starts -->
<label class="col-md-3 control-label" > card Image 1 </label>
<div class="col-md-6" >
<input type="file" name="card_img1" class="form-control" required >
</div>
</div><!-- form-group Ends -->

<div class="form-group  mx-4" ><!-- form-group Starts -->
<label class="col-md-3 control-label" > card Price </label>
<div class="col-md-6" >
<input type="text" name="card_price" class="form-control" required >
</div>
</div><!-- form-group Ends -->

<div class="form-group  mx-4" ><!-- form-group Starts -->
<label class="col-md-3 control-label" > card Description</label>
<div class="col-md-6" >
<textarea name="card_desc" class="form-control" rows="15" id="card_desc">
</textarea>
</div>
</div><!-- form-group Ends -->

<div class="form-group  mx-4" ><!-- form-group Starts -->
<label class="col-md-3 control-label" > Card brand </label>
<div class="col-md-6" >
<input type="text" name="card_brand" class="form-control" required >
</div>
</div><!-- form-group Ends -->

<div class="form-group  mx-4" ><!-- form-group Starts -->
<label class="col-md-3 control-label" > Card usability </label>
<div class="col-md-6" >
<input type="text" name="card_uses" class="form-control" required >
</div>
</div><!-- form-group Ends -->
<div >
          <button type="submit" class="btn btn-primary mx-4 " name="submit" >Insert card</button>
</div>
</div>
</form><!-- form-horizontal Ends -->
</div>
</div>
<!-- JQYERY, POPPERS, JSS-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
<?php
if(isset($_POST['submit'])){

$card_name = $_POST['card_name'];
$card_cat = $_POST['card_cat'];
$cat = $_POST['category'];
$card_price = $_POST['card_price'];
$card_desc = $_POST['card_desc'];
$card_uses = $_POST['card_uses'];
$card_brand = $_POST['card_brand'];
$card_img1 = $_FILES['card_img1']['name'];
$temp_name1 = $_FILES['card_img1']['tmp_name'];
move_uploaded_file($temp_name1,"card_images/$card_img1"); // this so that it can upload to the file in a new determined location which is card-images file.
$insert_card = "insert into cards (name,category,usability,brand,details,photo,price,type) values ('$card_name','$cat','$card_uses','$card_brand','$card_desc','$card_img1','$card_price','$card_cat')";
$run_card = mysqli_query($con,$insert_card) or die(mysqli_error($con));
if($run_card){
echo "<script>alert('Card has been inserted successfully')</script>";
echo "<script>window.open('view_cards.php','_self')</script>";
}
else{
  echo mysqli_error($con);
}
}
?>
<?php } ?>
