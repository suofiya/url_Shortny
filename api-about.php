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

        <title>Api - <?php echo $info['name']; ?></title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">

        <!-- Custom CSS for the Template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="https://fonts.loli.net/css?family=Fjalla+One" rel="stylesheet">
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
                        include "functions/darkmode.php";
                    ?>
                </div>
            </div>
        </div>
        <div class="container  animated fadeIn">

            <div class="row" style="margin-top: -25px;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="myModalLabel">Api 开发工具</h2>
                        </div>
                        <div class="modal-body" style="min-height:10%; max-height:350px; overflow-y:scroll; overflow-x:none; position:relative;">
                            <h4 class="text-center">你可以使用我们的API服务创建使用短网址</h4>
                            <br>
                            <h5><strong>基础 URL</strong> </h5>
                            <div style="margin-left:25px;">
                                <h5>输入 <strong><?php echo $info['URL'] . '/api.php?url=XXX'; ?> </h5>								
                                <h5><strong>XXX</strong> 是你的 <strong>目标网址 </strong>，请输入一个有效的网址, 使用 <strong>http:// 或 https:// 开头</h5>								
                                <h5>输出 <strong><?php echo $info['URL'] . '/{alias}'; ?> </h5>	
                            </div>
                            <br>
                            <h5><strong>自定义链接</strong> </h5>
                            <div style="margin-left:25px;">
                                <h5>输入 <strong><?php echo $info['URL'] . '/api.php?url=XXX&cust=YYY'; ?> </h5>								
                                <h5><strong>XXX</strong> 是你的 <strong>目标网址 </strong>，请输入一个有效的网址，使用 <strong>http:// 或 https:// 开头</h5>								
                                <h5><strong>YYY</strong> 是你的 <strong>自定义链接 </strong> 只能是字母数字（允许使用下划线和破折号）</h5>								
                                <h5>输出 <strong><?php echo $info['URL'] . '/YYY'; ?> </h5>	
                            </div>
                            <br>
                            <h5><strong>使用带密码的链接</strong> </h5>
                            <div style="margin-left:25px;">
                                <h5>输入 <strong><?php echo $info['URL'] . '/api.php?url=XXX&pass=ZZZ'; ?> </h5>								
                                <h5><strong>XXX</strong> 是你的 <strong>目标网址 </strong>，请输入一个有效的网址，使用 <strong>http:// 或 https:// 开头</h5>								
                                <h5><strong>ZZZ</strong> 是你的 <strong>访问密码 </strong> 只能是字母数字（允许使用下划线和破折号）</h5>								
                                <h5>输出 <strong><?php echo $info['URL'] . '/{alias}'; ?> </h5>	
                            </div>
                            <br>
                            <h5><strong>使用自定义链接和密码的链接</strong> </h5>
                            <div style="margin-left:25px;">
                                <h5>输入 <strong><?php echo $info['URL'] . '/api.php?url=XXX&cust=YYY&pass=ZZZ'; ?> </h5>								
                                <h5><strong>XXX</strong> 是你的 <strong>目标网址 </strong>，请输入一个有效的网址，使用 <strong>http:// 或 https:// 开头</h5>								
                                <h5><strong>YYY</strong> 是你的 <strong>自定义链接 </strong> 只能是字母数字（允许使用下划线和破折号）</h5>								                                   
                                <h5><strong>ZZZ</strong> 是你的 <strong>访问密码 </strong> 只能是字母数字（允许使用下划线和破折号）</h5>								
                                <h5>输出 <strong><?php echo $info['URL'] . '/YYY'; ?> </h5>									
                            </div>
                        </div>
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
