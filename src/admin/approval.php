<!--
	Title: Bhmui Creatives - Approvals (Pending) Project Page for Moderators
-->
<!DOCTYPE html>
<html>
<head>
	<title>Approvals | Bhumi Creatives</title>
  <link rel="stylesheet" href="../../assets/css/gen/approval.css">
	<link rel="icon" type="image/png" href="../../assets/img/siteicon.png" />
	<link rel="stylesheet" type="text/css" href="../../assets/css/gen/styles.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/buttons.css">
</head>
<body>

	<?php
		include 'headerAdmin.php';
		include '../common/connection.php';



		if(isset($_SESSION['user']) && $_SESSION['user'] == "admin")
			$user = $_SESSION['user'];
		else
			header("Location:loginAdmin.php");

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
				echo "<div ><table><tr><td><a onclick='redir()' style='cursor:zoom-in'><img name='".$title."' class='projectImg' id='".$row['pid']."' src='../../".$url."' alt='Not able to display' /></a>";
				echo "<br><b>Title: </b>".ucfirst($title)."<br><b>Tags: </b>".$row['tags']."</td>";
				echo "				<td>
										<ul class=\"button-group\">
											<li><button class=\"small green button\"><a href='approved.php?pid=".$row['pid']."&stat=A'>Approve</a></button></li>
											<li><button class=\"small red button\"><a href='approved.php?pid=".$row['pid']."&stat=D'>Decline</a></button></li>
										</ul>
										<div>
									</td>
								</tr>";
			}echo "</tr></table>";
		}
		else{
			echo "<h3>No projects pending for approval.</h3>";
		}
		$conn->close();
	?>
	<script type='text/javascript'>
		function redir() {
			window.open('approvedisplay.php?pid='+event.srcElement.id,'_self');
		}
	</script>

	<!-- Call footer.php for Footer Bar-->
	<!--Footer to be added-->

</body>
</html>
