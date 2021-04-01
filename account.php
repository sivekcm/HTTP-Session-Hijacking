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
           $first_name = $("#first_name").val();
           $last_name = $("#last_name").val();
           $email = $("#email").val();
           $userID = <?php echo $userID ?>;

               $.ajax({
                   type: 'POST',
                   url: 'update-account.php',
                   data: {
                       FirstName: $first_name,
                       LastName: $last_name,
                       Email: $email,
                       UserID: $userID,
                   },
                   cache: false,
                   success: function(dataResult){
                       var dataResult = JSON.parse(dataResult);
                       if(dataResult.statusCode==200){
                           alert("Information Updated!");
                           location.reload();

                       }
                       else if(dataResult.statusCode==201){
                           alert("Error occured !");
                       }
                   }
               });
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
      <span class="uk-label uk-label-warning uk-margin-remove-top uk-padding-remove-top">Account Info </span>
      <?php
        $sql1 = "SELECT * FROM users WHERE session_id='$sessionID';";
        $result = mysqli_query($conn, $sql1);
        $user = mysqli_fetch_assoc($result);
        $firstName = $user['first_name'];
        $lastName = $user['last_name'];
        $email = $user['email'];
        echo "<form>";

        echo "<label for=\"first_name\">";
        echo "First Name";
        echo "</label>";
        echo "<input class=\"uk-input\" type=\"text\" id=\"first_name\" value=\"$firstName\"/>";


        echo "<label for=\"last_name\">";
        echo "Last Name";
        echo "</label>";
        echo "<input class=\"uk-input\" type=\"text\" id=\"last_name\" value=\"$lastName\"/>";


        echo "<label for=\"email\">";
        echo "Email";
        echo "</label>";
        echo "<input class=\"uk-input\" type=\"text\" id=\"email\" value=\"$email\"/>";

       ?>
     </form>
       <button class="uk-button uk-button-secondary uk-button-large uk-margin" id="submit_changes">Update</button>


       <form action="/reset-password.php">
               <input class="uk-button uk-button-danger uk-margin-large-left" type="submit" value="Reset Password"/>
       </form>



    </div>
  </div>
  </body>
</html>
