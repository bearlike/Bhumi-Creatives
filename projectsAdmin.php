<!DOCTYPE html>
<html>
<head>
	<title>Projects Admin | Bhumi</title>
	<link rel="icon" type="image/png" href="assets/img/siteicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/balzss/luxbar/ae5835e2/build/luxbar.min.css">
 	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
 	<link rel="stylesheet" type="text/css" href="lib/textbox-css/textbox.css">
	<link rel="stylesheet" type="text/css" href="lib/buttons/material-circle.css">
	<link rel="stylesheet" type="text/css" href="styles/projects.css">
	<link rel="stylesheet" type="text/css" href="assets/css/display.css">
 	<link rel="stylesheet" type="text/css" href="styles/styles.css">
	<link rel="stylesheet" type="text/css" href="lib/buttons/gradient.css">
	<link rel="stylesheet" type="text/css" href="lib/font-awesome/4.7.0/css/font-awesome.css">
</head>

<!-- Body Opens -->
<body class="grey">
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
				echo "<div class='w3-btn w3-col m4 l3'><a onclick='redir()'><img name='".$title."' class='projectImg rounded w3-hover-opacity' id='".$row['pid']."' src='".$url."' alt='Unable to display' /><br>";

				echo "<center><b>".ucfirst($title)."<br>Tags</b>: ".$row['tags']."<br>";
				echo "<form method='post' action='delete.php?pid=".$row['pid']."'><input class='w3-button w3-blue w3-round-medium' type='submit' name='delete' value='Delete'></form></center></a></div>";
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
