<!DOCTYPE html>
<html>
<head>
	<title>Image</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="styles/styles.css">

	
</head>
<body>
	<ul id='top'>
  		<li class="topnav"><a href="projectsAdmin.php">Home</a></li>
  		<li class="topnav"><a href="approval.php">Requets</a></li>
  		<li class="topnav" style="float:right"><a href="logout.php">LogOut</a></li>
  		<li style="float:right"><a href="notificationAdmin.php">All Notifications</a></li>
	</ul>

	<?php
		session_start();

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

		$user = $_SESSION['user'];
		$pid = $_GET['pid'];

		$sql = "SELECT * FROM project WHERE pid='".$pid."';";
		$result = $conn->query($sql);

		$url = null;
		if($row = $result->fetch_assoc())
		{	
			$url = $row['image'];
			$title = $row['title'];
			$doneby = $row['uname'];
			$tags = $row['tags'];
		}

		echo "<div class='w3-cell-row' style='width:100%;padding:20px;'><div class='w3-container w3-cell w3-mobile w3-col m6 l6 w3-image'><img src='".$url."' class='disImg' alt='Not Able to Display' /></div>";

		echo "<div class=' w3-container w3-cell w3-mobile w3-cell-middle w3-col m6 l6'><center><h2>".$title."</h2>by ".$doneby."<br><br><br><b>Tags</b> : ".$tags."<br><br><br>".$row['downloads']." Downloads<br><br><br>";

		echo "<form action='download.php?pid=".$pid."&type=i' method='post'><input type='submit' class='button' value='Download Now'/></form><br>";
        echo "<form action='download.php?pid=".$pid."&type=s' method='post'><button class='button'>Download Source File</button></form></center></div></div>";

		?>

</body>
</html>