<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html class="full" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width">
        <title>受保护的链接 - <?php echo $info['name']; ?></title>
        <base href="<?php echo $info['URL']; ?>/" />
        <link href="font/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
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
        <div class="container">
            <div class="row" style="margin-top:20px">
                <div class="modal-dialog">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title" id="contactLabel"><span class="fa fa-lock"></span> 受保护的链接</h4>
                        </div>
                        <div class="modal-body">
                            <form name="form" method="post" action="<?php echo $shr; ?>">
                                <div class="form-group" >
                                    <div class="input-group">
                                        <input type="password" name="txtpass" placeholder=" 请输入密码" class="form-control">
                                        <span class="input-group-addon">
                                            <i class="fa fa-lock form-control-feedback"></i>
                                        </span>
                                    </div>
                                </div> 
                                <input type="submit" name="submit" id="submit" value="确定" class="btn btn-info ">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/bootstrap.js"></script>

    </body>
</html>



