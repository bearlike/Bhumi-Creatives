<!DOCTYPE html>
<html>
<head>
	<title>Projects</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdn.rawgit.com/balzss/luxbar/ae5835e2/build/luxbar.min.css">
 	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<header id="luxbar" class="luxbar-fixed">
    <input type="checkbox" class="luxbar-checkbox" id="luxbar-checkbox"/>
    <div class="luxbar-menu luxbar-menu-right luxbar-menu-dark">
        <ul class="luxbar-navigation">
            <li class="luxbar-header">
                <a href="#" class="luxbar-brand">Bhumi</a>
                <label class="luxbar-hamburger luxbar-hamburger-doublespin"
                id="luxbar-hamburger" for="luxbar-checkbox"> <span></span> </label>
            </li>
            <li class="luxbar-item"><a href="projects.php">Home</a></li>
            <li class="luxbar-item"><a href="myProjects.php">Projects</a></li>
            <li class="luxbar-item"><a href="uploading.php">Uploads</a></li>
            <li class="luxbar-item"><a href="notification.php">Notification </a></li>
            <li class="luxbar-item"><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</header>
<body>
<!--	<ul>
  		<li><a href="projects.php">Home</a></li>
  		<li><a href="myProjects.php">My Projects</a></li>

 		<li><a href="uploading.php">Upload</a></li>
 		<li style="float:right"><a href="logout.php">LogOut</a></li>
 		<li style="float:right"><a class="active" href="notification.php">Notification</a></li>
	</ul>
-->

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

		session_start();

		if(isset($_SESSION['user']))
			$user = $_SESSION['user'];
		else
			header("Location:index.php");

		$sql = "SELECT * FROM notification WHERE uname='".$user."';";
		$result = $conn->query($sql) or die($conn->error);

		if ($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$message = $row['message'];
				$dates = $row['dateCheck'];

				echo "<br>".$dates."<br><b>Message</b> - ".$message."<br><br>";

				$sql = "UPDATE notification SET status='read' WHERE uname='".$user."';";
				$result1 = $conn->query($sql);
			}
		}
		else{
			echo "<h3>No Notifications to Display.</h3>";
		}
	?>

</body>
</html>
