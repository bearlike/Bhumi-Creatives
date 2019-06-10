<html>
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
			use PHPMailer\PHPMailer\PHPMailer;
			use PHPMailer\PHPMailer\Exception;

			if(isset($_POST['submit']))
			{
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "uplabs";

				// Create connection
                session_start();
				$conn = new mysqli($servername, $username, $password, $dbname);

				// Check connection
				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				}
				//echo "Connected successfully";

				$flag=0;

				$user = $_POST["user"];
				$pass = $_POST["pass"];
				$email=$_POST["email"];
				$copass=$_POST["conpass"];
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
					echo "\n<center><h3>Invalid E-Mail Address!!</h3></center>";
					$flag=1;
				}
				else{

   					$q1="SELECT * FROM ulogin WHERE uname= '".$user."' ;";
   					$q2="SELECT * FROM ulogin WHERE email='".$email."';";

   					$r1=$conn->query($q1);
   					$r2=$conn->query($q2);

   					if($r1->num_rows!=0 )
   					{
                		echo "\n<center><h3>Username already exists. Use another Username.</h3></center>";
                		$flag=1;
                	}

   				    if($r2->num_rows!=0)
   				    {
   				    	echo "\n<center><h3>E-Mail ID already exists. Use another E_Mail ID.</h3></center>";
   				      	$flag=1;
   				  	}

   				  	if($flag==0)
   				  	{
   				  		do{
    						$uni_id = rand(10,99);

						    $first = $uni_id;
						    $chars_to_do = 6 - strlen($uni_id);
						    for ($i = 1; $i <= $chars_to_do; $i++){
						        $first .= chr(rand(48,57));
						    }

						    $uid = $first;

						    $sql = "SELECT * FROM ulogin WHERE uid='".$uid."';";
						    $result = $conn->query($sql);

						}while($result->num_rows > 0);

   				  		$q3="INSERT INTO ulogin VALUES('".$email."','".$pass."','".$uid."','".$user."','no')";

   				  		require 'PHPMailer/src/Exception.php';
						require 'PHPMailer/src/PHPMailer.php';
						require 'PHPMailer/src/SMTP.php';

						// Instantiation and passing `true` enables exceptions
						$mail = new PHPMailer(true);

						try {
							$senderMail = "";			//add the sender mail
							$senderPass = "";			//add the sender password

							//$mail->SMTPDebug = 4;
						    //Server settings
						    $mail->isSMTP();                                            // Set mailer to use SMTP
						    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
						    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
						    $mail->Username   = $senderMail;                     // SMTP username
						    $mail->Password   = $senderPass;                               // SMTP password
						    //$mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
						    $mail->Port       = 587;                                    // TCP port to connect to

						    //Recipients
						    $mail->setFrom($senderMail, 'Uplabs');
						    $mail->addAddress($email);     // Add a recipient
						    $mail->addReplyTo($senderMail);

						    // Content
						    $mail->isHTML(true);                                  // Set email format to HTML
						    $mail->Subject = 'Verify your Account';
						    $message = "This mail is regarding the account verification you created at the Uplabs.<br>Click the link below to verify your account.<br><br>Click <a href='localhost/uplabs/verify.php?uid=".$uid."'>here</a>.<br><br><br>If this request was not made by you click <a href='localhost/uplabs/unverify.php?uid=".$uid."'>here</a>.";
						    $mail->Body = wordwrap($message, 70);
						    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

						    $mail->send();

						} catch (Exception $e) {
						    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
						}

						if($conn->query($q3))
   				  		{
   				  			$_SESSION["user"] = $user;
   				  			header("location:index.php");
   				  			exit();
   				  		}

   				  	}
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
							<img src="assets/img/logo.jpg" alt="Bhumi logo">
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
				<br>Already have an account? <a href="index.php">Log in</a>
		</form>
</div></div></div></div></div></div>
	</body>
</html>
