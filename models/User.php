<?php
    class User
    {
function checkLogIn($conn, $name,$password){

    $sql = "SELECT * FROM `users` WHERE `user_name` = '$name' AND `password` = '$password' AND `isAdmin` = 'yes'";
    $admSql = "SELECT * FROM `users` WHERE `user_name` = '$name' AND `password` = '$password'";
    // check if log is an admin 
    $res = mysqli_query($conn,$sql);
    $admRes = mysqli_query($conn,$admSql);
    if ($res) {
        # code...
        $row = mysqli_num_rows($res);
        // if 1 the yes 
                if ($row === 1) {
                    return "admin";
                }
    }

    // check for admin 
    if ($admRes) {
        $row = mysqli_num_rows($admRes);
            if ($row != 0) {
                return "user";
            }else {
                return "wrong password or username";
            }
        return "both";
    }

}





// close
    }

?>