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
		<link rel="icon" type="image/png" href="../assets/img/siteicon.png">
		<!-- Site Icon Close-->
		<!-- CSS Stylesheets Here -->
		<link rel="stylesheet" type="text/css" href="../assets/css/login.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/footer.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/my-login.css">
		<!-- Fonts Here -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		<link rel="stylesheet" href="../lib/bootstrap/4.0.0/css/bootstrap.min.css">
	</head>
	<!-- Head Close -->
	<!-- Body Open -->
	<body>
		<div class="my-login-page">
		<!-- PHP Open -->
		<?php
					if(isset($_POST['submit']))
					{
						include "common//connection.php";

						session_start();

						$sql = "SELECT * FROM ulogin";
						$result = $conn->query($sql);

						$user = mysqli_real_escape_string($conn, $_POST['user']);
						$pass = mysqli_real_escape_string($conn, $_POST['pass']);

						if ($result->num_rows > 0)
						{

						    $found = FALSE;
						    while($row = $result->fetch_assoc())
						    {
						        if($user == $row["email"]) {
						            $found = TRUE;

						            $salted = '24@fu'.$pass.'45&deo';
									$hashed = hash('sha512', $salted);

						        	if($hashed == $row["password"])
						        	{

						        		if($row['verified'] != 'yes')
						        		{
						        			echo "\n<center><h3><p style='color:#fc0404'>Verify your account using the mail sent to your E-Mail.</p></h3></center>";
						        		}
						        		else
						        		{
		                                	$_SESSION["user"] = $row["uname"];
						        			header("Location:public/projects.php");
						        			exit();
						        		}

						        	}
						        	else
						        	{
						        		echo "\n<center><h3><p style='color:#fc0404'>Incorrect password</p></h3></center>";
						        	}
						        }
						    }
						    if( $found == FALSE )
						    {
						    	echo "\n<center><h3><p style='color:#fc0404'>This Email is not registered. Please register.</p></h3></center>";
						    }

						}
						else
						{
						    echo "0 results";
						}
						$conn->close();
					}
				?>		<!-- PHP Close -->
			<section class="h-100">
				<div class="container h-100">
					<div class="row justify-content-md-center h-100">
						<div class="card-wrapper">
							<div class="brand">
								<img src="../assets/img/logo.jpg" alt="Bhumi logo">
							</div>
							<div class="card fat">
								<div class="card-body">
									<form action="index.php" method="POST">
			 							<h4 class="card-title">Login</h2>
										<div class="form-group">
											<input type="text" class="form-control" name="user" placeholder="Enter Email" required><br>
											<input type="Password" class="form-control" name="pass" placeholder="Enter Password" required><br>
											<!-- Submit Credentials as POST-->											<input type="submit" class="btn btn-primary btn-block" name="submit" value="Submit" class="button">
										</div>
										<center>
											<a href="forgetpass.php">Forgot Password?</a>
											<br>Don't have an account? <a href="signup.php">SignUp</a>
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
