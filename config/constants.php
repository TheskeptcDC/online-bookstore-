<?php
session_start();
define('DB_USERNAME', 'root');
define('DB_PASSWORD','');
define('DB_NAME','library');
define('LOCALHOST','localhost');
define('SITEURL','http://localhost/University_library/');
define('IMAGEURL','http://localhost/University_library/assets/books/');
define('UPLOAD_DIR', $_SERVER['DOCUMENT_ROOT'] . '/University_library/assets/books/ ');
//conection to the database 
$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD);
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn));
?>