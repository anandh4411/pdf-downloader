<?php
require_once 'db.php';

$id = 0;
$query1 = "SELECT TOP 1 * FROM pdf ORDER BY id DESC";
$result1 = mysqli_query($connect, $query1);
while($row = mysqli_fetch_array($result1)){
    $id = $row["id"] + 1;
}

$name = $_POST["name"];
$date = $_POST["date"];
$time = $_POST["time"];
$pdf = $_FILES["pdf"];
$pdf_name = $_FILES["pdf"]["name"];
$pdftmp_name = $_FILES["pdf"]["tmp_name"];
// Path to store uploaded pdfs
$destination = "../../pdf/".basename($pdf_name);
$query2 = "INSERT INTO pdf (name, date, time, pdf)
VALUES ('$name', '$date', '$time', '$pdf_name')";
mysqli_query($connect, $query2);

// move uploaded pdf into uploads folder
if (move_uploaded_file($pdftmp_name, $destination)){
    header("Location: ../pages/home.php");
}
else echo 'Cannot upload pdf! Please check uploads folder permissions. Make it read, write possible.';

?>