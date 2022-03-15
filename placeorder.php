 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--======logo in title bar=============-->
    <link href="images/logo PNG 2.png" rel="icon">
    <title>Place Order Page</title>
    <!--- main css links----------------------->
    <link href="css/trial2.css" rel="stylesheet">
    <link rel="stylesheet" href="css/placeorder.css">   
<!--Bootstrap 4 css links------------------>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <!--- animation links----------------------->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<?php
  include("includes/db.php"); // for db connection.
  include("includes/main.php"); // to call the nav bar.
  ?>
        <!--===================== FORM====-->
<div class="card container">
 <div class="card-top border-bottom text-center"> <a href="cart.php"> Back to cart</a> 
      </div>
<div class="card-body">
<form action='' method='post' class='form-horizontal'>
              <div class="row">
                <!----------LEFT SIDE---------->
<div class="col-md-7">
<div class="left border">      
<div class="row"> 
<span class="header">Payment</span>
<div class="icons"> 
          <img src="https://img.icons8.com/color/48/000000/visa.png" /> 
          <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" /> 
          <img src="https://img.icons8.com/color/48/000000/maestro.png" /> 
       </div>
       </div>
 <form > 
          <span>Full name:</span> <input type="text" name='name' placeholder="Enter your full name"  required> 
          <span>Card Number:</span> <input type="password" name='card_number' placeholder="***************" required>
          <span>Reciever email:</span> <input type="email" name='email'  placeholder="Enter the email of the reciever" required>
          <span>Attached Message:</span> <input type="text"  name='message' placeholder="Enter the message to be sent to the reciever email" required>
 <div class="row">    
          <div class="col-4"><span>Expiry date:</span> <input type="text" name='expire_date' placeholder="MM/YY" required></div> 
          <div class="col-4"><span>CVV:</span> <input type="text" name="cvv" id="cvv" required></div>   
 </div>
</form>
</div>
</div>
           <!----------------RIGHT SIDE----->
           <div class="col-md-5">
            <div class="right border">
           <div class="header">Order Summary
              </div>
              <?php 
  $serials=[]; //empty variable.
  $total=0;
  $uid=$_SESSION['user_id'];
  $select_cart = "select * from cart where user_id='$uid' "; // taking the card with the loged in user's id.
  $run_cart = mysqli_query($con,$select_cart); // connect the db and do the selecting function from db.
  $cart = mysqli_fetch_array($run_cart); // get all attributes of the fetched cart from cart table.
  $cid = $cart['id']; // the id of the selected cart of the loged in user.
  $select_cart_card = "select * from cart_card where cart_id='$cid' "; //get from the card_cart table the cards that are in the cart where id =cid.
  $run_cart_card = mysqli_query($con,$select_cart_card);//connect the db and do the selecting function from db.
  while($cart_card = mysqli_fetch_array($run_cart_card)){
  $total += $cart_card['price'];
  $id=$cart_card['card_id'];
  $get_cards = "select * from cards where id='$id'";
  $run_cards = mysqli_query($con,$get_cards);
$check_cards = mysqli_num_rows($run_cards);
$row_cards = mysqli_fetch_array($run_cards);
if($check_cards == 1 && $row_cards['type']==1){
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; //that's where the serial no.come from
    $charactersLength = strlen($characters); // get the length of $characters by string length function.
    $randomString = '';// where the serial no. would be made random.
    for ($i = 0; $i < 8; $i++) { // here the length of generated serial no, is 8.
        $randomString .= $characters[rand(0, $charactersLength - 1)];}//with the random function we will do it on the length of characters starting from 0 as any array start from there and the -1 is because of that.
    $brand = str_replace(' ', '', $row_cards['name']);// for each brand we will use replace string for that each serial no. have at its start the name of that brand.
$serial=$brand.$randomString; // adding the two function to generate final serial no.
array_push($serials,$serial);}}
$final_price = $total;
echo "
            <div class='row lower'>
             <div class='col text-left'><b>Total to pay</b></div>
               <div class='col text-right'><b>$final_price</b></div>
                </div>       
                <button type='submit' name='order'  class='btn'>Place order</button>
                </form>         
                 </div>
                 </div>
                 ";
if(isset($_POST['order'])){ // by clicking the button.
  if(count($serials)>0){ //if the variable has $brand and $randomString in it then do the follwoing.
  $name = $_POST['name'];
  $email = $_POST['email'];
  $price=$final_price;
  $serial_string=''; // empty variable for now just saving a storage.
for ($i=0;$i<count($serials);$i++){
      $serial_string.=$serials[$i];
  $serial_string.="   ";} // here the generated serial no. will be stored to be stored later on in the db.
$user_id = $_SESSION['user_id']; // geting userid.
  $insert_order = "insert into orders (customer_id,invoice_no,order_status,name,email,price) values ('$user_id','$serial_string','pending','$name','$email','$price')";
  $run_order = mysqli_query($con,$insert_order);//connect the db and do the selecting function from db.
$del_cart = "delete from cart where user_id =".$user_id ; // after placing the order the cart will be empty.
  $run_delete = mysqli_query($con,$del_cart) or die(mysqli_error($con));//connect the db and do the deleting function from db.
echo "<script>alert('Order placed Successfully serials : $serial_string')</script>";}
else{
  echo "<script>alert('Cart is empty')</script>";}}
?>
           </div>
           </div>
           </div>
     <!-------==============-FOOTER-================----->
     <?php  include("includes/footer.php");  ?> 
<!-- JQYERY, POPPERS, JSS-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>