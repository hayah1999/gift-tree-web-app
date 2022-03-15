<?php
session_start();
include("includes/db.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
         <!--======logo in title bar=============-->
   <link href="images/logo PNG 2.png" rel="icon">
        <title>REGISTERATION </title>
        <meta content="width=device-width, initial-scale=1" name="viewport">
     <!-- Bootstrap 5 CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
     <!--- main css links----------------------->
     <link href="css/loginpage.css" rel="stylesheet">
     <!--- animation links----------------------->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    </head>
    <body>
        <section>
            <div class="container">
                <div class="text">
                <p class="centered"> Welcome to the family! </p>
                </div>
             <form  name='registration' onSubmit="return formValidation();" method="post" class="mt-0 mx-4" >
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Jack"  name="fname">
                            <label for="floatingInput">First Name</label>
                         </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Pearson" name="lname">
                            <label for="floatingInput">Last Name</label>
                         </div>
                    </div>
                  </div>       
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"  name="email">
                    <label for="floatingInput">Email address</label>
                 </div>            
               <div class="row">
               <div class="col">
                 <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
                  <label for="floatingInput">Username</label>
               </div>
             </div>
                 <div class="col">
               <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="floatingInput" placeholder="01254322355"  name="phone">
                            <label for="floatingInput">Phone Number</label>
                         </div>          
               </div></div>
                  <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password"  name="password1">
                    <label for="floatingPassword">Password</label>
                   </div>
                   <div class="form-floating">
                    <input type="password" class="form-control" id="floatingconfirmPassword" placeholder="Confirm Password" name="password2">
                    <label for="floatingconfirmPassword">Confirm Password</label>
                   </div>
                   <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Giza-street4-district11" name="address">
                    <label for="floatingInput">Address</label>
                 </div>
                 <div class="partcheck">
                   <p>By signing up you're agreeing on our <a href="#popup" class="terms ml-2">User terms and conditions</a></p>           
  <div class="popup container-fluid" id="popup">
    <div class="popup-inner">
      <div class="popuptext">
        <h1>User Terms & conditions</h1>
        <p>Welcome to gift tree, these are the terms and conditions are applied to any user of the of the web application (Gift Tree), you must agree to the following instructions at the first-time during registration to be able to register. Read them carefully to avoid any complications. By using the service/product of our website you basically comply to knowing how to use them according to the  guidelines. If you don’t agree with any of the terms and conditions or you don’t like the service/product offered or any subsequent changes happening in the future then you must know that the only choice you have is to stop using the web application (Gift Tree)<br>i. We don’t charge you while signing up or signing in any time, it completely free.<br>ii. Using the service or product is not free.<br>a. The gift card has fixed percentage currently 11% of the total price you charge.<br> b. The ceremonial card has a fixed price that include the message you choose to be sent along with the e-mail address.<br> iii. By signing up we have the right to store your information in our database.<br>iv. If the user provides fake information/scam then Gift Tree has the right to sue him/her. <br>v. You agree that you are buying and using this service with your own willpower to the people of your choice.<br> vi. The admin has the right to manage your deliveries which means he can see your address, phone number and e-mail.<br>vii. We are not responsible of any mistakes made by you in any transaction like typing the 
          wrong message or e-mail or amount of money.<br>viii. You are not allowed to type any sexual harassment notes to be sent along with any e-mail 
          and defying this would give the right to Gift Tree to have legal action towards you.<br>x. By using our web application, you comply to the right that we can save the receiver’s email address on our database.<br>xi. The service provider will not be able to view any of your contact information you have 
          provided.<br>xii. Your information will not be sold to any service provider, admin, graphic designer and delivery company we deal with.<br>xiii. You agree to the use of cookies that will be implemented in the near future on our website, 
          not agreeing to the use of cookies may slow your experience of the website.<br>xiv. All images, designs used in the website, gift cards and ceremonial cards are made solely for Gift Card partnership, using them without permission would give us the right to sue 
          you.<br> xv. Incase any trouble/mistake happen you must first contact us via our contact information available on the website (e-mail or telephone) to help us solve the problem, any negative social media posts written before that would be considered defamation and will give us the 
          write to sue you and use the information available in the legal form.<br>xvi. We have the write to block you from accessing our website if you violate any of the above 
          terms and you are not allowed to have any action to oppose our action.<br>xviii. You are not allowed to use our website for your own personal private use without contacting us first to form an agreement as your personnel would change from a customer to a service provider with different terms and conditions and defying this rule gives us the right to block you and take a legal action towards you.<br>xix. If you are caught dealing with our graphic designer in especial occasions with using our website as an intermediary you will be blocked from using our service and products 
          immediately. </p>
      </div>
      <a class="closepopup" href="#">X</a>
    </div>
  </div></div>
                   <div class="bttn">
                   <button type="submit" class="sign" name="register">Sign Up</button>
                   <p>Already a member ?<a href="checkout.php">  login </a> </p>
                 </div>
                </div>
             </form>
            </div>
            </div>
        </section>
    </body>
<script>
    function formValidation() {
        var fname = document.forms["registration"]["fname"];
        var lname = document.forms["registration"]["lname"];
        var email = document.forms["registration"]["email"];
        var phone = document.forms["registration"]["phone"];
        var password = document.forms["registration"]["password1"];
        var password2 = document.forms["registration"]["password2"];
        var address = document.forms["registration"]["address"];
        var username = document.forms["registration"]["username"];
        if (fname.value == "") {
            window.alert("Please enter your first name.");
            fname.focus();
            return false; }
        if (lname.value == "") {
            window.alert("Please enter your last name.");
            lname.focus();
            return false;}
        if (address.value == "") {
            window.alert("Please enter your address.");
            address.focus();
            return false; }
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
        if (phone.value == "") {
            window.alert(
              "Please enter your telephone number.");
            phone.focus();
            return false; }
        if (username.value == "") {
            window.alert(
              "Please enter your username .");
            username.focus();
            return false; }
        if (password.value == "") {
            window.alert("Please enter your password");
            password.focus();
            return false; }
        if (password.value.length < 6) {
            window.alert("Password length must be greater than 6");
            password.focus();
            return false; }
        if (password.value != password2.value ) {
            window.alert("Passwords mismatch");
            password.focus();
            return false; }
        return true;}
</script>
</body>
</html>
<?php
if(isset($_POST['register'])){
$f_name = $_POST['fname'];
$l_name = $_POST['lname'];
$email = $_POST['email'];
$username = $_POST['username'];
$pass = $_POST['password1'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$get_email = "select * from customers where username='$username'";
$run_email = mysqli_query($con,$get_email);
$check_email = mysqli_num_rows($run_email);
if($check_email == 1){ // if it checked for the user name and found it it print the following as username must be unique.
echo "<script>alert('This username is already registered, try another one')</script>";
exit();}
$insert_customer = "insert into customers (first_name,last_name,email,password,phone,address,username) values ('$f_name','$l_name','$email','$pass','$phone','$address','$username')";
$run_customer = mysqli_query($con,$insert_customer);
$get_user = "select * FROM customers ORDER BY ID DESC LIMIT 1"; // to get the user id needed to store if he added products to cart.
$run_user = mysqli_query($con,$get_user); $user_id = mysqli_fetch_array($run_user);
$_SESSION['customer_user']=$username; // get his user name to be displayed in the nav
$_SESSION['user_id']=$user_id['id']; // get the id.
echo "<script>window.open('home.php','_self')</script>";} // direct him to the home page
   ?>   
</html>