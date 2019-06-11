<!--
	Title: Bhmui Creatives - Uverify Account
-->
<!DOCTYPE html>
<html>
<head>
	<title>Account Not Verified</title>
	<link rel="icon" type="image/png" href="assets/img/siteicon.png" />
</head>
<body>

	<?php
		include 'connection.php';

		$uid = $_GET['uid'];

		$sql = "DELETE FROM ulogin WHERE uid='".$uid."';";
		$result = $conn->query($sql);

		echo "<center><h3>Your Account has been removed.</h3></center>";

		sleep(20);

		$conn->close();

		header('location:signup.php');
		exit();
	?>

</body>
</html>
