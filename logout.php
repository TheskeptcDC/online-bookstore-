<?php
// Include necessary files
include 'config\constants.php';

// Start the session if it's not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (isset($_SESSION['user']) || isset($_SESSION['admin'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page or home page
    header('Location: ' . SITEURL);
    exit();
} else {
    // If the user is not logged in, redirect them to the login page
    header('Location: ' . SITEURL . 'views/login.html');
    exit();
}
?>