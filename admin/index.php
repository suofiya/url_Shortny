<?php
session_start();

if (!$_SESSION["valid_user"]) {
    Header("Location: login.php");
}
include "../functions/database.php";
include "../functions/count.php";
include "functions/time.php";


$data = $db->query("SELECT * FROM settings");
$info = $db->fetch_array($data);
?>
<!DOCTYPE html>
<html lang="zh">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>管理面板 - <?php echo $info['name']; ?></title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">

        <!-- Custom CSS -->
        <link href="css/scrolling-nav.css" rel="stylesheet" type="text/css">
        <link href="../font/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    </head>

    <!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

        <?php
        include "functions/menu.php"
        ?>
        <div id="services" class="services-section">
            <div class="container">
                <div class="row" style="margin-top: 30px; margin-top:-25px;">
                    <div class="col-lg-4 text-center">
                        <div class="panel panel-default">
                            <div class="panel-body" style="background-color:#428bca; color:white;">
                                <h2 class="newsize" style="font-weight:bolder;">总计点击</h2>
                                <h2 class="newsize" style="letter-spacing:1px;"><?php echo $num_rows3; ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center">
                        <div class="panel panel-default">
                            <div class="panel-body" style="background-color:#428bca; color:white;">
                                <h2 class="newsize" style="font-weight:bolder;">总计转址</h2>
                                <h2 class="newsize" style="letter-spacing:1px;"><?php echo $num_rows1; ?></h2>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center">
                        <div class="panel panel-default">
                            <div class="panel-body" style="background-color:#428bca; color:white;">
                                <h2 class="newsize" style="font-weight:bolder;">今日转址</h2>
                                <h2 class="newsize" style="letter-spacing:1px;"><?php echo $num_rows2; ?></h2>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h1>最新链接</h1>

                    <div class="row">
                        <div class="table-responsive">
                            <table id="file" class="table table-bordered table-striped table-hover">

                                <?php
// get results from database
                                $result = $db->query("SELECT * FROM links ORDER BY date DESC LIMIT 10 ");
                                ?>
                                <thead>
                                    <tr>
                                        <th>目标网址</th>
                                        <th>短链</th>
                                        <th>创建日期</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
// loop through results of database query, displaying them in the table
                                    while ($row = $db->fetch_array($result)) {
									$count01 = mb_strlen( $row['URL']);
												if($count01 > 50){
												$myurl =  substr($row['URL'],0,50)."...";
												} else {
												$myurl = $row['URL'];
												}
                                        ?>

                                        <tr class="record">
                                            <td>
                                                <a href="<?php echo $row['URL']; ?>" target="_blank">
                                                    <div style="height:100%;width:100%">
                                                        <?php echo $myurl; ?>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo $info['URL'] . '/' . $row['link']; ?>" target="_blank">
                                                    <div style="height:100%;width:100%">
                                                        <?php echo $row['link']; ?>
                                                    </div>
                                                </a>
                                            </td>
                                            <td><?php echo time_ago($row['date']); ?></td>
                                        </tr>

                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
									<div class="row">
				<form target="_blank" action="clean.php">
				<h3>删除上次访问时间早于 <input type="text" name="d" class="aform-control"> 天的链接</h3>
				<input type="submit" name="submit" id="submit" value="删除" class="btn btn-danger btn-lg">
				</form>
				</div>

                </div>

            </div>



            <!-- Core JavaScript Files -->
            <script src="../js/jquery-1.10.2.js"></script>
            <script src="../js/bootstrap.min.js"></script>
            <script src="js/jquery.easing.min.js"></script>

            <!-- Custom Theme JavaScript -->

    </body>

</html>
