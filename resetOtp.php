<!--
	Title: Bhmui Creatives - Reset OTP
-->
<!DOCTYPE html>
<html>
<head>
	<title>Reset OTP</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="styles/styles.css">
	<link rel="icon" type="image/png" href="assets/img/siteicon.png" />
</head>
<body>

	<?php
		session_start();

		if(isset($_SESSION['otp']))
			$otp = $_SESSION['otp'];
		else
			header("Location:index.php");

		if(isset($_POST['subOtp']))
		{
			include 'connection.php';

			if($otp == $_POST['otp'])
			{
				unset($_SESSION['otp']);
				header('location:resetPass.php');
				exit();
			}
			else{
				echo "<center><h3>Incorrect OTP. Try again!!</h3></center>";
			}
			$conn->close();
		}
	?>

	<center>

		<form method="post" action="resetOtp.php" class="log">
			<h2>Reset OTP</h2>
			OTP : <input type="text" name="otp" maxlength="6" pattern="\d{6}" placeholder="Enter 6 digit OTP" required/><br><br>
			<input type="submit" name="subOtp" value="Submit OTP" class="button" /><br><br>
			( *Do not close this window in this step. )
		</form>
	</center>

</body>
</html>
