<!--/	Title/ Bhmui" Creatives - Forget Password Page
-->
<!DOCTYPE html>
<html>
<!-- Head Open -->
<head>
	<!-- Page Title Open-->
	<title>Forget Password</title>
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
<body>
	<div class="my-login-page">
	<?php
		require '../../lib/PHPMailer/src/Exception.php';
		require '../../lib/PHPMailer/src/PHPMailer.php';
		require '../../lib/PHPMailer/src/SMTP.php';

		include '../common/connection.php';

		session_start();

		if (isset($_POST['subEmail'])) {
			$email = mysqli_real_escape_string($conn, $_POST['emailID']);

			$uni_id = rand(10,99);

    		$first = $uni_id;
    		$chars_to_do = 6 - strlen($uni_id);
    		for ($i = 1; $i <= $chars_to_do; $i++)
        		$first .= chr(rand(48,57));

			$otp = $first;
			$_SESSION['otp'] = $otp;

			$sql = "SELECT * FROM ulogin WHERE email ='".$email."';";
			$result = $conn->query($sql);

			if( $result->num_rows > 0 ){
				if($row = $result->fetch_assoc())
					$_SESSION['user'] = $row['uname'];

				// Instantiation and passing `true` enables exceptions
				$mail = new PHPMailer(true);
				try {
					$sql2 = "SELECT * FROM smtp;";
					$res2 = $conn->query($sql2);

					if($row2 = $res2->fetch_assoc())
					{
						$senderMail = $row2['mail'];			//add the sender mail
						$senderPass = $row2['password'];	//add the sender password

						//$mail->SMTPDebug = 4;
						//Server settings
						$mail->isSMTP();                    // Set mailer to use SMTP
						$mail->Host       = $row2['host'];  // Specify main and backup SMTP servers
						$mail->SMTPAuth   = true;           // Enable SMTP authentication
						$mail->Username   = $senderMail;    // SMTP username
						$mail->Password   = $senderPass;    // SMTP password
						//$mail->SMTPSecure = 'ssl';
						$mail -> SMTPOptions = array(
										            					'ssl' => array(
										                			'verify_peer' => false,
										                			'verify_peer_name' => false,
										                			'allow_self_signed' => true )
										        						);                                // Enable TLS encryption, `ssl` also accepted
						$mail->Port = $row2['port'];          // TCP port to connect to

						//Recipients
						$mail->setFrom($senderMail,'Creatives');
						$mail->addAddress($email);     // Add a recipient
						$mail->addReplyTo($senderMail);

					    // Content
					    $mail->isHTML(true);              // Set email format to HTML
					    $mail->Subject = 'Reset Password';
					    $message    = 'This mail is regarding the reset password you requested a while ago.<br>Enter the otp '.$otp.' in the browser window and then reset your Password.';
					    $mail->Body = wordwrap($message, 70);
					    $mail->AltBody = 'This mail is regarding the reset password you requested a while ago.Enter the otp '.$otp.' in the browser window and then reset your Password.';

					    $mail->send();

					    header('location:resetOtp.php');
					    exit();
					}
				} catch (Exception $e) {
				    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
				}
			}
			else{
				echo "<center><h3>This email Address does not exist. Use another email address or register for a new account.</h3></center>";
			}
		}
		$conn->close();
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
							<form action="forgetPass.php" method="post">
								<h4 class="card-title">Forget Password</h4>
								<div class="form-group">
								<input type="email" class="form-control" name="emailID" placeholder="Enter Email" required/><br>
								<input type="submit" name="subEmail" value="Submit" class="btn btn-primary btn-block" class="button" />
							</form>

</body>
</html>
