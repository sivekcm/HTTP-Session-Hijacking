<?php
   include 'dbh.php';
 ?>
 <!DOCTYPE html>
 <html>
     <head>
         <link rel="stylesheet" href="/css/uikit.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
         <script>
             $(document).ready(function() {
                 $("button").click(function(e) {
                     e.preventDefault();
                     $email = document.getElementById("email").value;
                     $password = document.getElementById("password").value;
                     $.ajax({
                         type: 'POST',
                         url: 'create-session.php',
                         data: {
                             email: $email,
                             password: $password
                         },
                         cache: false,
                         success: function(dataResult){
                             var dataResult1 = JSON.parse(dataResult);
                             if(dataResult1.statusCode==200) {
                                 window.location = "/home.php";
                             }
                             else if(dataResult1.statusCode==201){
                                 alert("Login Failed !");
                             }

                         }
                     });


                 });
             });
         </script>
     </head>
     <body>
         <section class="section">
             <div class="container">
                 <h1 class="uk-heading-medium uk-heading-divider">Login</h1>
             </div>
         </section>
         <section class="section">
             <div class="container">
                 <label class="uk-label" for="email">Email:</label>
                 <input type="Username" class="text" id="email">
                 <label class="uk-label" for="password">Password:</label>
                 <input type="password" class="password" id="password">
             </div>
         <section class="section">

         <div class="container">
             <button class="uk-button">Login</button>
         </div>

     </body>
 </html>
