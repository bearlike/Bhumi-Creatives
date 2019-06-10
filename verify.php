<!DOCTYPE html>
<html>
<head>
	<title>Account Verification</title>
</head>
<body>

	<?php
		include 'connection.php';

		$uid = $_GET['uid'];

		$sql = "UPDATE ulogin SET verified='yes' WHERE uid='".$uid."';";
		$result = $conn->query($sql);

		echo "<center><h3>Your Account has been verified. Now you can login.</h3></center>";

		sleep(20);

		$conn->close();

		header('location:index.php');
		exit();

	?>

</body>
</html>