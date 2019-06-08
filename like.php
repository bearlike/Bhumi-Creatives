<?php
    $servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "uplabs";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

session_start();
$desid=$_GET['desid'];
$uid= $_SESSION["user"];
$status=$_GET['status'];
if($status==0){
$q1="insert into likes values('".$desid."','".$uid."');";
$result = $conn->query($q1);}
if($status==1){
    $q1="delete from likes where pid='".$desid."' and uname='".$uid."';";
    $result = $conn->query($q1);}

    $conn->close();
    header('location:projects.php');
    
    








?>