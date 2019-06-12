<!--
	Title: Bhmui Creatives - Individual Project Page for General Users
-->
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../../assets/img/siteicon.png" />
    <link rel="stylesheet" type="text/css" href="../../lib/css/w3.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="../../lib/css/luxbar.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome-font-awesome.min.css">
</head>
<!-- Call header.php for Navigation Bar-->
<?php include "header.php"; ?>
<body>
    <?php include "imagetest.php"; ?>
    <title><?php echo ucfirst ($title);?> | Projects</title>
    <div class="content">
        <div class="content_wrapper clearfix">
            <div class="cnt_left">
                <div class="main_img img">
                  <img src="../../<?php echo $url; ?>" height="530px">
                </div>
                <div class="prod_thumbs">
                </div>
            </div>

            <div class="cnt_right">
                <h1 class="prod_title">
                    <?php echo ucfirst ($title);?>
                </h1>
                <p class="prod_sub_title">
                    <?php echo ucfirst($doneby);?>
                </p>
                <div class="rating-wrapper">
                    <p class="prod_rating"><span class="rating">* * * </span>* *</p>
                    <p class="prod_rating_text"></p>
                </div>

                <p><h4> <?php echo $row['count(uname)']; ?><b> Likes</b></h4></p>

                <div class="price_wrapper">
                    <h5 class="price">
                        <?php echo $downloads; ?>
                        <b> Downloads<b></h5>
                </div><br>
                <!--<div class="desc_wrapper">
                    <ul class="desc_points">
                        -<li class="desc_point"></*?php echo $desc ?*/></li>-->
                  <!--  </ul>
                </div>-->
                <p><h6><b>Tags: </b><?php
                                      foreach($p as $a) {
                                       echo ucfirst($a).", ";
                                      }
                                    ?> </h6></p><br>
                <p><h4><?php echo $desc; ?></h4></p>
                <div class="purchase_wrapper">
                  <center>
                    <div class="buy_btn"><a href="../../<?php echo "download.php?pid=".$pid."&type=i"?>">Download Now</div>
                    <div class="buy_btn"><a href="../../<?php echo"download.php?pid=".$pid."&type=s"?>">Download Source</div>
                  </center>
                </div>
            </div>
        </div>
    </div>
    <!-- Call footer.php for Footer Bar-->
    <?php include "..//common//footer.php"; ?>

</body>

</html>
