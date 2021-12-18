<?php

require_once 'db.php';

$username = $_POST["username"];
$cpassword = $_POST["cpassword"];
$password = $_POST["password"];
if ($password == $cpassword){
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO admin_user (username, password) VALUES ('$username', '$hashed_password')";
    mysqli_query($connect, $query);
    echo 'Created a new Admin Successfuly!';
}
else {
    echo 'Passwords Doesnt Match!';
}

?>