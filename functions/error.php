<?php

$data = $db->query("SELECT * FROM settings");
$info = $db->fetch_array($data);

$ads = $db->query("SELECT * FROM ads");
$ads_info = $db->fetch_array($ads);
?>
<!DOCTYPE html>
<html class="full" lang="zh">

    <head>
	    <base href="<?php echo $info['URL']; ?>/" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Error - <?php echo $info['name']; ?></title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">

        <!-- Custom CSS for the Template -->
        <link href="css/ziti/fonts.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <style>
            <?php echo $info['cstm-style']; ?>
        </style>
    </head>

    <body>
<?php
include "functions/menu.php";
?>
        <div class="container"  style="margin-top: -20px;">
            <div class="row logo">
                <div class="col-lg-12" style="text-align:center">
                    <?php 
                        include "functions/logo.php";
                    ?>
                </div>
            </div>
        </div>
        <div class="container animated shake">

            <div class="row">
                <div class="col-lg-10 col-lg-offset-1" style="margin-top: 100px;">
                    <div class="alert alert-dismissable alert-danger text-center">
                        <h3  style="color: #707070;"> 哎呀！<?php echo $error_msg; ?>  </h3> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-md-offset-1" style="text-align: center; margin-top: 20px; ">
                    <?php echo '' . $ads_info['ad2'] . ''; ?>
                </div>
            </div>			

        </div>
        <!-- JavaScript -->
        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/bootstrap.js"></script>

    </body>

</html>
