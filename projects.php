<!DOCTYPE html>
<html>
<head>
	<title>Projects</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<link rel="stylesheet" type="text/css" href="styles/projects.css">
	<link rel="stylesheet" type="text/css" href="styles/styles.css">

</head>
<body>
	<ul>
  		<li><a class="active" href="projects.php">Home</a></li>
  		<li><a href="myProjects.php">My Projects</a></li>
 		
 		<li><a href="uploading.php">Upload</a></li>
 		<li><form action='filtered.php' method='post'><a><input type='text' name='filter' placeholder='Filter by tags' required/>
            <input type='submit' value='Filter' /></a>
 		</form></li>
  		<li style="float:right"><a href="logout.php">LogOut</a></li>
  		<li style="float:right"><a href="notification.php">Notification</a></li>
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
			$id=0;
			echo "<table><tr>";
			while($row = $result->fetch_assoc()){
				$title = $row["title"];
				$url = $row["image"];
				echo "<div class='w3-btn w3-col m4 l3'><div class='w3-display-container'><a onclick='redir()'><img name='".$title."' class='projectImg w3-hover-opacity' id='".$row['pid']."' src='".$url."' alt='Not able to display' /><div class='w3-display-topright w3-padding'>";
                
                $q1 = "SELECT * FROM likes WHERE pid='".$row['pid']."' AND uname='".$user."';";
                $rs1 = $conn->query($q1);

                $q2 = "SELECT count(uname) FROM likes WHERE pid='".$row['pid']."';";
                $rs2 = $conn->query($q2);
                $row2 = $rs2->fetch_assoc();
                
                if($rs1->num_rows !=0)
                    echo "<button class='likebt' ><a href='like.php?desid=".$row['pid']."&status=1' style='text-decoration:none'><img src='images/liked.png' class='likes'> ".$row2['count(uname)']."</a></button></div></div><br>";          
                else
				    echo "<button class='unlikebt' ><a href='like.php?desid=".$row['pid']."&status=0' style='text-decoration:none'><img src='images/unlike.gif' class='likes changeImg'> ".$row2['count(uname)']."</a></button></div></div><br>";

				echo "<center><b>".$title."<br>Tags </b>: ".$row['tags']."</center></a></div>";
			}
		}
		else{
			echo "<h3>No Projects to Display.</h3>";
		}
	?>
	

	<script type='text/javascript'>
		function redir() {
			window.open('imgDisplay.php?pid='+event.srcElement.id,'_self');
		}
		
		
	</script>

</body>
</html>