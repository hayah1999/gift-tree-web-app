<?php
session_start();

include("includes/db.php");
include("includes/header.php");
include("includes/main.php");
?>
<body>
  <!--========
============BREAD CRUMB=======
===========-->
<nav aria-label="breadcrumb"  id="crumbs">
  <ol class="breadcrumb"id="breadcrumb">
    <span class="headsup mr-auto">Our Gift Card</span>
    <li class="breadcrumb-item  ml-auto"><a href="home.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Gift Cards</li>
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
          <li class="lists" onclick="filterSelection('Clothes Brands')" >Clothes Brands</li>
          <li class="lists" onclick="filterSelection('Games')">Games</li>
          <li class="lists" onclick="filterSelection('Furniture')">Furniture</li>
          <li class="lists" onclick="filterSelection('Entertainment')">Entertainment</li>
        </ul>
      </div>
    </div>

    <script type="text/javascript">
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName(c);
  y = document.getElementsByClassName("coupon-item");
  if(c=='all'){
      x = y;
  }
  for (i = 0; i < y.length; i++) {
    // y[i].style.position = "absolute";
   y[i].style.display = "none";
   
  }
  for (i = 0; i < x.length; i++) {
   x[i].style.display = "inline-block";
  //  x[i].style.position = "fixed";
  }
}
</script>


<!--================= First row of products====================-->

<div class="row mt-3 mb-3 ">
<?php 
$get_cards = "select * from cards  where type = 1";
$run_cards = mysqli_query($con,$get_cards);
$cards = array();
while ($card =  mysqli_fetch_array($run_cards))
{
    $cards[] = $card;
}
foreach ($cards as $c){
$pro_id = $c['id'];
$pro_title = $c['name'];
$pro_price = $c['details'];
$pro_img1 = $c['photo'];
$cat = $c['category'];
?>

<div class="col-lg-4 col-md-6">
      <div class="coupon-item <?php echo $cat ?>">
        <img  src='admin_area/card_images/<?php echo $pro_img1 ?>'class="img-fluid" alt="">
        <div class="coupon-info">
          <h3>wanna see more about this?</h3>
          <a  href='details.php?id=<?php echo  $pro_id ?>&type=1' ><i class="fas fa-person-booth"></i></a>
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
