<!--
	Title: Bhmui Creatives - Project Home Page for general users
-->
<!DOCTYPE html>
<html>
<head>
	<title>Projects | Bhumi</title>
	<link rel="icon" type="image/png" href="assets/img/siteicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/projects.css">
	<link rel="stylesheet" type="text/css" href="styles/projects.css">
	<link rel="stylesheet" type="text/css" href="lib/buttons/gradient.css">
	<link rel="stylesheet" type="text/css" href="lib/textbox-css/textbox.css">
	<link rel="stylesheet" type="text/css" href="lib/buttons/material-circle.css">
	<link rel="stylesheet" type="text/css" href="styles/projects.css">
	<link rel="stylesheet" type="text/css" href="assets/css/display.css">
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
	<link rel="stylesheet" type="text/css" href="lib/buttons/gradient.css">
	<link rel="stylesheet" type="text/css" href="lib/font-awesome/4.7.0/css/font-awesome.css">

</head>

<body>
	<!-- Too Lazy for Padding -->
	<?php
		include 'header.php';
		include 'connection.php';

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
				echo "<div class='w3-btn w3-col m4 l3'><div class='w3-display-container'><a onclick='redir()'><img name='".$title."' class='projectImg rounded w3-hover-opacity' id='".$row['pid']."' src='".$url."' alt='Not able to display' /><div class='w3-display-topright w3-padding'>";
                $q1 = "SELECT * FROM likes WHERE pid='".$row['pid']."' AND uname='".$user."';";
                $rs1 = $conn->query($q1);
                $q2 = "SELECT count(uname) FROM likes WHERE pid='".$row['pid']."';";
                $rs2 = $conn->query($q2);
                $row2 = $rs2->fetch_assoc();
                if($rs1->num_rows !=0)
                    echo "<button class='likebt' ><a href='like.php?desid=".$row['pid']."&status=1' style='text-decoration:none'><img src='assets/images/liked.png' class='likes'> ".$row2['count(uname)']."</a></button></div></div><br>";
                else
				    echo "<button class='unlikebt' ><a href='like.php?desid=".$row['pid']."&status=0' style='text-decoration:none'><img src='assets/images/unlike.gif' class='likes changeImg'> ".$row2['count(uname)']."</a></button></div></div><br>";

				echo "<center><b>".ucfirst($title)."<br>Tags:</b> ".$row['tags']."</center></a></div>";
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
	<!-- Call footer.php for Footer Bar-->
	<!--Footer to be added-->

</body>
</html>
