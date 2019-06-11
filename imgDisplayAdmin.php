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

<?php  include 'headerAdmin.php'; ?>

<body>
 <?php include "imgtestadmin.php"; ?>
    <div class="content">
        <div class="content_wrapper clearfix">
            <div class="cnt_left">
                <div class="main_img img">
                    <img src=<?php echo $url; ?> height="530px">
                </div>
                <div class="prod_thumbs">

                </div>
            </div>

            <div class="cnt_right">
                <h1 class="prod_title">
                    <?php
            					 echo ucfirst($row["title"]);
                    ?>
                </h1>
                <p class="prod_sub_title">
                    <?php echo ucfirst($doneby);?>
                </p>
                <div class="rating-wrapper">
                    <p class="prod_rating"><span class="rating">* * * </span>* *</p>
                    <p class="prod_rating_text"></p>
                </div>
                <div class="price_wrapper">
                    <h2 class="price">
                        <?php echo $row["downloads"]; ?>
                         Downloads</h2>
                </div>
                <!--<div class="desc_wrapper">
                    <ul class="desc_points">
                        <!--<li class="desc_point"></*?php echo $desc ?*/></li>-->
                  <!--  </ul>
                </div>-->
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur et nunc et erat posuere sollicitudin. Etiam vitae dapibus nulla. Sed facilisis arcu et justo consequat, sit amet tempus erat varius. Nulla aliquet est vel felis consequat tempor. Quisque eu ornare nibh. Sed sodales tortor leo, quis dictum est cursus ut. Nulla velit diam, convallis vitae tortor in.</p>



                <div class="purchase_wrapper">
                  <center>
										<div class="buy_btn"><a href="<?php echo "download.php?pid=".$pid."&type=i"?>">Download Now</div>
										<div class="buy_btn"><a href="<?php echo"download.php?pid=".$pid."&type=s"?>">Download Source</div>
                  </center>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
