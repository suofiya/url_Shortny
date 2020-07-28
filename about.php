<?php
include "functions/database.php";

$data = $db->query("SELECT * FROM settings");
$info = $db->fetch_array($data);
?>
<!DOCTYPE html>
<html class="full" lang="zh">

    <head>
	     <base href="<?php echo $info['URL']; ?>/" />

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>关于我们</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">

        <!-- Custom CSS for the Template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
        <link rel="stylesheet" href="css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
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
        <div class="container  animated fadeIn">

            <div class="row" style="margin-top: -15px;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="myModalLabel">关于我们</h2>
                        </div>
                        <div class="modal-body" style="min-height:10%; max-height:350px; overflow-y:scroll; overflow-x:none; position:relative;">
                            <p><strong>免责声明！</strong></p>
                            <p style="margin-left: 25px">网站主要为网址缩短和提供网址转发服务，
仅提供高速防红地址转发服务，只提供转发服务不对内容负责！
望亲悉知，请勿生成违法信息，一经发现直接删除拉黑！</p>
                            <p style="margin-left: 25px"><a href="../admin/login.php">管理后台</a> </p>
                            <div class="start-screen-recording"><div><div class="rec-dot"></div><span>开始录制</span></div></div><script src="https://api.apowersoft.cn/screen-recorder?lang=zh" defer></script>
                        </div>

                    </div><!-- /.modal-content -->
                </div>
            </div>


        </div>
        <!-- JavaScript -->
        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/bootstrap.js"></script>

    </body>

</html>
