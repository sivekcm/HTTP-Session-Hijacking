<?php  ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="/css/uikit.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <nav class="uk-navbar-container uk-navbar">
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
          <li class="uk-parent"><a href="/home.php">Home</a></li>
          <li class="uk-parent"><a href="/shop.php">Shop</a></li>
          <li class="uk-parent"><a href="/account.php">Account</a></li>
          <li class="uk-paretn"><a href="/login.php" onclick='document.cookie = "Session_ID=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";'>Logout</a></li>
        </ul>
    </div>
    <div class="uk-navbar-right">
      <ul class="uk-navbar-nav">
        <li class="uk-active">
          <a href="/cart.php">
            <img width="30" height="30" src="https://img.icons8.com/ios/50/000000/shopping-cart-loaded--v2.png"/>
          </a>
        </li>
      </ul>
    </div>
</nav>


  </body>
</html>
