<!DOCTYPE html>
<html class="full" lang="en">

    <head>
	    <base href="<?php echo $info['URL']; ?>/" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>成功生成短链接</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">

        <!-- Custom CSS for the Template -->
        <link href="css/style.css" rel="stylesheet">

        <link href="https://88zn.top/dl/index.php?https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
        <link rel="stylesheet" href="./css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <style>
            a { color: inherit; }
        </style>
        <style>
            <?php echo $info['cstm-style']; ?>
        </style>
    </head>

    <body>

        <?php
            include "functions/menu.php";
        ?>
        <div class="container" style="margin-top: -20px;">
        <div class="row logo">
            <div class="col-lg-12" style="text-align:center">
                <?php 
                    include "functions/logo.php";
                    include "functions/darkmode.php";
                ?>
            </div>
        </div>
        </div>
        <div class="container animated fadeIn">

            <div class="row">
                <div class="col-lg-10 col-lg-offset-1" style="margin-bottom: -25px;">
                    <div class="alert alert-dismissable alert-default text-center">
                        <h4  style="margin-bottom: -4px; color: #707070;"> 短链接及二维码成功生成！ </h4> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="input-group">
                        <input id="urlbox" class="form-control cz-shorten-input" readonly name="url" value="<?php echo $created_link; ?>"  type="text">
                        <span class="input-group-btn">
                            <button class="btn btn-large btn-primary cz-shorten-btn" type="submit" id="copy-button">复制</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="col-lg-4 text-center">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-inverted" style="font-weight:bolder;color: #fff;">短链二维码</h3>
                        </div>
                        <div class="panel-body">
                            <img src="qr/api.php?text=<?php echo $created_link; ?>&size=180">
                        </div>
                    </div>
                </div>
                
                    <!-- row -->
                    <div class="row" style="margin-top: -0px;margin-right:15px;margin-left:15px;">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title newsize" style="font-weight:bolder;">您的短链专属统计链接</h3>
                            </div>
                            <div class="panel-body">
                                <h4 style="margin-bottom: 20px; color: #707070;font-size: 20px;color: #ff0000;margin-top:10px;"> 这是你的专属短链统计页面链接请自行保存！ </h4>
                                <a style="color: #2296f3;"href="<?php echo $info['URL'] . '/stats.php?id=' . $rand1; ?>"> <h3>   <?php echo $info['URL'] . '/stats.php?id=' . $rand1; ?></h3></a>
                                
                                <h4 style="margin-bottom: 20px; color: #707070;font-size: 24px;color: #ff0000;margin-top:28px;"> 严禁生成违法链接！一经发现直接删除！并举报违规链接！ </h4>

                            </div>
                        </div>
                    </div>
                    <!-- row -->
                </div>
        <!-- JavaScript -->
        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/jquery.zclip.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $("#copy-button").click(function () {
                    $(this).html("已成功复制到粘贴板");
                    $("#urlbox").select();
                    document.execCommand("copy");
                });
            });
        </script>
 
        
    </body>
</html>
