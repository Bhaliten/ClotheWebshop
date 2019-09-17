<?php 
  session_start();
 require 'class/Connection.php';

 ?>

<!DOCTYPE html>
<html lang="hu">

  <head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta charset="utf-8">



    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">



    <link rel="stylesheet" type="text/css" href="css/clothes.css">
    <title>Clothes</title>
  </head>
  <body class="bg-light">

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">

  <a class="navbar-brand" href="index.php"><img src="img/home.jpg" width="30px"></a>


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a href="men.php" class="nav-link text-center">Férfi ruhák</a>
      </li>
    </ul>
  </div>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a href="women.php" class="nav-link text-center">Női ruhák</a>
      </li>
    </ul>
  </div>
   <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a href="basket.php" class="nav-link text-center">Kosár</a>
      </li>
    </ul>
  </div>
  <?php 
      if(!isset($_SESSION["email"])){
   ?>
   <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a href="login.php" class="nav-link text-center">Bejelentkezés</a>
      </li>
    </ul>
  </div>
   <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a href="registration.php" class="nav-link text-center">Regisztráció</a>
      </li>
    </ul>
  </div>


  <?php }else{
    ?>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a href="quit.php" class="nav-link text-center">Kijelentkezés</a>
      </li>
    </ul>
  </div>

    <?php
   
    require 'class/Admin.php';

      $admin=new Admin();
    if($admin->isAdmin($_SESSION["email"])){

      ?>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a href="admin.php" class="nav-link text-center">Admin</a>
      </li>
    </ul>
  </div>

      <?php
    }


  } ?>
  </nav>