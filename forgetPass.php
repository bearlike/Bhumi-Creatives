<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
    <link rel="stylesheet" href="styles/styles.css">
	</head>
<body>

	<?php
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;

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

		if (isset($_POST['subEmail'])) {			
			$email = $_POST['emailID'];

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
				    $mail->Subject = 'Reset Password';
				    $mail->Body    = 'This mail is regarding the reset password you requested a while ago.<br>Enter the otp '.$otp.' in the browser window and then reset your Password.';
				    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

				    $mail->send();
				    
				    header('location:resetOtp.php');
				    exit();
				} catch (Exception $e) {
				    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
				}
			}
			else{
				echo "<center><h3>This E-Mail Address does not exist. Try Signing Up!!</h3></center>";
			}
		}

	?>

	<form action="forgetPass.php" method="post" class="log">
		<h2>E-Mail ID</h2><br>
		Enter your E-Mail ID : <input type="email" name="emailID" required/><br><br>
		<input type="submit" name="subEmail" value="Submit E-Mail" class="button" />
	</form>

</body>
</html>