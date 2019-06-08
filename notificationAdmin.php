<!DOCTYPE html>
<html>
<head>
	<title>All Notifications</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<link rel="stylesheet" type="text/css" href="styles/styles.css">

</head>
<body>
	<ul>
  		<li><a href="projectsAdmin.php">Home</a></li>
  		<li><a href="approval.php">Requets</a></li>
  		<li style="float:right"><a href="logout.php">LogOut</a></li>
 		<li style="float:right"><a class="active" href="notificationAdmin.php">All Notifications</a></li>
	</ul>


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

		if( isset($_GET['clear']) )
		{
			$sql = "DELETE FROM notification WHERE status='read';";
			$result = $conn->query($sql);
		}

		session_start();
		$user = $_SESSION['user'];

		$sql = "SELECT * FROM notification;";
		$result = $conn->query($sql) or die($conn->error);

		if ($result->num_rows > 0){
			echo "<center><button onclick='clearN()' class='button'>Clear Read Notification</button></center>";

			while($row = $result->fetch_assoc()){
				$message = $row['message'];
				$dates = $row['dateCheck'];
				
				echo "<br>User - ".$row['uname']."<br>Dated on - ".$dates."<br><b>Message</b> - ".$message."<br>
				Status - ".$row['status']."<br><br>";
			}
		}
		else{
			echo "<h3>No Unread Notifications to Display.</h3>";
		}
	?>

	<script type="text/javascript">
		function clearN() {
			window.open("notificationAdmin.php?clear=y","_self");
		}
	</script>

</body>
</html>