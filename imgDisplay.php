<!DOCTYPE html>
<html>
<head>
	<title>Image</title>
	
    <link rel="stylesheet" href="styles/styles.css">
	
</head>
<body>
	<?php
		include 'header.php';
		include 'connection.php';

		session_start();

		if(isset($_SESSION['user']))
			$user = $_SESSION['user'];
		else
			header("Location:index.php");

		$user = $_SESSION['user'];
		$pid = $_GET['pid'];

		$sql = "SELECT * FROM project WHERE pid='".$pid."';";
		$result = $conn->query($sql);

		$url = null;
		if($row = $result->fetch_assoc())
		{	
			$url = $row['image'];
			$title = $row['title'];
			$doneby = $row['uname'];
            $desc = $row['descri'];
			$tags = $row['tags'];
		}

		echo "<div class='w3-cell-row' style='width:100%;padding:20px;'><div class='w3-container w3-cell w3-mobile w3-col m6 l6 w3-image'><img src='".$url."' class='disImg' alt='Not Able to Display' /></div>";

		echo "<div class=' w3-container w3-cell w3-mobile w3-cell-middle w3-col m6 l6'><center><h2>".$title."</h2>by ".$doneby."<br><br><br>
        <b>About:</b>".$desc."<br><br><b>Tags</b> : ".$tags."<br><br><br>".$row['downloads']." Downloads<br><br>";
        
        $q1="select count(uname) from likes where pid='".$row['pid']."';";
        $rs1=$conn->query($q1);
        if($row=$rs1->fetch_assoc()){
            
            echo $row['count(uname)']." Likes<br><br><br>";
        }
    
		echo "<form action='download.php?pid=".$pid."&type=i' method='post'><button class='button'>Download Now</button></form><br>";
        echo "<form action='download.php?pid=".$pid."&type=s' method='post'><button class='button'>Download Source File</button></form></center></div></div>";

        $conn->close();

		?>

</body>
</html>