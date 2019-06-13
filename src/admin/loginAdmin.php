<!--
	Title: Bhmui Creatives - Moderator Login Site
	Description: Login portal for Moderators within Bhumi
-->
<html>
	<!-- Head Open -->
	<head>
		<!-- Page Title Open-->
		<title>Moderator | Login</title>
		<!-- Page Title Close-->
		<!-- Site Icon Open-->
		<link rel="icon" type="image/png" href="assets/img/siteicon.png">
		<!-- Site Icon Close-->
		<!-- CSS Stylesheets Here -->
		<link rel="stylesheet" type="text/css" href="../../assets/css/login.css">
		<link rel="stylesheet" type="text/css" href="../../assets/css/footer.css">
		<link rel="stylesheet" type="text/css" href="../../assets/css/styles.css">
		<link rel="stylesheet" type="text/css" href="../../assets/css/my-login.css">
		<link rel="stylesheet" href="../../lib/bootstrap/4.0.0/css/bootstrap.min.css">
		<!-- Fonts Here -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	</head>
	<!-- Head Close -->
	<!-- Body Open -->
	<body>
		<div class="my-login-page">
		<!-- PHP Open -->
		<?php
			/* For Logging the moderator in using User Name and Password Provided*/
				if (isset($_POST['submit'])) {
				/*Server mysqldb Address*/
		    $servername = "localhost";
				/*Username of the mysqldb server*/
				$username = "root";
				/*Password of the mysqldb server*/
		    $password = "";
				/*Name of the Database*/
		    $dbname = "uplabs";
		    /*Create connection*/
		    
		    $conn = new mysqli($servername, $username, $password, $dbname);
		    /*Check connection*/
		    if ($conn->connect_error) {
		        die("Connection failed: " . $conn->connect_error);
		    }
		    /*echo "Connected successfully";
		    */
		    $sql = "SELECT * FROM admin";
		    $result = $conn->query($sql);
		    $user = $_POST["user"];
		    $pass = $_POST["pass"];
		    if ($result->num_rows > 0) {
		        /*output data of each row*/
		        $found = FALSE;
		        while ($row = $result->fetch_assoc()) {
		            if ($user == $row["uname"]) {
		                $found = TRUE;
		                if ($pass == $row["password"]) {
		                    $_SESSION["user"] = $row["uname"];
		                    header("Location:projectsAdmin.php");
		                    exit();
		                } else {
		                    echo "\n<center><h3>Incorrect password</h3></center>";
		                }
		            }
		        }
		        if ($found == FALSE) {
		            echo "\n<center><h3>Invalid User. Try again!!</h3></center>";
		        }
		    } else {
		        echo "0 results";
		    }
		    $conn->close();
			}
		?>
		<!-- PHP Close -->
		<section class="h-100">
			<div class="container h-100">
				<div class="row justify-content-md-center h-100">
					<div class="card-wrapper">
						<div class="brand">
							<img src="../../assets/img/logo.jpg" alt="Bhumi logo">
						</div>
						<div class="card fat">
							<div class="card-body">
								<form action="loginAdmin.php" method="POST">
									<h4 class="card-title">Moderator Login</h2>
										<div class="form-group">
											<input class="form-control" type="text" name="user" placeholder="Enter Email" required><br>
											<input class="form-control" type="Password" name="pass" placeholder="Enter Password" required><br>
											<!-- Submit Credentials as POST-->
											<input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block">
										</div>
										<center>
											Contact your administartor, if any problem with login exist
										</center>
								</form>
							</div>
						</div>
						<!-- Footer section -->
						<section class="footer-section">
							<div class="social-links-warp">
								<p class="text-white text-center mt-2">Came here by mistake?<br><a href="../index.php">Click here to go back to User Login!</a></p>
							</div>
						</section>
						<!-- Footer section end -->
	</body>
	<!-- Body Close -->
</html>
