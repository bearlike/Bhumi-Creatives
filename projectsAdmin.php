<!DOCTYPE html>
<html>
<head>
	<title>Projects Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

 	<link rel="stylesheet" type="text/css" href="styles/projects.css">
 	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
	<ul>
  		<li><a class="active" href="projectsAdmin.php">Home</a></li>
  		<li><a href="approval.php">Requets</a></li>
  		<li><a><form action='filteredAdmin.php' method='post'><input type='text' name='filter' placeholder='Filter by tags' required/>
            <input type='submit' value='Filter' />
 		</form></a></li>
  		<li style="float:right"><a href="logout.php">LogOut</a></li>
  		<li style="float:right"><a href="notificationAdmin.php">All Notifications</a></li>
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

		session_start();
		if(isset($_SESSION['user']))
    		$user = $_SESSION['user'];
  		else
    		header("Location:index.php");

		$sql = "SELECT * FROM project;";
		$result = $conn->query($sql);

		if ($result->num_rows > 0){
			echo "<table><tr>";
			$id=0;
			while($row = $result->fetch_assoc()){
				$title = $row["title"];
				$url = $row["image"];
				echo "<div class='w3-btn w3-col m4 l3'><a onclick='redir()'><img name='".$title."' class='projectImg w3-hover-opacity' id='".$row['pid']."' src='".$url."' alt='Not able to display' /><br>";
				
				echo "<center><b>".$title."<br>Tags </b>: ".$row['tags']."<br>";
				echo "<form method='post' action='delete.php?pid=".$row['pid']."'><input class='w3-button w3-blue w3-round-large' type='submit' name='delete' value='Delete'></form></center></a></div>";
			}
		}
		else{
			echo "<h3>No Projects to Display.</h3>";
		}
	?>

	<script type='text/javascript'>
		function redir() {
			window.open('imgDisplayAdmin.php?pid='+event.srcElement.id,'_self');
		}
	</script>

</body>
</html>