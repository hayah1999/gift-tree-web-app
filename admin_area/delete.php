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
//delete card
if(isset($_GET['id'])){ //clicking on the delete in view card.
$delete_id = $_GET['id']; // getting the id of the specified card to be deleted.
$delete_pro = "delete from cards where id='$delete_id'";
$run_delete = mysqli_query($con,$delete_pro); // connect to db and execute deleting function.
if($run_delete){ // the delete was a success execute the following.
echo "<script>alert('One Product Has been deleted')</script>"; // it is the pop up message recieved when clicking delete and it get deleted.
echo "<script>window.open('view_cards.php','_self')</script>"; // direct you to the view card page.
}
}
//delete customer
if(isset($_GET['ID'])){ 
    $delete_customer_id = $_GET['ID'];
    $delete_cust = "delete from customers where ID='$delete_customer_id'";
    $run_delete_cust = mysqli_query($con,$delete_cust);
    if($run_delete_cust){
    echo "<script>alert('One Customer Has been deleted')</script>";
    echo "<script>window.open('customer.php','_self')</script>";
    }
    else{ // this happen if a customer can/t be deleted and thet is due to their id is a foriegn key in order table or any other table.
        echo "<script>alert('Record Not deleted')</script>";
        echo "<script>window.open('customer.php','_self')</script>";
    }
    }
//delete message
if(isset($_GET['Id'])){
    $delete_message_id = $_GET['Id'];
    $delete_message = "delete from contact_us where Id='$delete_message_id'";
    $run_delete_message = mysqli_query($con,$delete_message);
    if($run_delete_message){
    echo "<script>alert('One Message Has been deleted')</script>";
    echo "<script>window.open('view_messages.php','_self')</script>";
    }
    else{
        echo "<script>alert('Record Not deleted')</script>";
        echo "<script>window.open('view_messages.php','_self')</script>";
    }
    }
//delete Service Provider
if(isset($_GET['I_D'])){
    $delete_provider_id = $_GET['I_D'];
    $delete_provider = "delete from service_provider where id='$delete_provider_id'";
    $run_delete_provider = mysqli_query($con,$delete_provider);
    if($run_delete_provider){
    echo "<script>alert('One Service Provider Has been deleted')</script>";
    echo "<script>window.open('view service_provider.php','_self')</script>";
    }
    else{
        echo "<script>alert('Record Not deleted')</script>";
        echo "<script>window.open('view service_provider.php','_self')</script>";
    }
    }
//delete Delivery
if(isset($_GET['I_d'])){
    $delete_delivery_id = $_GET['I_d'];
    $delete_delivery = "delete from delivery where id='$delete_delivery_id'";
    $run_delete_delivery = mysqli_query($con,$delete_delivery);
    if($run_delete_delivery){
    echo "<script>alert('One Record Has been deleted')</script>";
    echo "<script>window.open('view delivery.php','_self')</script>";
    }
    else{
        echo "<script>alert('Record Not deleted')</script>";
        echo "<script>window.open('view delivery.php','_self')</script>";
    }
    }
//delete Business
if(isset($_GET['Id_b'])){
    $delete_business_id = $_GET['Id_b'];
    $delete_business = "delete from business where id='$delete_business_id'";
    $run_delete_business = mysqli_query($con,$delete_business);
    if($run_delete_business){
    echo "<script>alert('One Record Has been deleted')</script>";
    echo "<script>window.open('view business.php','_self')</script>";
    }
    else{
        echo "<script>alert('Record Not deleted')</script>";
        echo "<script>window.open('view business.php','_self')</script>";
    }
    }
?>
<?php } ?>