<!--
	Title: Bhmui Creatives - User Login Site
	Description: Login portal for general audience. (Outside Bhumi)
-->
<html>
	<!-- Head Open -->
	<head>
		<!-- Page Title Open-->
		<title>User | Login</title>
		<!-- Page Title Close-->
		<!-- Site Icon Open-->
		<link rel="icon" type="image/png" href="assets/img/siteicon.png">
		<!-- Site Icon Close-->
		<!-- CSS Stylesheets Here -->
		<link rel="stylesheet" type="text/css" href="assets/css/login.css">
		<link rel="stylesheet" type="text/css" href="assets/css/footer.css">
		<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
		<link rel="stylesheet" type="text/css" href="assets/css/unite.css">
		<link rel="stylesheet" type="text/css" href="assets/css/my-login.css">
		<!-- Fonts Here -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
	</head>
	<!-- Head Close -->
	<!-- Body Open -->
	<body>
		<div class="my-login-page">
		<!-- PHP Open -->
		<?php
			if (isset($_POST['submit'])) {
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
	    $sql = "SELECT * FROM ulogin";
	    $result = $conn->query($sql);
	    $user = $_POST["user"];
	    $pass = $_POST["pass"];
	    if ($result->num_rows > 0) {
	        // output data of each row
	        $found = FALSE;
	        while ($row = $result->fetch_assoc()) {
	            if ($user == $row["email"]) {
	                $found = TRUE;
	                if ($pass == $row["password"]) {
	                    if ($row['verified'] != 'yes') {
	                        echo "\n<center><h3>Verify your account using the mail sent to your E-Mail.</h3></center>";
	                    } else {
	                        $_SESSION["user"] = $row["uname"];
	                        header("Location:projects.php");
	                        exit();
	                    }
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
								<img src="assets/img/logo.jpg" alt="logo">
							</div>
							<div class="card fat">
								<div class="card-body">
									<form action="index.php" method="POST">
			 							<h4 class="card-title">Login</h2>
										<div class="form-group">
											<input type="text" class="form-control" name="user" placeholder="Enter Email" required><br>
											<input type="Password" class="form-control" name="pass" placeholder="Enter Password" required><br>
											<input type="submit" class="btn btn-primary btn-block" name="submit" value="Submit" class="button">
										</div>
										<center>
											<a href="public/forgetpass.php">Forgot Password?</a>
											<br>Don't have an account? <a href="public/signup.php">SignUp</a>
										</center>
									</form>
								</div>
							</div>
								<!-- Footer section -->
								<section class="footer-section">
									<div class="social-links-warp">
										<p class="text-white text-center mt-2">Looking for Moderator Login?<br><a href="loginAdmin.php">Click here!</a></p>
									</div>
								</section>
								<!-- Footer section end -->
		</body>
		<!-- Body Close -->
</html>
