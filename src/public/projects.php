<!--
	Title: Bhmui Creatives - Project Home Page for general users
-->
<!DOCTYPE html>
<html>
<head>
	<title>Projects | Bhumi</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../../assets/img/siteicon.png">
	<link rel="stylesheet" type="text/css" href="../../assets/css/gen/projects.css">
	<link rel="stylesheet" type="text/css" href="../../lib/textbox-css/textbox.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/display.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/gen/styles.css">
	<link rel="stylesheet" type="text/css" href="../../lib/buttons/gradient.css">
	<link rel="stylesheet" type="text/css" href="../../lib/font-awesome/4.7.0/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="../../lib/css/luxbar.min.css">
<link rel="stylesheet" type="text/css" href="../../lib/css/w3.css">
<link rel="stylesheet" type="text/css" href="../../lib/font-awesome/4.7.0/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="../../lib/buttons/material-circle.css">
<link rel="stylesheet" type="text/css" href="../../assets/css/buttons.css">

<link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway&display=swap" rel="stylesheet"> 
<style>
		body{      
			font-family: 'Raleway', sans-serif;
		font-family: 'Open Sans', sans-serif;
		}

</style>
  
</head>

<body>
	<!-- Too Lazy for Padding -->
	
	<?php
	session_start();
	include 'header.php';
	?>

	<div class='container-fluid p-3 '>
			<div class="jumbotron jumbotron-fluid">
					<div class="container">
					  <h1 class="display-4"><center>What are you looking for?</center></h1>
					  <p class="lead"><center>Pictures, videos, or design files?</center></p>
					</div>
				  </div>
		<div class="row">
		<?php
		include '..//common//connection.php';

    
		if(isset($_SESSION['user']))
			$user = $_SESSION['user'];
		else
			header("Location:../index.php");
		
		$sql = "SELECT * FROM project;";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			$id=0;
			
			while ($row = $result->fetch_assoc()){
				$title = $row["title"];
				$url = $row["image"];
				echo "<div class='w3-btn w3-col m4 l3 '>
					<div class='card w3-display-container'>
						<a onclick='redir()'><img name='".$title."' class='projectImg rounded w3-hover-opacity' id='".$row['pid']."' src='../../".$url."' alt='Not able to display' />
							<div class='w3-display-topright w3-padding'>";
	   
		
		
		
		
					$q1 = "SELECT * FROM likes WHERE pid='".$row['pid']."' AND uname='".$user."';";
        $rs1 = $conn->query($q1);
        $q2 = "SELECT count(uname) FROM likes WHERE pid='".$row['pid']."';";
        $rs2 = $conn->query($q2);
        $row2 = $rs2->fetch_assoc();
        if($rs1->num_rows !=0)
            echo "<button class='button small red likebt'>
				<a href='like.php?desid=".$row['pid']."&status=1' style='text-decoration:none'><img src='../../assets/images/liked.png' class='likes'> ".$row2['count(uname)']."</a>
			</button>
		</div>
	</div>
	<br>";
		
		
		
		
			else
				   echo "<button class='button small unlikebt' >
					   <a href='like.php?desid=".$row['pid']."&status=0' style='text-decoration:none'><img src='../../assets/images/unlike.gif' class='likes changeImg'> ".$row2['count(uname)']."
					</a></button></div></div><br>";

				$maxLen = 25;
				$tags = $row['tags'];
				// Tags Normalisation
				$tags = $row['tags'];
				$tags = str_replace(",,","",$tags);
				$tags = str_replace(" , ","",$tags);
				$tags = str_replace(", ",",",$tags);
				$tags = str_replace(" ,",",",$tags);
				$tags = str_replace(",",", ",$tags);

				if(strlen($tags) > $maxLen)
				{
					$tags = substr($tags, 0, $maxLen);
					$tags = $tags."...";
				}

				echo "<center><b>".ucfirst($title)."<br>Tags:</b> ".$tags."</center></a></div>";
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
</div>
	</div>
	<?php include "..//common//footer.php"; ?>

</body>
</html>
