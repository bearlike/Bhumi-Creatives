<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    include 'connection.php';

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    $email = $_GET["email"];
    $uid = $_GET["uid"];
    $user = $_GET["user"];
    $hashed = $_GET["hash"];

    try {

        $sql2 = "SELECT * FROM smtp;";
        $res2 = $conn->query($sql2);

        if($row2 = $res2->fetch_assoc())
        {

				$senderMail = $row2['mail'];			//add the sender mail
				$senderPass = $row2['password'];			//add the sender password

				//$mail->SMTPDebug = 4;
				//Server settings
				$mail->isSMTP();                                            // Set mailer to use SMTP
				$mail->Host       = $row2['host'];  // Specify main and backup SMTP servers
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
				$mail->Username   = $senderMail;                     // SMTP username
				$mail->Password   = $senderPass;                               // SMTP password
				//$mail->SMTPSecure = 'ssl';
        $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);                                  // Enable TLS encryption, `ssl` also accepted
				$mail->Port       = $row2['port'];                                    // TCP port to connect to

							    //Recipients
				$mail->setFrom($senderMail, 'Creatives');
                $mail->addAddress($email);     // Add a recipient
				$mail->addReplyTo($senderMail);

							 // Content
				$mail->isHTML(true);                                  // Set email format to HTML
				$mail->Subject = 'Verify your Account';
                $message = "This mail is regarding the account verification you created at the Creatives.<br>Click the link below to verify your account.<br><br>Click <a href='localhost/Bhumi-Creatives/verify.php?uid=".$uid."'>here</a>.<br><br><br>If this request was not made by you click <a href='localhost/Bhumi-Creatives/unverify.php?uid=".$uid."'>here</a>.";
				$mail->Body = wordwrap($message, 70);
				$mail->AltBody = "This mail is regarding the account verification you created at the Creatives.Click the link below to verify your account.\nClick localhost/Bhumi-Creatives/verify.php?uid=".$uid." .\n\nIf this request was not made by you click localhost/Bhumi-Creatives/unverify.php?uid=".$uid." .";

				$mail->send();
                $q3 = "INSERT INTO ulogin VALUES('".$email."','".$hashed."','".$uid."','".$user."','no')";

				if($conn->query($q3))
   				{
   					$_SESSION["user"] = $user;
   					header("location:index.php");
   					exit();
   				}
        }
    }catch (Exception $e) {
			    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}

?>
