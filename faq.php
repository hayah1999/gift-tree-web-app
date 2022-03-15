
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!--======logo in title bar=============-->
<link href="images/logo PNG 2.png" rel="icon">
        <title>Gift Tree</title>
        <meta content="width=device-width, initial-scale=1" name="viewport">
<!--css links------------------>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!--- main css links----------------------->
<link href="css/faq.css" rel="stylesheet">
<link href="css/trial2.css" rel="stylesheet">
    </head>

<?php
session_start();
include("includes/db.php");
include("includes/main.php");
?>
<!-----====================  ===FAQ container================-->
    <section class="container" id="provided-services">
        <header class="header2 container">
          <h2 >FAQ</h2>
        <hr>
        </header>
    </section>
    <section class="faq container">
      <div class="wrapper">
          <div class="accordion-item" id="question1">
              <a class="accordion-link" href="#question1">
              How much does your service and product cost? How long is the free trial time?
                  <ion-icon class="add" name="add-outline"></ion-icon>
                  <ion-icon class="remove" name="remove-outline"></ion-icon>
              </a>
              <div class="answer">
                  <p>
                  The cost of the ceremonial cards is stated with each card, for now its unified for a limited time for 10 EGP only while the gift cards price is 11% based on the amount you charge, if for example you charge a card with 100 EGP our 11% will be added at the total amount which will 111 EGP to be credited from your visa card and the 100 EGP will be delivered fully to contact.Your registration will always be 100% free on our website, so there is no trial time.
                  </p>
              </div>
          </div>
          <div class="accordion-item" id="question2">
              <a class="accordion-link" href="#question2">
              Can I have a refund after I send a charged gift card or a ceremonial card?
                  <ion-icon class="add" name="add-outline"></ion-icon>
                  <ion-icon class="remove"name="remove-outline"></ion-icon>
              </a>
              <div class="answer">
                  <p>
                  Sadly, you can`t because the process is made instantly and the money is transferred, that’s why the process is very detailed and clear and you have to type your information and the receiver’s information carefully to avoid any mixing. Also, you could contact us if there is anything not clear via our contact us page to help clear any confusion you have.
                  </p>
              </div>
          </div>
          <div class="accordion-item" id="question3">
              <a class="accordion-link" href="#question3">
              If I own a business, will I get a discount?
                  <ion-icon class="add" name="add-outline"></ion-icon>
                  <ion-icon class="remove" name="remove-outline"></ion-icon>
              </a>
              <div class="answer">
                  <p>
                  This depends on the size of the organization you own and the services you need, you can send us a message in the business page with the details and our HR will contact to arrange a meeting and discuss our future collaboration 
                  </p>
              </div>
          </div>
          <div class="accordion-item" id="question4">
              <a class="accordion-link" href="#question4">
              Is this the only brand and ceremonial card designs you have? will they change?
                  <ion-icon class="add" name="add-outline"></ion-icon>
                  <ion-icon class="remove" name="remove-outline"></ion-icon>
              </a>
              <div class="answer">
                  <p>
                  The brands may change according to the deal made with the organization but we are constantly looking to have a diverse collection to satisfy your needs so they will be updated from time to time with the more collaborations we have. The ceremonial cards designs will be updated every month all year and during special holidays we have a collaboration with a talented designer to design a theme-related cards to celebrate our holidays. So kindly check our website regularly to stay updated of our designs and brands. 
                  </p>
              </div>
          </div>
      </div>
      </section>
<!--FOOTER====================================================-->
<?php
include("includes/footer.php");?>
<!-- JQYERY, POPPERS, JSS-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>