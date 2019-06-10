<?php
	include 'connection.php';

	$pid = $_GET['pid'];

	$sql = "SELECT * FROM project WHERE pid='".$pid."';";
	$result = $conn->query($sql);

	if($row = $result->fetch_assoc())
	{
		if (!unlink($row['image']))
                echo ("Error deleting image");

        if (!unlink($row['source_file']))
                echo ("Error deleting source");

        $sql = "INSERT INTO notification VALUES('".$row['uname']."','".$row['title']." has been removed by Admin',CURDATE(),'unread');";
        $result = $conn->query($sql);
	}

	$sql = "DELETE FROM project WHERE pid='".$pid."';";
	$result = $conn->query($sql);

	$conn->close();

	header('location:projectsAdmin.php');
	exit();
?>