<!DOCTYPE html>
<html>
<head>
	<title>Projects Admin | Bhumi</title>
	<link rel="icon" type="image/png" href="assets/img/siteicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
 	<link rel="stylesheet" type="text/css" href="lib/textbox-css/textbox.css">
	<link rel="stylesheet" type="text/css" href="styles/projects.css">
 	<link rel="stylesheet" type="text/css" href="styles/styles.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/balzss/luxbar/ae5835e2/build/luxbar.min.css">
</head>
<!-- Navigation Bar Open -->
<header id="luxbar" class="luxbar-fixed">
  <input type="checkbox" class="luxbar-checkbox" id="luxbar-checkbox" />
  <div class="luxbar-menu luxbar-menu-right luxbar-menu-dark">
    <ul class="luxbar-navigation">
      <li class="luxbar-header">
        <a href="#" class="luxbar-brand"><img src="assets/img/logo.png" style="width: 40%; height: 40%" alt="Bhumi Logo"></a> <label class="luxbar-hamburger luxbar-hamburger-doublespin" id="luxbar-hamburger" for="luxbar-checkbox">
          <span></span>
        </label>
      </li>
      <li class="luxbar-item"><a class="active" href="projectsAdmin.php">Home</a></li>
      <li class="luxbar-item"><a href="approval.php">Requets</a></li>
      <li class="luxbar-item">
			<a>
				<!-- Search Bar -->
				<form action='filteredAdmin.php' method='post'>
					<input type='text' name='filter' class="textbox7" placeholder='Filter by tags' required/>
      		<input type='submit' value='Filter' />
 				</form>
			  </a>
			</li>
			<li class="luxbar-item"><a href="notificationAdmin.php">Notifications</a></li>
      <li class="luxbar-item"><a href="logout.php">Sign Out</a></li>
    </ul>
  </div>
</header>
<!-- Navigation Bar Close -->
<!-- Body Opens -->
<body>
	<br><br><br><!-- Too Lazy for Padding -->
	<!-- PHP Open -->
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
	<!-- PHP Close -->
	<script type='text/javascript'>
		function redir() {
			window.open('imgDisplayAdmin.php?pid='+event.srcElement.id,'_self');
		}
	</script>
</body>
<!-- Body Closes -->
</html>
