<html>
	<head>
		<title>Sign Up</title>

		<link rel="stylesheet" type="text/css" href="styles/login.css">
		<link rel="stylesheet" type="text/css" href="styles/styles.css">
		<link rel="icon" type="image/ico" href="images/logo.png" />
	</head>

	<body>
		
		<div>
		    <center>
		        <h1 class='loginName'>Welcome to Creatives</h1>
		    </center>
		</div>
		<?php
			
			if(isset($_POST['submit']))
			{
				include 'connection.php';

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

						$salted = '24@fu'.$pass.'45&deo';
						$hashed = hash('sha512', $salted);

   				  		header("location:verificationmail.php?email=".$email."&uid=".$uid."&hash=".$hashed."&user=".$user."");   
						
   				  	}	
				}

				
				$conn->close();
			}
		?>

		 
		<form class="log"  action="signup.php" method="POST">
			 <h2 class="login">SIGN UP</h2>
		<center> <table><tr>
			<td>Username :</td><td> <input type="text" name="user" placeholder="Enter Username" required></td></tr>
			<tr><td>Email : </td><td><input type="text" name="email" placeholder="Enter email" required></td></tr>
			<tr><td>Password :</td><td> <input type="password" name="pass" placeholder="Enter password" required></td></tr>
			<tr><td>Conform Password :</td><td> <input type="Password" name="conpass" placeholder="conform password" required></td></tr></table><br><br>
			<input type="submit" name="submit" value="SignUp" class="button">
        </center>
			<br><br>Already have an account? <a href="index.php">LogIn</a>
			
		</form>
          	
	</body>
</html>