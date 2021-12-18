<?php

require_once 'db.php';

$username = $_POST["username"];
$password = $_POST["password"];
$query = "SELECT * FROM admin_user";
$result = mysqli_query($connect, $query);
$no_match = false;

while($row = mysqli_fetch_array($result)){
    $match = password_verify($password, $row["password"]);
    if ($username == $row["username"] && $match){
        session_start();
        $_SESSION["admin-username"] = $username;
        header("Location: ../pages/home.php");
        break;
    }
    else{
        $no_match = true;
    }
}
if ($no_match){
    echo 'Username or Password is incorrect';
}

?>