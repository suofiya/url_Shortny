<!DOCTYPE html>
<html class="full" lang="zh">

    <head>
	    <base href="<?php echo $info['URL']; ?>/" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>谢谢你 - <?php echo $info['name']; ?></title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">

        <!-- Custom CSS for the Template -->
        <link href="css/style.css" rel="stylesheet">

        <link href="css/ziti/fonts.css" rel="stylesheet">
        <link href="font/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
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
        <div class="container">
            <div class="row logo">
                <div class="col-lg-12" style="text-align:center">
                    <?php 
                        include "functions/logo.php";
                    ?>
                </div>
            </div>
        </div>
        <div class="container animated tada">
            <div class="row" style="margin-top:20px">
                <div class="modal-dialog">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title" id="contactLabel"><span class="fa fa-info-circle"></span> 谢谢你</h4>
                        </div>
                        <form method="post" action="?op=contact" accept-charset="utf-8">
                            <div class="modal-body">
                                <div class="row">
                                    <h3 class="text-info" style="text-align: center"> 我们已经收到你的消息 </h3> 
                                </div>
                            </div>

                    </div>
                </div>
            </div>


        </div>
        <!-- JavaScript -->
        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/jquery.zclip.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $("#copy-button").zclip({
                    path: "js/ZeroClipboard.swf",
                    copy: function() {
                        return $('#urlbox').val();
                    },
                    beforeCopy: function() {
                    },
                    afterCopy: function() {
                        $("#copy-button").html('Copied');
                    }
                });
            });
        </script>
    </body>

</html>
