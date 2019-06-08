<!DOCTYPE html>
<html>
<head>
	<title>Approvals</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <link rel="stylesheet" href="styles/approval.css">
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
	<ul>
  		<li><a href="projectsAdmin.php">Home</a></li>
  		<li><a class="active" href="approval.php">Requets</a></li>
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

		$sql = "SELECT * FROM approval;";
		$result = $conn->query($sql);

		if ($result->num_rows > 0){
			echo "<table><tr>";
      $id=0;
			while($row = $result->fetch_assoc()){
				$title = $row["title"];
				$url = $row["image"];
				 if($id%2==0)
        { $id=0;
          echo "<tr></tr>";
        }
				echo "<div ><table><tr><td><img name='".$title."' class='projectImg' id='".$url."' src='".$url."' alt='Not able to display' />";
				echo "<br><center>".$title."<br>Tags:".$row['tags']."<center></td>";
                echo "<td><button><a class='but' href='approved.php?pid=".$row['pid']."&stat=A'>APPROVE</a></button><button><a class='but' href='approved.php?pid=".$row['pid']."&stat=D'>DECLINE</a></button><div></td></tr>";
			}echo "</tr></table>";
		}
		else{
			echo "<h3>No Projects to Display.</h3>";
		}
	?>

	
</body>
</html>