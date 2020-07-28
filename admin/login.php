<?php
ob_start();

session_start();

if (isset($_SESSION["valid_user"])) {
    Header("Location: index.php");
}

// dBase file
include "../functions/database.php";

$data = $db->query("SELECT * FROM settings");
$info = $db->fetch_array($data);



if ($_SERVER["REQUEST_METHOD"] == "POST" && $_GET["op"] == "login") {
    if (!$_POST["username"] || !$_POST["password"]) {
        die("You need to provide a username and password.");
    }

    $user = $_POST['username'];
    $pass = $_POST['password'];
    $sql = $db->query("SELECT admin_user, admin_pass FROM settings WHERE admin_user = '$user'");
    $sql = $db->fetch_array($sql);
    $name = $sql["admin_user"];
    $mypass = $sql["admin_pass"];


    if (password_verify($pass,$mypass)) {
        // Login good, create session variables
        $_SESSION["valid_id"] = $id;
        $_SESSION["valid_user"] = $_POST["username"];
        $_SESSION["valid_time"] = time();

        // Redirect to member page
        Header("Location: index.php");
    } else {
        // Login not successful
        echo "错误不正确";
    }
} else {
    ?>

    <!DOCTYPE html>
    <html class="full" lang="zh">
        <!-- The full page image background will only work if the html has the custom class set to it! Don't delete it! -->

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="">
            <meta name="author" content="">

            <title>登录 - <?php echo $info['name']; ?></title>

            <!-- Bootstrap core CSS -->
            <link href="../css/bootstrap.min.css" rel="stylesheet">

            <!-- Custom CSS for the 'Full' Template -->
            <link href="../font/css/font-awesome.css" rel="stylesheet">
            <style>

            </style>
        </head>

        <body>

            <div class="container" style="margin-top:150px">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title"><strong>登录 </strong></h3></div>
                        <div class="panel-body">
                            <form role="form" method="post" action="?op=login">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">用户名</label>
                                    <input type="text" class="form-control" style="border-radius:0px" name="username" placeholder="请输入用户名">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">密码 </label>
                                    <input type="password" class="form-control" style="border-radius:0px" name="password" placeholder="请输入密码">
                                </div>
                                <button type="submit" class="btn btn-sm btn-default">登录</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- JavaScript -->
            <script src="js/jquery-1.10.2.js"></script>
            <script src="js/bootstrap.js"></script>
            <script src="valid/jquery.form-validator.js"></script>


        </body>

    </html>
    <?php
}
?>
