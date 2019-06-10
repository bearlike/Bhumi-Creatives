<!DOCTYPE html>
<html>
<head>
	<title>Projects Admin | Bhumi</title>	
 	
	<link rel="stylesheet" type="text/css" href="styles/projects.css">
 	<link rel="stylesheet" type="text/css" href="styles/styles.css">
	
</head>

<!-- Body Opens -->
<body>
	<br><br><br><!-- Too Lazy for Padding -->
	<!-- PHP Open -->
	<?php
		include 'headerAdmin.php';
		include 'connection.php';
		
		session_start();

		if(isset($_SESSION['user']) && $_SESSION['user'] == "admin")
			$user = $_SESSION['user'];
		else
			header("Location:loginAdmin.php");

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
	<!-- PHP Close -->
	<script type='text/javascript'>
		function redir() {
			window.open('imgDisplayAdmin.php?pid='+event.srcElement.id,'_self');
		}
	</script>
</body>
<!-- Body Closes -->
</html>
