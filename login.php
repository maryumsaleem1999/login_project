<?php
include "db.php";
require "nav.php";
    $login= false;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username = $_POST['username'];
        $pass = $_POST['Password'];
        $sql = "SELECT * FROM `users` WHERE username = '$username' and password = '$pass'";
        $result=mysqli_query($con , $sql);
        $num = mysqli_num_rows($result);
        if($num == 1){   
        $login = true;
        session_start();
        $_SESSION["login"] = true;
        $_SESSION["username"] = $username;
        header("location:welcome.php");
        ?>
        <script>
         alert ("you are loged in!");
        </script>
        <?php
        }else{
        ?>
        <script>
        alert ("please enter valid username and password");
        </script>
        <?php
        }
    }
      
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>login!</title>
    <script>
    function mylogin(){
      var a = document.getElementById('username','password').value ;
      if(a==""){
      alert("please enter email and password");
      username.focus();
      return false;
      }
    }
    </script>
  </head>

  <body>
 
<div class="container ">
    <h3 class="text-center mt-5">LOGIN</h3>
<form action="/loginproject/login.php" method="POST" onsubmit="return mylogin()">
  <div class="form-group  ">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter email" >
  </div>
  <div class="form-group ">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="Password" name="Password" placeholder="Password" >
  </div>

  <button type="submit" class="btn btn-primary">LogIn</button>
</form>














    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
  </body>
</html>