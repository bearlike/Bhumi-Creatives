<!DOCTYPE html>
<html>
<head>
	<title>Projects</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
  <link rel="stylesheet" type="text/css" href="styles/projects.css">
  <link rel="stylesheet" type="text/css" href="styles/styles.css">
	
</head>

	<!-- Body Opens -->
<body>
		<br><br><br><!-- Too Lazy for Padding -->
	<?php
		include 'headerAdmin.php';
        include 'connection.php';

        $search = strtolower($_POST['filter']);
        $search = str_replace(" ",",",$search);
        $searcharr = preg_split( "/[,]+/", $search );

		$sql = "SELECT * FROM project;";
		$result = $conn->query($sql);

		if ($result->num_rows > 0){
			$id=0;
			echo "<table><tr>";
			while($row = $result->fetch_assoc()){
				$title = $row["title"];
				$url = $row["image"];
                $tags = strtolower($row['tags']);

                $tag_all = preg_split( "/[\s,]+/", $tags );

                foreach($tag_all as $tag)
                {
                    $flag = 0;
                    for($i=0;$i<count($searcharr);$i++)
                    {

                    if(strpos($tag, $searcharr[$i]) !== false)
                    {
                        echo "<div class='w3-btn w3-col m4 l3'><a onclick='redir()'><img name='".$title."' class='projectImg w3-hover-opacity' id='".$row['pid']."' src='".$url."' alt='Not able to display' /><br>";

						echo "<center><b>".$title."<br>Tags </b>: ".$row['tags']."<br>";
						echo "<form method='post' action='delete.php?pid=".$row['pid']."'><input class='w3-button w3-blue w3-round-large' type='submit' name='delete' value='Delete'></form></center></a></div>";

                        $flag = 1;
                        break;
                    }
                    }
                    if( $flag )
                        break;
			     }

            }
		}
		else{
			echo "<h3>No Projects to Display.</h3>";
		}
	?>

	<script type='text/javascript'>
		function redir() {
			window.open('imgDisplay.php?pid='+event.srcElement.id,'_self');
		}
	</script>

</body>
</html>
