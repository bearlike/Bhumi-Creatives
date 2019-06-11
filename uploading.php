<!--
	Title: Bhmui Creatives - Upload Form for normal user
-->
<!DOCTYPE html>
<html>
<head>
	<title>Upload</title>

	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>

<body>

    <?php
        include 'header.php';
        session_start();

        if(isset($_SESSION['user']))
            $user = $_SESSION['user'];
        else
            header("Location:index.php");

    if(isset($_POST['submit']))
    {
        include 'connection.php';

        $user = $_SESSION['user'];

        do{
            $uni_id = rand(10,99);

            $first = $uni_id;
            $chars_to_do = 8 - strlen($uni_id);
            for ($i = 1; $i <= $chars_to_do; $i++){
                $first .= chr(rand(48,57));
            }

            $pid = $first;

            $sql1 = "SELECT * FROM project WHERE pid='".$pid."';";
            $result1 = $conn->query($sql1);

            $sql2 = "SELECT * FROM approval WHERE pid='".$pid."';";
            $result2 = $conn->query($sql2);

        }while($result1->num_rows > 0 || $result2->num_rows > 0);


            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            $target_file_img = $target_dir . $pid . "." . $imageFileType;

            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"]))
            {
                $check = getimagesize($_FILES["file"]["tmp_name"]);
                if($check !== false)
                {
                    echo "<center><h3>File is an image - " . $check["mime"] . ".</h3></center>";
                    $uploadOk = 1;
                }
                else
                {
                    echo "<center><h3>File is not an image.</h3></center>";
                    $uploadOk = 0;
                }
            }
            // Check file size
            if ($_FILES["file"]["size"] > 5242880)
            {
                echo "<center><h3>Sorry, your file is too large.</h3></center>";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
            {
                echo "<center><h3>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</h3></center>";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0)
            {
                echo "<center><h3>Sorry, your file was not uploaded.</h3></center>";
            // if everything is ok, try to upload file
            }
            else
            {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file_img)) {

                } else {
                    echo "<center><h3>Sorry, there was an error uploading your file.</h3></center>";
                }
            }

            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["source"]["name"]);
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            $target_file = $target_dir . $pid . "." . $fileType;

            // Check file size
            if ($_FILES["source"]["size"] > 52428800)
            {
                echo "<center><h3>Sorry, your file is too large.</h3></center>";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($fileType != "rar" && $fileType != "zip" && $fileType != "tar" && $fileType != "psd" )
            {
                echo "<center><h3>Sorry, only RAR, ZIP, TAR & PSD files are allowed.</h3></center>";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0)
            {
                echo "<center><h3>Sorry, your file was not uploaded.</h3></center>";
            // if everything is ok, try to upload file
            }
            else
            {
                if (move_uploaded_file($_FILES["source"]["tmp_name"], $target_file))
                {
                    $tags = $_POST['tag'].",".$_POST['city'].",".$_POST['cause'];

                    $sql = "INSERT INTO approval VALUES('".$user."','".$pid."','".$_POST['name']."','".$target_file_img."','".$_POST['descri']."','".$_POST['city']."','".$_POST['cause']."','".$tags."','".$target_file."');";
                    $result = $conn->query($sql) or die(mysqli_error($conn));

                    $_SESSION['msg']="Your file has been successfully uploaded.";
                    header('location:myProjects.php');
                    exit();
                }
                else
                {
                    echo "<center><h3>Sorry, there was an error uploading your source file.</h3></center>";
                }
            }
        $conn->close();
    }
?>

    <div class="forms w3-border w3-round-large">
        <div class="w3-container w3-blue w3-round-large">
            <h2>Upload Form</h2>
        </div>

        <form class="w3-container w3-mobile" method='post' action='uploading.php' enctype="multipart/form-data">
        <p>
            <label>Design Image</label>
            <input class="w3-input" type="file" name='file' required />
            (*File size must be < 5MB) (Allowed formats are JPEG,JPG,PNG and GIF)
        </p><br>

        <p>
            <label>Design Name</label>
            <input class="w3-input" type="text" name='name' required />
        </p>

        <p>
            <label>Description</label>
            <input class="w3-input" type="text" name='descri' maxlength="250" required />
            (Maximum 250 Characters allowed)
        </p>

        <p>
            <label>City</label>

                <select class="w3-input" name="cars">

                <option value="Agra">Agra</option>
                <option value="Ahmedabad">Ahmedabad</option>
                <option value="Alappuzha">Alappuzha</option>
                <option value="Amritsar">Amritsar</option>
                <option value="Bangalore">Bangalore</option>
                <option value="Bhavnagar">Bhavnagar</option>
                <option value="Bhopal">Bhopal</option>
                <option value="Bhubaneshwar">Bhubaneshwar</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Chennai">Chennai</option>
                <option value="Chittaurgarh">Chittaurgarh</option>
                <option value="Coimbatore">Coimbatore</option>
                <option value="Cuttack">Cuttack</option>
                <option value="Dehradun">Dehradun</option>
                <option value="Delhi">Delhi</option>
                <option value="Gangtok">Gangtok</option>
                <option value="Guwahati">Guwahati</option>
                <option value="Hyderabad">Hyderabad</option>
                <option value="Jaipur">Jaipur</option>
                <option value="Jamshedpur">Jamshedpur</option>
                <option value="Kanpur">Kanpur</option>
                <option value="Kanyakumari">Kanyakumari</option>
                <option value="Kolkata">Kolkata</option>
                <option value="Lucknow">Lucknow</option>
                <option value="Madurai">Madurai</option>
                <option value="Mumbai">Mumbai</option>
                <option value="Mysore">Mysore</option>
                <option value="Nagpur">Nagpur</option>
                <option value="Noida">Noida</option>
                <option value="Ooty">Ooty</option>
                <option value="Panaji">Panaji</option>
                <option value="Patna">Patna</option>
                <option value="Pondicherry">Pondicherry</option>
                <option value="Portblair">Portblair</option>
                <option value="Pune">Pune</option>
                <option value="Rajkot">Rajkot</option>
                <option value="Rameswaram">Rameswaram</option>
                <option value="Ranchi">Ranchi</option>
                <option value="Secunderabad">Secunderabad</option>
                <option value="Shimla">Shimla</option>
                <option value="Surat">Surat</option>
                <option value="Thanjavur">Thanjavur</option>
                <option value="Thiruchchirapalli">Thiruchchirapalli</option>
                <option value="Tirumala">Tirumala</option>
                <option value="Udaipur">Udaipur</option>
                <option value="Vijayawada">Vijayawada</option>
                <option value="Visakhapatnam">Visakhapatnam</option>



                </select>

        </p>

        <p>
            <label>Cause</label>
            <input class="w3-input" type="text" name='cause' required />
            (Eg - RTE)
        </p>

        <p>
            <label>Tags</label>
            <input class="w3-input" type="text" name='tag' required />
            (Separate different tags using commas)
        </p>

        <p>
            <label>Source File</label>
            <input class="w3-input" type="file" name='source' required />
            (*File size must be < 50MB) (Allowed formats are ZIP,RAR,TAR and PSD)
        </p><br>

        <p>
            <input class="w3-button w3-large w3-blue w3-round-large" type="submit" name="submit" value="Upload">
        </p>

        </form>
    </div>
		<!-- Call footer.php for Footer Bar-->
    <!--Footer to be added-->

</body>
</html>
