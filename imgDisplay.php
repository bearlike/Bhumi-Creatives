<!DOCTYPE html>
<html>

<head>
    <title>Image</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="assets/css/styles.css">
	  <link rel="stylesheet" href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome-font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/balzss/luxbar/ae5835e2/build/luxbar.min.css">
</head>

<header id="luxbar" class="luxbar-fixed">
    <input type="checkbox" class="luxbar-checkbox" id="luxbar-checkbox" />
    <div class="luxbar-menu luxbar-menu-right luxbar-menu-dark">
        <ul class="luxbar-navigation">
            <li class="luxbar-header">
                <a href="#" class="luxbar-brand"><img src="assets/img/logo.png" style="width: 40%; height: 40%" alt="Bhumi Logo"></a> <label class="luxbar-hamburger luxbar-hamburger-doublespin" id="luxbar-hamburger" for="luxbar-checkbox">
					<span></span>
				</label>
            </li>
            <li class="luxbar-item"><a class="active" href="projectsAdmin.php">Home</a></li>
            <li class="luxbar-item"><a href="approval.php">Requets</a></li>
            <li class="luxbar-item">
                <a>
                    <!-- Search Bar -->
                    <form action='filteredAdmin.php' method='post'>
                        <input type='text' name='filter' placeholder='Filter by tags' required/>
                        <input type='submit' value='Filter' />
                    </form>
                </a>
            </li>
            <li class="luxbar-item"><a href="notificationAdmin.php">Notifications</a></li>
            <li class="luxbar-item"><a href="logout.php">Sign Out</a></li>
        </ul>
    </div>
</header>

<body>
    </br></br><br><br>
    <div class="content">
        <div class="content_wrapper clearfix">
            <div class="cnt_left">
                <div class="main_img img">
                    <?php    ?>
                </div>
                <div class="prod_thumbs">

                </div>
            </div>

            <div class="cnt_right">
                <h1 class="prod_title">
                    <?php
					include "imagetest.php";
					 echo ucfirst($row["title"]);?>
                </h1>
                <p class="prod_sub_title">
                    <?php echo ucfirst($doneby); ?>
                </p>
                <div class="rating-wrapper">
                    <p class="prod_rating"><span class="rating">* * * </span>* *</p>
                    <p class="prod_rating_text"></p>
                </div>
                <div class="price_wrapper">
                    <h2 class="price"><?php echo $row["downloads"]; ?></br>Number of Downloads</h2>
                </div>
                <div class="desc_wrapper">
                    <ul class="desc_points">
                        <li class="desc_point">Enriched with ultra-care hydrating formula</li>
                        <li class="desc_point">Won't fade in extreme heat and humidity</li>
                        <li class="desc_point">All the kids will think you'r really cool</li>
                    </ul>
                </div>

                <div class="purchase_wrapper">
                    <div class="buy_btn">Download Now</div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
