<!DOCTYPE html>
<html class="full" lang="zh">

    <head>
	    <base href="<?php echo $info['URL']; ?>/" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>跳转中 - <?php echo $info['name']; ?></title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">

        <!-- Custom CSS for the Template -->
        <link href="css/style.css" rel="stylesheet">

        <link href="css/ziti/fonts.css" rel="stylesheet">
        <link href="font/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <style>
            <?php echo $info['cstm-style']; ?>
        </style>
    </head>

    <body>

        <?php
            include "functions/menu.php";
        ?>
        <div class="container">
            <div class="row logo">
                <div class="col-lg-12" style="text-align:center">
                    <?php 
                        include "functions/logo.php";
                    ?>
                </div>
            </div>
        </div>
        <div class="container animated flipInY">

            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 style="color: #707070;"> <p><span id="cz"> <span id="counter">3</span> 秒后自动跳转</span></p></h2>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="col-lg-6 text-center">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title newsize" style="font-weight:bolder;">广告</h3>
                        </div>
                        <div class="panel-body">
                            <?php echo '' . $ads_info['ad3'] . ''; ?>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-6 text-center">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title newsize" style="font-weight:bolder;">广告</h3>
                        </div>
                        <div class="panel-body">
                            <?php echo '' . $ads_info['ad4'] . ''; ?>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- JavaScript -->
        <script src="../js/jquery-1.10.2.js"></script>
        <script src="../js/bootstrap.js"></script>

        <script type="text/javascript">
            function countdown() {
                var i = document.getElementById('counter');
                if (parseInt(i.innerHTML) <= 0) {
				    document.getElementById("cz").innerHTML = "现在!";
                    location.href = '<?php echo str_replace("'", "",$url); ?>';
                }
                i.innerHTML = parseInt(i.innerHTML) - 1;
            }
            setInterval(function() {
                countdown();
            }, 1000);
        </script>

    </body>

</html>
