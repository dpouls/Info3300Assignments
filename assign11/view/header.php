<?php
   header('Content-Type: text/html; charset=iso-8859-1');
   if ( !isset($_SESSION['email']) ) {
       header("location:loginform.php");
   }
   $first_name = $_SESSION['first_name'];
   $last_name = $_SESSION['last_name'];
?>
<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
  <title>The Utah County Event Tracker</title>
  <link rel="stylesheet" type="text/css" href="/assign11/styles.css">
</head>

<!-- the body section -->
<body>
Welcome <?=$first_name?> <?=$last_name?>
<header><h1>The Utah County Event Tracker</h1> </header>
