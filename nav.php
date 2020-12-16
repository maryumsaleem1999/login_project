<?php

if(!isset($_SESSION['login']) || $_SESSION['login']!=true){
  $login = true;
}else{
  $login = false;
}
echo'<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">PROJECT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
   
    <li class="nav-item active">
       <a class="nav-link text-white" href="/loginproject/welcome.php">HOME <span class="sr-only">(current)</span></a>
      </li>';
       if($login){
      echo'<li class="nav-item">
        <a class="nav-link text-white" href="/loginproject/signup.php">SIGNUP</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="/loginproject/login.php">LOGIN</a>
      </li>';
       }
      if(!$login){
      echo'<li class="nav-item">
      <a class="nav-link text-white" href="/loginproject/login.php">LOGOUT</a>
      </li>';
      }
      if(!$login){
        echo'
        <button class="btn btn-dark">'.$_SESSION["username"].'</button>';
      }

    echo'</ul>
  </div>
</nav>';
?>
