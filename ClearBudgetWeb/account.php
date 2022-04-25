<?php

session_start();

	if(!isset($_SESSION['userlogin'])){
		header("Location: login.php");
	}

  if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION);
    header("Location: login.php");
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Guest Home Page</title>
  </head>
  <body style = "background-color: #15b946">
        <head>
            <!-- Head metas, css, and title -->
            <?php require_once 'includes/head.php'; ?>
        </head>
        <body style = "background-color: #15b946">
            <!-- Header banner -->
            <?php require_once 'includes/headeraccount.php'; ?>
            <div class="container-fluid">
                <div class="row">
    <div class='text-center mt-5'>
      <form style="max-width:480px;margin:auto;">
      <img class = 'mt-4 mb-2' src="clearbudget-logos.jpeg" height = 400></img>
      <center><strong><font size= "5"> Welcome to clearbudget! </font></strong></center>
      <center><strong><font size= "5">Click on the Navigation Bar to get Started!</font></strong></center>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
