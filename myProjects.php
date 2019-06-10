<!DOCTYPE html>
<html>
<head>
	<title>My Projects</title>

 	<link rel="stylesheet" type="text/css" href="styles/myProjects.css">
 	<link rel="stylesheet" type="text/css" href="styles/styles.css">

</head>
<body>

	<?php
		include 'header.php';
		include 'connection.php';

	session_start();

	if(isset($_SESSION['user']))
		$user = $_SESSION['user'];
	else
		header("Location:index.php");

	if ( isset($_SESSION['msg']) )
	{
    	echo "<div class='w3-panel w3-green w3-card-4 w3-display-container w3-margin'>
    		<span onclick=\"this.parentElement.style.display='none'\"
			class='w3-button w3-display-topright'>&times;</span> 
    		<h3>Success!</h3>
  			<p>".$_SESSION['msg']."</p>
			</div>";
		unset($_SESSION['msg']);
	}

	echo "<a href='resetPassPro.php' style='float: right'><button class='button'>Reset Password</button></a>";

	$sql = "SELECT * FROM project WHERE uname='".$user."';";
	$result = $conn->query($sql);

		if ($result->num_rows > 0){
              $id=0;
			echo "<h2 class='w3-container'>Your Projects are -</h2>";
			while($row = $result->fetch_assoc()){
				$title = $row["title"];
				$url = $row["image"];
				echo "<div class='w3-btn w3-col m4 l3'><a onclick='redir()'><img name='".$title."' class='projectImg' id='".$row['pid']."' src='".$url."' alt='Not able to display' /><br>";
				
				echo "<center><b>".$title."<br>Tags </b>: ".$row['tags']."</center></a></div>";
			}
		}
		else{
			echo "<h3 class='w3-container'>No Projects submitted by you.</h3>";
		}

		$sql = "SELECT * FROM approval WHERE user='".$user."';";
		$result = $conn->query($sql);

		if ($result->num_rows > 0){
              $id=0;
			echo "<h2 class='w3-container'>Your Pending Approvals are -</h2>";
			while($row = $result->fetch_assoc()){
				$title = $row["title"];
				$url = $row["image"];
				echo "<div class='w3-btn w3-col m4 l3'><a><img name='".$title."' class='projectImgApp' id='".$row['pid']."' src='".$url."' alt='Not able to display' /><br>";
				
				echo "<center><b>".$title."<br>Tags </b>: ".$row['tags']."</center></a></div>";
			}
		}
		else{
			echo "<h3 class='w3-container'>No Pending Approvals.</h3>";
		}
		$conn->close();
	?>

	<script type='text/javascript'>
		function redir() {
			window.open('imgDisplay.php?pid='+event.srcElement.id,'_self');
		}
	</script>

</body>
</html>