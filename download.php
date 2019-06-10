<?php
	include 'connection.php';

	session_start();

	$pid = $_GET['pid'];
    $type = $_GET['type'];

	$sql = "SELECT * FROM project WHERE pid='".$pid."';";
	$result = $conn->query($sql);

	if( $type == 'i' && $row = $result->fetch_assoc() )
	{
		$url = $row['image'];
		$title = $row['title'];
		$ext = pathinfo($url, PATHINFO_EXTENSION);

		$fileName = $title .".". $ext;
		header('Content-disposition: attachment; filename="'.$fileName.'"');
		readfile($url);
	}

    else if( $type == 's' && $row = $result->fetch_assoc() )
	{
		$url = $row['source_file'];
		$title = $row['title'];
		$ext = pathinfo($url, PATHINFO_EXTENSION);

		$fileName = $title .".". $ext;
		header('Content-disposition: attachment; filename="'.$fileName.'"');
		readfile($url);
	}
	
	if( $_SESSION['user'] != 'admin')
	{
		$sql = "UPDATE project SET downloads=downloads+1 WHERE pid='".$pid."'";
		$result = $conn->query($sql);
	}
	
	$conn->close();
?>