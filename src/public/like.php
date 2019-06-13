<!-- Pure PHP File -->
<?php
include '../common/connection.php';

/*session_start();*/

$desid = $_GET['desid'];
$uid = $_SESSION["user"];
$status = $_GET['status'];

if ($status == 0) {
    $q1 = "INSERT INTO likes VALUES('".$desid.
    "','".$uid.
    "');";
    $result = $conn -> query($q1);
}

if ($status == 1) {
    $q1 = "DELETE FROM likes WHERE pid='".$desid.
    "' and uname='".$uid.
    "';";
    $result = $conn -> query($q1);
}

$conn -> close();
header('location:projects.php#'.$desid);

$conn -> close(); ?>
