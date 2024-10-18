<?php
require_once '../config/constants.php';
    if(isset($_SESSION['admin'])) {
        // echo "loged as admin";
    }else {
         #redirect to login page
         header('location:'.SITEURL);
         exit();
    }
?>