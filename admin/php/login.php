<?php

require_once 'db.php';

$username = $_POST["username"];
$password = $_POST["password"];
$query = "SELECT * FROM admin_user";
$result = mysqli_query($connect, $query);

while($row = mysqli_fetch_array($result)){
    if ($username == $row["username"] && $password == $row["password"]){
        session_start();
        $_SESSION["admin-username"] = $username;
        header("Location: ../pages/home.php");
        break;
    }
    else{
        echo 'Username or Password is incorrect';
    }
}

?>