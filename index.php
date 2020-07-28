<?php
if (!(include "functions/database.php")) {
    echo "<a href='install/index.html'>Please Install the script first or make sure it is installed correctly.</a>";
    exit;
}
include "functions/count.php";

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
        <title>QINYUHUI DL</title>
        <meta name=keywords content="免费网址缩短,链接高速转发、超长链接缩短，短链加密，自定义短链，短链二维码，短链访问统计，免费短链API，免费二维码API，二维码API调用，个人二维码API搭建，短链平台，高防短链，链接跳转">
        <meta name=description content="免责声明：本站永久免费! 专门提供带统计的短网址服务，短网址均由用户生成，所跳转网站内容均与本站无关! ">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="360-site-verification" content="29c3e23c8b2848a6ce00ed83234c9ed4" />
        
        <meta name='twitter:url' content='<?php echo $info["URL"]; ?>'>
        <meta name='twitter:title' content='<?php echo $info['name']; ?>'>
        <meta property="og:title" content="<?php echo $info['name']; ?>">
        <?php
            $logo_url = $info['logo_url'];
            if (strpos($logo_url,";")) {
                $logo_url = explode(";",$logo_url);
                if (empty($logo_url[1])) {
                    $logo_url[1] = $logo_url[0];
                }
            } else {
                $logo_url = [$logo_url,$logo_url];
            }
            $logo_tag = "";
            if ($info['logo_type'] == 1) {
                $logo_tag = "<meta property=\"og:image\" content='$logo_url[0]'>";
            }
            echo $logo_tag;
        ?>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">

        <!-- Custom CSS for the Template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/ziti/fonts.css" rel="stylesheet">
        <link rel="stylesheet" href="css/a/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

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
        <div class="container animated fadeIn" style="max-width: 950px;">
            <form  action="create.php" method="POST" enctype="multipart/form-data">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="input-group">
                            <input id="urlbox" class="form-control cz-shorten-input" name="longurl" value="" type="text" data-validation-error-msg=" ">
                            <span class="input-group-btn">
                                <button class="btn btn-large btn-primary cz-shorten-btn" type="submit" id="submit">立即生成</button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-lg-6">
                        <div class="input-group" style="margin-top: 2px;">
                            <span class="input-group-addon"><?php echo $info['URL']; ?>/</span>
                            <input type="text" id="cust"  data-validation="alphanumeric" data-validation-allowing="-_" data-validation-optional="true" data-validation-error-msg=" " name="cust" class=" span5 form-control" placeholder="自定义链接（可选）">
                        </div>
                    </div>
                    <div class="col-lg-6" style="margin-top: 2px;">
                        <div class="input-group">
                            <span class="input-group-addon">设置链接密码<i class="fa fa-lock"></i></span>
                            <input type="text"  data-validation="alphanumeric" data-validation-allowing="-_" data-validation-optional="true" data-validation-error-msg=" " id="pass" name="pass" class="form-control" placeholder="密码（可选）">
                        </div>
                    </div>
                    
<p>&nbsp;</p>
                    <p><div align="center"></p><h4>需要生成的地址必须带http://或者https://否则提示无效链接！</h4> </p></div>
                    <p><div align="center"></p><h5>免责声明：本站永久免费! 提供自定义短链带密码短链带独立统计的短网址服务，短网址均由用户生成，所跳转网站内容均与本站无关!</h5> </p></div>
                </div>
            </form>
            <div class="row" style="">
                <div class="col-lg-12" style="text-align: center; margin-top: 20px;">
                    <?php echo '' . $ads_info['ad1'] . ''; ?>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;" >
                <div class="col-lg-4 text-center">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h2 class="newsize" style="font-weight:bolder;"> 总点击量 </h2> 
                            <h2 class="newsize" style="letter-spacing:1px;"><?php echo $num_rows3; ?></h2>
                        </div>
                    </div>            
                </div>
                <div class="col-lg-4 text-center">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h2 class="newsize" style="font-weight:bolder;"> 总计转址 </h2>
                            <h2 class="newsize" style="letter-spacing:1px;"><?php echo $num_rows1; ?></h2>

                        </div>
                    </div>            
                </div>
                <div class="col-lg-4 text-center">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h2 class="newsize" style="font-weight:bolder;"> 今日转址 </h2> 
                            <h2 class="newsize" style="letter-spacing:1px;"><?php echo $num_rows2; ?></h2>

                        </div>
                    </div>            
                </div>
            </div>
        </div>
          <!-- JavaScript -->
        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.form-validator.min.js"></script>
        <script>
            $.validate({
                modules: 'security'
            });
	    </script>


    </body>
</html>
<?php $db->close_connection(); ?>