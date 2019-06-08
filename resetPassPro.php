<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>

	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>

	<?php
		if(isset($_POST['subPass']))
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

			$user = $_SESSION['user'];

			$pass = $_POST['pass'];
			$conPass = $_POST['conPass'];

			if($pass == $conPass)
			{
				$sql = "UPDATE ulogin SET password='".$pass."' WHERE uname='".$user."';";
				$result = $conn->query($sql);

        		$_SESSION['msg'] = "Your Password has been changed successfully.";
        		header('location:myProfile.php');
        		exit();
			}
			else{
				echo "<center><h3>Both Passwords not same.Try again !!</h3></center>";
			}
		}

	?>

	<center>
		<form method="post" action="resetPassPro.php" class="log">
			<h3>RESET PASSWORD</h3>
			<br>New Password : <input type="password" name="pass" placeholder="Enter Password" required/><br><br>
			Confirm New Password : <input type="password" name="conPass" placeholder="Enter Confirm Password" required/><br><br>
			<input type="submit" name="subPass" value="Change Password" class="button" />
		</form>
	</center>

</body>
</html>