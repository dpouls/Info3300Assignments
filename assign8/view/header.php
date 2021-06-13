<?php
   if ( !isset($_SESSION['email']) ) {
       header('location:/assign8/loginform.php');
   }
   $first_name = $_SESSION['first_name'];
   $last_name = $_SESSION['last_name'];
?>
<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
  <title>The Book Loan System</title>
  <link rel="stylesheet" type="text/css" href="/assign8/styles.css">
</head>

<!-- the body section -->
<body>
Welcome <?=$first_name?> <?=$last_name?>
<header><h1>The Book Loan System</h1> </header>
