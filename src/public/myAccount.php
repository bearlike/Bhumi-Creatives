<!--
	Title: Bhmui Creatives - My Projects Page for users
	Description: Displays projects done by @user
-->
<!DOCTYPE html>
<html>
<head>
	<title>My Projects</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../../assets/img/siteicon.png" />
 	<link rel="stylesheet" type="text/css" href="../../assets/css/myProjects.css">
 	<link rel="stylesheet" type="text/css" href="../../assets/css/gen/styles.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/buttons.css">
</head>
<body>

	<?php
		include 'header.php';
		include '../common/connection.php';

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
		echo "<p><a href='resetPassPro.php' style='float:right'><button class='blue button'>Reset Password</button></a></p>";

		$sql = "SELECT * FROM project WHERE uname='".$user."';";
		$result = $conn->query($sql);

			if ($result->num_rows > 0){
	              $id=0;
				echo "<h2 class='w3-container'>Approved Projects</h2>";
				while($row = $result->fetch_assoc()){
					$title = $row["title"];
					$url = $row["image"];
					echo "<div class='w3-btn w3-col m4 l3'><a onclick='redir()'><img name='".ucfirst($title)."' class='projectImg rounded w3-hover-opacity' id='".$row['pid']."' src='".$url."' alt='Not able to display' /><br>";

					echo "<center><b>".ucfirst($title)."<br>Tags:</b> ".$row['tags']."</center></a></div>";
				}
			}
			else{
				echo "<h3 class='w3-container'>No Projects submitted by you.</h3>";
			}

			$sql = "SELECT * FROM approval WHERE user='".$user."';";
			$result = $conn->query($sql);

			if ($result->num_rows > 0){
	              $id=0;
				echo "<h2 class='w3-container'>Pending Approvals</h2>";
				while($row = $result->fetch_assoc()){
					$title = $row["title"];
					$url = $row["image"];
					echo "<div class='w3-btn w3-col m4 l3'><a><img name='".$title."' class='projectImgApp' id='".$row['pid']."' src='".$url."' alt='Not able to display' /><br>";

					echo "<center><b>".ucfirst($title)."<br>Tags:</b> ".$row['tags']."</center></a></div>";
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
	<!-- Call footer.php for Footer Bar-->
	<!--Footer to be added-->

</body>
</html>
