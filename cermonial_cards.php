<?php

session_start();

include("includes/db.php"); // connect to db.
include("includes/header.php"); // call the head tag.
include("includes/main.php"); // call the nav bar.
?>

<!--========
============BREAD CRUMB=======
===========-->
<nav aria-label="breadcrumb"  id="crumbs">
  <ol class="breadcrumb"id="breadcrumb">
    <span class="headsup mr-auto">Our Ceremonial Cards</span>
    <li class="breadcrumb-item  ml-auto"><a href="home.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ceremonial Cards</li>
  </ol>
</nav>

   <!--==============
    =======container for coupons==========-->
    <section class="products">
  <div class="container">

<!--==for categorization========-->
<div class="row mt-5 mb-4">
      <div class="col-lg-12">
        <ul id="listcontainer">
          <li class="lists active" onclick="filterSelection('all')"> All</li>
          <li class="lists" onclick="filterSelection('Birthdays')" >Birthdays</li>
          <li class="lists" onclick="filterSelection('Motivations')">Motivations</li>
          <li class="lists" onclick="filterSelection('Congrats')">Congrats</li>
        </ul>
      </div>
    </div>

    <script type="text/javascript">
function filterSelection(c) { // setting a function called filterSelection and asigning a parameter to it 'c'.
  var x, i; // identifying two variables.
  x = document.getElementsByClassName(c); // this will get just the products with the the class that replaces c for each category.
  y = document.getElementsByClassName("coupon-item"); // this will get the css to display those products with selected category.
  if(c=='all'){ //if category 'all' chosen then show all products.
      x = y;
  }
  for (i = 0; i < y.length; i++) {
   y[i].style.display = "none";
  //  y[i].style.width = 0;
  }
  for (i = 0; i < x.length; i++) {
   x[i].style.display = "inline-block";
  }
}
</script>
<!--================= First row of products====================-->

<div class="row mt-3 mb-3 ">
<?php 
$get_cards = "select * from cards  where type = 2"; // get all cards that are ceremonial.
$run_cards = mysqli_query($con,$get_cards); // connect and select to and from db.
$cards = array(); // save the cards into an array.
while ($card =  mysqli_fetch_array($run_cards)) // fetch all cards
{
    $cards[] = $card; // and store them here.
}
foreach ($cards as $c){ // for each card get its info
$pro_id = $c['id'];
$pro_title = $c['name'];
$pro_price = $c['details'];
$pro_img1 = $c['photo'];
$cat = $c['category']; // here it get the category from db so that the categorization in html work.
?>
      <div class="col-lg-4 col-md-6">
      <div class="coupon-item <?php echo $cat ?>">
        <img  src='admin_area/card_images/<?php echo $pro_img1 ?>'class="img-fluid" alt="">
        <div class="coupon-info">
          <h3>wanna see more about this?</h3>
          <a  href='details.php?id=<?php echo  $pro_id ?>&type=2' ><i class="fas fa-person-booth"></i></a>
        </div>
      </div>
    </div>
<?php
}
 ?>
</div><!-- row Ends -->
</div>
</section>
<!--=============footer===================-->
<?php
include("includes/footer.php");
?>
<!-- JQYERY, POPPERS, JSS-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
