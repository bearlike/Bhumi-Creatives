<!--
	Title: Bhmui Creatives - Notifications Page for General Users
-->
<!DOCTYPE html>
<html>
<head>
	<title>Notification</title>
 	<link rel="stylesheet" type="text/css" href="styles/styles.css"/>
	<link rel="icon" type="image/png" href="assets/img/siteicon.png" />
</head>

<body>

	<?php
		include 'header.php';
		include 'connection.php';
		session_start();
		if(isset($_SESSION['user']))
			$user = $_SESSION['user'];
		else
			header("Location:index.php");
		$sql = "SELECT * FROM notification WHERE uname='".$user."';";
		$result = $conn->query($sql) or die($conn->error);
		if ($result->num_rows > 0){
			echo "<h3 class='w3-container'>Notifications</h3>";
			while($row = $result->fetch_assoc()){
				$message = $row['message'];
				$dates = $row['dateCheck'];
				echo "<br><div class='w3-container'>".$dates."<br><b>Message</b>: ".$message."</div>";
				$sql = "UPDATE notification SET status='read' WHERE uname='".$user."';";
				$result1 = $conn->query($sql);
			}
		}
		else{
			echo "<h3 class='w3-container'>All Notifications Read.</h3>";
		}
		$conn->close();
	?>
	<!-- Call footer.php for Footer Bar-->
	<?php include "footer.php"; ?>

</body>
</html>
