<!--
	Title: Bhmui Creatives - Approved (done) Project Page for Moderators
-->
<!DOCTYPE html>
<html>
<head>
	<title>Approvals</title>
  <link rel="stylesheet" href="styles/approval.css">
	<link rel="icon" type="image/png" href="assets/img/siteicon.png" />
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>

	<?php
  	include 'headerAdmin.php';
		include 'connection.php';

    session_start();

    if(isset($_SESSION['user']) && $_SESSION['user'] == "admin")
        $user = $_SESSION['user'];
    else
        header("Location:loginAdmin.php");

    $stat = $_GET['stat'];
    $pid  = $_GET['pid'];

    $sql = "SELECT * FROM approval WHERE pid ='".$pid."';";
    $result = $conn->query($sql);
    $row2 = $result->fetch_assoc();

    if($stat == 'D')
    {
        $query2="INSERT INTO notification VALUES('".$row2['user']."','".$row2['title']." has been declined',CURDATE(),'unread');";
        $conn->query($query2);

        $query3="DELETE FROM approval WHERE pid='".$pid."';";
        $conn->query($query3);

        if (!unlink($row2['image']))
            echo ("Error deleting image");

        if (!unlink($row2['source_file']))
            echo ("Error deleting source");

    }

    if($stat == 'A')
    {
        $query2="INSERT INTO notification VALUES('".$row2['user']."','".$row2['title']." has been approved',CURDATE(),'unread');";
        $conn->query($query2);

        $query4="INSERT INTO project VALUES('".$pid."','".$row2['user']."','".$row2['title']."','".$row2['image']."','".$row2['descri']."','".$row2['city']."','".$row2['cause']."','".$row2['tags']."','".$row2['source_file']."',0) ;";
        $conn->query($query4);

        $query5="DELETE FROM approval WHERE pid='".$pid."';";
        $conn->query($query5);
    }

		$sql = "SELECT * FROM approval;";
		$result = $conn->query($sql);

		if ($result->num_rows > 0){
            echo "<table><tr>";
            $id=0;
			while($row = $result->fetch_assoc()){
				$title = $row["title"];
				$url = $row["image"];
        if($id%2==0)
        { $id=0;
          echo "<tr></tr>";
        }
				echo "<td><img name='".$title."' class='projectImg' id='".$url."' src='".$url."' alt='Not able to display' />";
				echo "<br><center>".$title."<br>TAGS:".$row['tags']."</center></td>";
                echo "<td><button><a class='but' href='approved.php?pid=".$row['pid']."&stat=A'>APPROVE</a></button><button><a class='but' href='approved.php?pid=".$row['pid']."&stat=D'>DECLINE</a></button><div></td>";
                $id=$id+1;
			}echo "</tr></table>";
		}
		else{
			echo "<h3>No Projects to Display.</h3>";
		}
        $conn->close();
	?>

	<!-- Call footer.php for Footer Bar-->
	<!--Footer to be added-->

</body>
</html>
