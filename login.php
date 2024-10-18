<?php
include 'models\User.php';
include 'config\constants.php';

if (isset($_POST['login'])) {
    $name = $_POST['username'];
    $password = $_POST['password'];
    // login logic 
    $user = new User();
    $userExists = $user->checkLogin($conn,$name,$password);
    // checking if the user exists 
    
    if ($userExists == "user") {
        $_SESSION['user'] = $name;
        // echo $_SESSION['user'];
        header('location:'.SITEURL);
    }elseif ($userExists == "admin") {
        # code...
        $_SESSION['admin'] = $user;
        header('location:'.SITEURL.'admin');
    }else {
        $_SESSION['error'] = $userExists;
        header('location:'.SITEURL);
    }
}else {
    # code...
    include 'views\login.html';
}
?>