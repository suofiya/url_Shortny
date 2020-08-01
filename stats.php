<?php
include "functions/database.php";
include "admin/functions/time.php";

$data = $db->query("SELECT * FROM settings");
$info = $db->fetch_array($data);

$shr = $db->escape_value($_GET['id']);

$sql = $db->query("SELECT URL, date, hits, id, pass, last_visit FROM links WHERE BINARY link = '$shr'");
$sql = $db->fetch_array($sql);
$url = $sql["URL"];
$date = $sql["date"];
$hits = $sql["hits"];
$id = $sql["id"];
$pass = $sql["pass"];
$last_visit = $sql["last_visit"];

if ($url == '') {
    $error_msg = "找不到您跳转的链接";
    include "functions/error.php"; //error page
    $db->close_connection();
    exit;
} else {
    $myweb = $info['URL'];
    $created_link = $myweb . '/' . $shr;
    ?>
    <!DOCTYPE html>
    <html class="full" lang="zh">
        <!-- The full page image background will only work if the html has the custom class set to it! Don't delete it! -->

        <head>
		    <base href="<?php echo $info['URL']; ?>/" />
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="">
            <meta name="author" content="">

            <title>URL统计</title>

            <!-- Bootstrap core CSS -->
            <link href="css/bootstrap.css" rel="stylesheet">

            <!-- Custom CSS for the 'Full' Template -->
            <link href="css/style.css" rel="stylesheet">

            <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
            <link rel="stylesheet" href="all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
            <link href="css/animate.css" rel="stylesheet">

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
                <div class="container animated fadeIn">
                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="input-group">
                            <input id="urlbox" class="form-control Url-field" name="url" value="<?php echo $created_link; ?>" type="text" >
                            <span class="input-group-btn">
                                <button class="btn btn-small btn-success Copy-btn col-lg-pull-12" type="copy" id="copy-button">复制</button>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 QR colored rounded flex-col">
                            <div class="col-lg-12"><h3 class="text-center"> 短链统计二维码</h3></div>
                            <div class="col-lg-12"><img alt="API接口错误请联系管理员！" src="qr/api.php?text=<?php echo $created_link; ?>&size=200 " class="size center-block"/></div>
                            <hr>
                            <div class="col-lg-12  text-center">
                                <a target="_blank"  href="http://www.facebook.com/sharer.php?u=<?php echo $created_link; ?>"><i class="fab fa-facebook-f fa-3x fb anim "></i></a>
                                <a target="_blank"  href="https://twitter.com/share?url=<?php echo $created_link; ?>"><i class="fab fa-twitter fa-3x twit anim "></i></a>
                                <a  target="_blank"  href="https://plus.google.com/share?url=<?php echo $created_link; ?>"> <i class="fab fa-google-plus fa-3x gplus anim"></i></a>
                                <a target="_blank"  href="https://service.weibo.com/share/share.php?url=<?php echo $created_link; ?>"><i class="fab fa-weibo fa-3x pin anim"></i></a>

                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-5 bg-primary rounded shadow flex-col">
                            <div class="col-lg-12">
                                <h2 class="text-center"><strong>总点击量</strong></h2>
                                <h3 class="text-center"><?php echo $hits; ?></h3>
                                <hr>
                                <h2 class="text-center"><strong>最后访问</strong></h2>
                                <h3 class="text-center" title="<?php echo $last_visit; ?>"><?php echo time_ago($last_visit); ?></h3>
                                <hr>
                                <h2 class="text-center col-lg-12"><strong>创建日期</strong></h2>
                                <h3 class="text-center col-lg-12" title="<?php echo $date; ?>"><?php echo date('20y年m月d日', strtotime($date)); ?></h3>
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
                $("#copy-button").click(function () {
                    $(this).html("复制成功");
                    $("#urlbox").select();
                    document.execCommand("copy");
                });
            });
        </script>


    </body>
    </html>
    <?php
}
$db->close_connection();
?>
