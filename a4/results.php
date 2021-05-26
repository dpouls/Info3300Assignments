<?php 
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['logged_in'])) {
    header('Location:index.php?errors=You must login to play the game');
}
if (!isset($_SESSION['memero_answer_one']) || !isset($_SESSION['memero_answer_one'])) {
    header('Location:index.php?errors=You must start at the beginning');
}

$user_answer_one = filter_input(INPUT_POST, 'user_answer_one');
$user_answer_two = filter_input(INPUT_POST, 'user_answer_two');
$memero_answer_one = $_SESSION['memero_answer_one'];
$memero_answer_two = $_SESSION['memero_answer_two'];
$outcome_message = '';
if ($user_answer_one == $memero_answer_one && $user_answer_two == $memero_answer_two) {
    $outcome_message = 'You are a genius!';
} else {
    $outcome_message = 'Maybe you could try smaller numbers';
}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Game Results</title>
 </head>
 <body>
     <?php include("header.php") ?>
     <div id="data_entry">
     <h1><?=$outcome_message?></h1>
     </div>
     <a href="index.php">Back to Home</a>
 </body>
 </html>