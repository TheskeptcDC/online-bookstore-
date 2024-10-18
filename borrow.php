<?php
// File: borrow.php

// Include necessary configuration and database connection
require_once 'config/constants.php';
require_once 'models/Books.php';
require_once 'config/login_check.php';

// Check if the user is logged in


// Check if book_id is provided
if (!isset($_GET['book_id']) || !is_numeric($_GET['book_id'])) {
    $_SESSION['error_message'] = "Invalid book selection.";
    header("Location: index.php");
    exit();
}

$book_id = $_GET['book_id'];
$user_id = $_SESSION['user'];

// Initialize Books model
$books = new Books($conn);

// Check if the book is available
$book = $books->getBookById($book_id,$conn);
if (!$book) {
    $_SESSION['error_message'] = "This book is not available for borrowing.";
    header("Location: index.php");
    exit();
}else {
    // $theBook = new books($conn);
    $sql = "UPDATE `books` SET `isBorrowed` = 'yes' WHERE `books`.`isbn` = '$book_id'";
    $res = mysqli_query($conn,$sql);   
     if ($res) {
    $_SESSION['success_message'] = "You have successfully borrowed the book: ";
} else {
    $_SESSION['error_message'] = "an error occured while trying to processes your request ..try agin later ";
    // Redirect back to the book list
header("Location: index.php");
exit();
}
}



$_SESSION['success_message'] = "You have successfully borrowed the book: ";
// Redirect back to the book list
header("Location: index.php");
exit();
?>