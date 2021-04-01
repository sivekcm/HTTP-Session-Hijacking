<?php
  include 'dbh.php';
  session_start();
  $sessionID = $_COOKIE['Session_ID'];
  $userID = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="/css/uikit.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
       $("button").click(function(e) {
           e.preventDefault();
           $buttonID = e.target.id;
           $pass = $("#new_password").val();
           $rePass = $("#re_new_password").val();
           $userID = <?php echo $userID ?>;

           if ($pass === $rePass) {
               $.ajax({
                   type: 'POST',
                   url: 'reset-password-db.php',
                   data: {
                       Pass: $pass,
                       UserID: $userID
                   },
                   cache: false,
                   success: function(dataResult){
                       var dataResult = JSON.parse(dataResult);
                       if(dataResult.statusCode==200){
                           alert("Password Changed!");
                           window.location = "/account.php";

                       }
                       else if(dataResult.statusCode==201){
                           alert("Error occured !");
                       }
                   }
               });
             }
             else {
               alert("Error: Passwords do not match");
             }
       });


   });
    </script>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <nav class="uk-navbar-container uk-navbar">
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
          <li class="uk-parent"><a href="/home.php">Home</a></li>
          <li class="uk-parent"><a href="/shop.php">Shop</a></li>
          <li class="uk-active"><a href="/account.php">Account</a></li>
          <li class="uk-paretn"><a href="/login.php">Logout</a></li>
        </ul>
    </div>
    <div class="uk-navbar-right">
      <ul class="uk-navbar-nav">
        <li class="uk-parent">
          <a href="/cart.php">
            <img height="30" width="30" src="https://img.icons8.com/ios/50/000000/shopping-cart-loaded--v2.png"/>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="uk-section uk-section-muted uk-position-center uk-padding-small">
    <div class="uk-container">
      <span class="uk-label uk-label-warning uk-margin-remove-top uk-padding-remove-top">Reset Password</span>
        <form
          <label for="new_password">
          New Password
          </label>
          <input class="uk-input" type="password" id="new_password" placeholder="Enter new password here"/>

          <label for="re_new_password">
          Re-enter Password
          </label>
          <input class="uk-input" type="password" id="re_new_password" placeholder="Re-enter password here"/>
       </form>
       <button class="uk-button uk-button-secondary uk-button-large uk-margin" id="submit_changes">Submit Changes</button>


    </div>
  </div>
  </body>
</html>
