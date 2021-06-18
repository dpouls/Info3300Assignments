<?php
session_start();
require('../model/checkouts_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
   $action = filter_input(INPUT_GET, 'action');
   if ($action == NULL) {
       $action = 'list_available_books';
   }
}

if ($action == 'list_available_books') {
   header('location:/assign9/books/index.php?action=list_available_books');
}
else if ($action == 'checkout') {
   //Get the book_id from the HTTP HEADER (GET)
   $book_id = filter_input(INPUT_GET,'book_id');
   //Get the user_id from out of the $_SESSION
   $user_id = $_SESSION['user_id'];
   //Attempt to check out the book in an if statement.
   $message = '';
   //If the book successfully checked out, a 1 will be returned.
   if (check_out_book($user_id,$book_id) == 1) {
       //If the book was successfully checked out, assign the $message variable "success"
       $message = 'Book successfully checked out';
    } else {
        //If the book was NOT successfully checked out, set $message to 
       //"book already checked out"  
    $message = 'Book was already checked out';
   }
   //get the book information using its book_id by calling get_book_info
   $book = get_book_info($book_id);
   //Get a result set of checked_out_books by the current user_id
   $checked_out_books = get_checked_out_books($user_id);
   //include the view file (not yet created) that shows books_checkouts
   include('books_checkouts.php');
}
else if($action == 'checked_out_by_user') {
   //Get the user_id from the HTTP HEADER (GET)
   $user_id = filter_input(INPUT_GET,'user_id');
   //Get the user information from get_user_info($user_id); found in checkouts_db.php
   $user = get_user_info($user_id);
   //Get all checked_out_books by user_id and assign to a variable
   $checked_out_books = get_checked_out_books($user_id);
   //include the view file (not yet created) that shows books_checkouts_by_user
   include('books_checkouts_by_user.php');
}
