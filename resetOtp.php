<!DOCTYPE html>
<html>
<head>
	<title>Reset OTP</title>

	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>

	<?php

		if(isset($_POST['subOtp']))
		{
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

			if($_SESSION['otp'] == $_POST['otp'])
			{
				header('location:resetPass.php');
				exit();
			}
			else{
				echo "<center><h3>Incorrect OTP. Try again!!</h3></center>";
			}
		}
	?>

	<center>

		<form method="post" action="resetOtp.php" class="log">
			<h2>Reset OTP</h2>
			OTP : <input type="text" name="otp" maxlength="6" pattern="\d{6}" placeholder="Enter 6 digit OTP" required/><br><br>
			<input type="submit" name="subOtp" value="Submit OTP" class="button" />
		</form>
	</center>

</body>
</html>