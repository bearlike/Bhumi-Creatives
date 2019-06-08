<!DOCTYPE html>
<html>
<head>
	<title>Account Verification</title>
</head>
<body>

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

		$uid = $_GET['uid'];

		$sql = "DELETE FROM ulogin WHERE uid='".$uid."';";
		$result = $conn->query($sql);

		echo "<center><h3>Your Account has been removed.</h3></center>";

		sleep(20);

		header('location:signup.php');
		exit();

	?>

</body>
</html>