<!--
	Title: Bhmui Creatives - Sign Up Page
-->
<html>
	<head>
		<!-- Page Title Open-->
		<title>User | Login</title>
		<!-- Page Title Close-->
		<!-- Site Icon Open-->
		<link rel="icon" type="image/png" href="../../assets/img/siteicon.png">
		<!-- Site Icon Close-->
		<!-- CSS Stylesheets Here -->
		<link rel="stylesheet" type="text/css" href="../../assets/css/login.css">
		<link rel="stylesheet" type="text/css" href="../../assets/css/footer.css">
		<link rel="stylesheet" type="text/css" href="../../assets/css/styles.css">
		<link rel="stylesheet" type="text/css" href="../../assets/css/my-login.css">
		<!-- Fonts Here -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		<link rel="stylesheet" href="../../lib/bootstrap/4.0.0/css/bootstrap.min.css">
	</head>
		<!-- Head Close -->
		<!-- Body Open -->
	<body>
		<div class="my-login-page">
		<!-- PHP Open -->
		<?php

			if(isset($_POST['submit']))
			{
				include '../common/connection.php';

				$flag=0;

				$user = mysqli_real_escape_string($conn, $_POST['user']);
				$pass = mysqli_real_escape_string($conn, $_POST['pass']);
				$email = mysqli_real_escape_string($conn, $_POST['email']);
				$copass = $_POST["conpass"];

				if($pass != $copass)
				{
          echo "\n<center><h3>Both Passwords are not same!!</h3></center>";
          $flag=1;
				}

				function valid_email($str)
				{
						return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
						$flag=1;
				}

				if(!valid_email($email))
				{
					echo "\n<center><h3>Invalid Email Address</h3></center>";
					$flag=1;
				}
				else{

   					$q1="SELECT * FROM ulogin WHERE uname= '".$user."' ;";
   					$q2="SELECT * FROM ulogin WHERE email='".$email."';";

   					$r1=$conn->query($q1);
   					$r2=$conn->query($q2);

   					if($r1->num_rows!=0 )
   					{
              echo "\n<center><h3>Username already exists. Try another Username.</h3></center>";
              $flag=1;
            }

   				  if($r2->num_rows!=0)
   				  {
   				   	echo "\n<center><h3>Email ID already exists. Use another E_Mail ID.</h3></center>";
   				    $flag=1;
   				  }

   				  if($flag==0)
   				  {
   				  	do {
    						$uni_id = rand(10,99);
					   		$first = $uni_id;
						   	$chars_to_do = 6 - strlen($uni_id);
						   	for ($i = 1; $i <= $chars_to_do; $i++){
						      $first .= chr(rand(48,57));
						   }

						   $uid = $first;
						   $sql = "SELECT * FROM ulogin WHERE uid='".$uid."';";
						   $result = $conn->query($sql);
						} while($result->num_rows > 0);

						$salted = '24@fu'.$pass.'45&deo';
						$hashed = hash('sha512', $salted);

   				  header("location:verificationmail.php?email=".$email."&uid=".$uid."&hash=".$hashed."&user=".$user."");

   				}
				}
				$conn->close();
			}
		?>

		<section class="h-100">
			<div class="container h-100">
				<div class="row justify-content-md-center h-100">
					<div class="card-wrapper">
						<div class="brand">
							<img src="../../assets/img/logo.jpg" alt="Bhumi logo">
						</div>
						<div class="card fat">
							<div class="card-body">
								<form action="signup.php" method="POST">
									 <h4 class="clard-title">Register</h4>
									 <br>
									 <div class="form-group">
										<input type="text" class="form-control" name="user" placeholder="Enter Username" required><br>
										<input type="text" class="form-control" name="email" placeholder="Enter Email" required><br>
										<input type="password" class="form-control" name="pass" placeholder="Enter Password" required><br>
										<input type="Password" class="form-control" name="conpass" placeholder="Confirm Password" required><br>
										<input type="submit"class="btn btn-primary btn-block" name="submit" value="SignUp" class="button">
									</div>
										<br>Already have an account? <a href="../index.php">Log in</a>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>
