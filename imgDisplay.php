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

<?php include "header.php" ?>

<body>
    </br>
    </br><br><br>
    <div class="content">
        <div class="content_wrapper clearfix">
            <div class="cnt_left">
                <div class="main_img img">
                  <img src="uploads\11951.jpg">
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
                    <h2 class="price">
                        <?php echo $row["downloads"]; ?>
                        </br>Number of Downloads</h2>
                </div>
                <div class="desc_wrapper">
                    <ul class="desc_points">
                        <li class="desc_point"><?php echo $desc ?></li>

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
