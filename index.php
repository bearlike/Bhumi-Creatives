<html>
	<head>
		<title>Log In</title>
        <link rel="stylesheet" href="styles/login.css">
        <link rel="stylesheet" type="text/css" href="styles/styles.css">
	</head>

	<body>
		<button onclick="window.open('loginAdmin.php','_self');">Admin</button>
		<div>
		    <center>
		        <h1>Welcome to Uplabs</h1>
		    </center>
		</div>
		<?php
			if(isset($_POST['submit']))
			{
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
				    while($row = $result->fetch_assoc()) {
				        if($user == $row["email"]) {
				            $found = TRUE;
				        	if($pass == $row["password"]) {
				        		
				        		if($row['verified'] != 'yes'){
				        			echo "\n<center><h3>Verify your account using the mail sent to your E-Mail.</h3></center>";
				        		}
				        		else{
                                	$_SESSION["user"] = $row["uname"];
				        			header("Location:projects.php");
				        			exit();
				        		}
				        	
				        	}
				        	else {
				        		echo "\n<center><h3>Incorrect password</h3></center>";
				        	}
				        }
				    }
				    if( $found == FALSE ) {
				    	echo "\n<center><h3>Invalid User. Try again!!</h3></center>";
				    }

				} else {
				    echo "0 results";
				}
				$conn->close();
			}
		?>

		 
		<form class="log"  action="index.php" method="POST">
			 <h2 class="login">LOGIN</h2>
		 
			E-Mail ID : <input type="text" name="user" placeholder="Enter email" required><br><br>
			Password : <input type="Password" name="pass" placeholder="Enter password" required><br><br>
			<input type="submit" name="submit" value="LogIn" class="button">

			<br><br><a href="forgetPass.php">Forgot Password?</a>
			<br><br>Don't have an account? <a href="signup.php">SignUp</a>
			
		</form>
          	
	</body>
</html>