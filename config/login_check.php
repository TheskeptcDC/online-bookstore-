<?php
require_once('constants.php');
//check if a user is currently loged in
    if (isset($_SESSION['user'])) {
        $name_at_log = $_SESSION['user'];
    }elseif (isset($_SESSION['admin'])) {
        // echo "loged as user";
    }else {
         #redirect to login page
         header('location:'.SITEURL.'login.php');
         exit();
    }

?>