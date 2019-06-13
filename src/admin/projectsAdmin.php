<!--
	Title: Bhmui Creatives - Project Home Page for Moderators
-->
<?php
	include '..//common//connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Projects Admin | Bhumi Creatives</title>
	<!-- Import all neccessary Stylesheets (from Lib) -->
	<link rel="stylesheet" type="text/css" href="../../lib/textbox-css/textbox.css">
	<link rel="stylesheet" type="text/css" href="../../lib/buttons/gradient.css">
	<link rel="stylesheet" type="text/css" href="../../lib/font-awesome/4.7.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../../lib/materialize/css/materialize.css">
	<!-- Import all neccessary Stylesheets -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../../assets/img/siteicon.png">
	<link rel="stylesheet" type="text/css" href="../../assets/css/gen/projects.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/display.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/gen/styles.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/category-bar.css">
	<!-- Import all neccessary fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<!--Custom Styles-->
	<style>
		body a {
			color: none;
			color: #000;
		}
	</style>
</head>

<!-- Body Opens -->
<body>
	<?php include 'headerAdmin.php';?>
	<!-- Too Lazy for Padding -->
	<br>
	<!-- Heading #1 -->
	<div class="posts-group__header">
		<h3> Browse Here </h3>
		<span class="note">
			Filter quality downloads for your next project by softwares
		</span>
	</div>
	<!--Navigation by tools used-->
	<ul class="tools-navigation-items">
		<!-- aftereffects Icon-->
		<li class="tools-nativation-item">
			<a href="/posts/tool/aftereffects">
				<img src="../../assets/img/tools/aftereffects.png" class="shadow">
			</a>
		</li>
		<!-- illustrator Icon-->
		<li class="tools-nativation-item">
			<a href="/posts/tool/illustrator">
				<img src="../../assets/img/tools/illustrator.png" class="shadow">
			</a>
		</li>
		<!-- xd Icon-->
		<li class="tools-nativation-item">
			<a href="/posts/tool/xd">
				<img src="../../assets/img/tools/xd.png" class="shadow">
			</a>
		</li>
		<!-- html Icon-->
		<li class="tools-nativation-item">
			<a href="/posts/tool/html">
				<img src="../../assets/img/tools/html.png" class="shadow">
			</a>
		</li>
		<!-- wordpress Icon-->
		<li class="tools-nativation-item">
			<a href="/posts/tool/sketch">
				<img src="../../assets/img/tools/wordpress.png" class="shadow">
			</a>
		</li>
	</ul>

	<br>
	<!-- Heading #2 -->
	<div class="posts-group__header">
		<h3> Latest Uploads </h3>
		<span class="note">
			Find high-quality design resources uploaded by the community here
		</span>
	</div>

	<!-- PHP Open -->
	<?php
		if(isset($_SESSION['user']) && $_SESSION['user'] == "admin")
			$user = $_SESSION['user'];
		else
			header("Location:loginAdmin.php");

		$sql = "SELECT * FROM project;";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			echo "<table><tr>";
			$id=0;
			while($row = $result->fetch_assoc()){
				$title = $row["title"];
				$url = $row["image"];
				echo "<div class='w3-btn w3-col m4 l3'><a onclick='redir()'><img name='".$title."' class='projectImg rounded w3-hover-opacity' id='".$row['pid']."' src='../../".$url."' alt='Unable to display' /><br>";

				$maxLen = 25;
				$tags = $row['tags'];
				// Tags Normalisation
				$tags = $row['tags'];
				$tags = str_replace(",,","",$tags);
				$tags = str_replace(" , ","",$tags);
				$tags = str_replace(", ",",",$tags);
				$tags = str_replace(" ,",",",$tags);
				$tags = str_replace(",",", ",$tags);

				if(strlen($tags) > $maxLen)
				{
					$tags = substr($tags, 0, $maxLen);
					$tags = $tags."...";
				}

				echo "<center><b>".ucfirst($title)."<br>Tags</b>: ".$tags."<br>";
				echo "<form method='post' action='delete.php?pid=".$row['pid']."'><input class='red button' type='submit' name='delete' value='Delete'></form></center></a></div>";
			}
		}
		else{
			echo "<h3>No Projects to Display.</h3>";
		}
	?>
	<!-- PHP Close -->
	<script type='text/javascript'>
		function redir() {
			window.open('imgDisplayAdmin.php?pid='+event.srcElement.id,'_self');
		}
	</script>
	<!-- Call footer.php for Footer Bar-->
	<!--Footer to be added-->

</body>
<!-- Body Closes -->
</html>
