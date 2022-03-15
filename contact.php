<?php
session_start();
include("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!--======logo in title bar=============-->
   <link href="images/logo PNG 2.png" rel="icon">
    <title>Contact Us Page</title>
    <!--- main css links----------------------->
    <link href="css/trial2.css" rel="stylesheet">
    <link rel="stylesheet" href="css/contactus.css">
<!--Bootstrap 4 css links------------------>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <!--- animation links----------------------->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<?php
include("includes/main.php");?>
<!--===================BREADCRUMBS Bar============-->
<nav aria-label="breadcrumb"  id="crumbs">
  <ol class="breadcrumb"id="breadcrumb">
    <span class="headsup mr-auto"> Gift Tree</span>
    <li class="breadcrumb-item  ml-auto"><a href="home.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
  </ol>
</nav>
<!-------CONTAINER-------->
<div class="container">
<div class="content">
                 <!------LEFT SIDE------->
  <div class="left-side">
  <div class="phone details">
              <i class="fas fa-phone-alt"></i>
              <div class="topic">Phone</div>
              <div class="text">01027058427</div>
     </div>
 <div class="email details">
              <i class="fas fa-envelope"></i>
              <div class="topic">Email</div>
              <div class="text">gifttree99@gmail.com</div>  
    </div>
    </div>
                  <!------RIGHTT SIDE------->
     <div class="right-side">
     <div class="topic-text">Send Us A Message</div>
  <p>If you have any problem or inquery, Send us a message from here. It's our pleasure to help you.</p>
 <form method="post" name='contact' onSubmit="return formValidation();">
         <div class="input-box">
              <input type="text"  name="name" placeholder="Enter your name">
         </div>
         <div class="input-box">
              <input type="text" name="email"  placeholder="Enter your email">
         </div>
         <div class="input-box message-box">
            <input type="text"  name="message" placeholder="Enter your message">
         </div>
            <!------BUTTON---------->
 <div class="button">
         <input type="submit" name="submit" value="Send Now" >
 </div>
         </form>
         </div>
         </div>
        </div>
<!--===========footer==============-->
<?php
include("includes/footer.php");?>
<?php   
if(isset($_POST['submit'])){
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$insert_message = "insert into contact_us (name,email,message) values ('$name','$email','$message')";
$run_message = mysqli_query($con,$insert_message);
if($run_message){
echo "<script>alert('message has been sent successfully')</script>";}
else{echo $run_message;}
}?>
<script>
    function formValidation() {
        var name = document.forms["contact"]["name"];
        var email = document.forms["contact"]["email"];
        var message = document.forms["contact"]["message"];
        if (name.value == "") {
            window.alert("Please enter your name.");
            name.focus();
            return false;}
        if (email.value == "") {
            window.alert(
              "Please enter a valid e-mail address.");
            email.focus();
            return false;}
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(!email.value.match(mailformat))
        {
          alert("You have entered an invalid email address!");
        email.focus();
        return false;}
        if (message.value == "") {
            window.alert(
              "Please enter your message.");
            message.focus();
            return false; }  
        return true;}
</script>
<!-- JQYERY, POPPERS, JSS-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>