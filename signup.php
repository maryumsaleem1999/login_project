
<?php
  include "db.php";
  require "nav.php";
  $insert= false;
  
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username = $_POST['username'];
        $pass = $_POST['Password'];
        $cpass = $_POST['cPassword'];
        $phone= $_POST['number'];
        $pass_has = password_hash($pass  , PASSWORD_BCRYPT);
        $cpass_has = password_hash($cpass , PASSWORD_BCRYPT);
        $existsql= "SELECT * FROM `users` WHERE username = '$username'";
        $result =mysqli_query($con , $existsql);
        $exitsacount = mysqli_num_rows($result);
        if($exitsacount==1){
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Message!</strong> you have already an account.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }else{
            if($pass == $cpass){
            $sql = "INSERT INTO `users` (`username`, `password`, `conpassword`, `phoneno`, `date`) VALUES ('$username', '$pass_has', '$cpass_has', '$phone', CURRENT_TIMESTAMP)";
            $result=mysqli_query($con , $sql);
            if($result){   
               $insert = true;
                ?>
                <script>
                  alert ("created account successfully");
                </script>
                <?php
                }else{
                  ?>
                  <script>
                  alert ("account not created");
                </script>
                <?php
               }        
            }else{
          ?>
          <script>
          alert ("please enter same password");
          </script>
          <?php
        }
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
    <script>
    function  mybut(){
      var a = document.getElementById('username','password','cpassword','number').value ;
      if(a==""){
      alert("please enter the form");
      username.focus();
      return false;
      }
    }

    </script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>

  <body>
 
<div class="container ">
    <h3 class="text-center mt-5">JUST SIGNUP</h3>
<form action="/loginproject/signup.php" method="POST"  onsubmit="return mybut()">
  <div class="form-group  ">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter email" >
  </div>
  <div class="form-group ">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="Password" name="Password" placeholder="Password" >
  </div>
  <div class="form-group ">
    <label for="cpassword">Password</label>
    <input type="password" class="form-control" id="cPassword" name="cPassword" placeholder="re-type your Password" >
    <small id="emailHelp" class="form-text text-muted">make sure your password is same.</small>
  </div>
  <div class="form-group ">
    <label for="exampleInputPassword1">Phone Number</label>
    <input type="number" class="form-control" id="number" name="number" placeholder="enter your number "  >
  </div>
  <button  type="submit"  class="btn btn-primary">SINGUP</button>  
</form>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
  </body>
</html>