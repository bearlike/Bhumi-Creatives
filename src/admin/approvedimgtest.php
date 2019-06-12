<!-- Pure PHP File-->
<?php
include '../common/connection.php';
session_start();
if (isset($_SESSION['user']) && $_SESSION['user'] == "admin")
    $user = $_SESSION['user'];
else
    header("Location:loginAdmin.php");
$pid = $_GET['pid'];
$url1= "download.php?pid=".$pid."&type=i";


$sql = "SELECT * FROM approval WHERE pid='".$pid."';";
$result = $conn -> query($sql) or die(mysqli_error($conn));

$url = null;
if ($row = $result->fetch_assoc()) {
    $url = $row['image'];
    $title = $row['title'];
    $doneby = $row['user'];
    $desc = $row['descri'];
    $tags = $row['tags'];
}

 ?>
