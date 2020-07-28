<?php
include "functions/database.php";
include "functions/count.php";
include "admin/functions/time.php";

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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>统计</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">

        <!-- Custom CSS for the Template -->
        <link href="css/style.css" rel="stylesheet">

        <link href="https://fonts.useso.com/css?family=Fjalla+One" rel="stylesheet">
        <link rel="stylesheet" href="css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <style>
            .nav-tabs > li, .nav-pills > li {
                float:none;
                display:inline-block;
            }

            .nav-tabs {
                text-align:center;
            }
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
                        include "functions/darkmode.php";
                    ?>
                </div>
            </div>
        </div>
            <div class="container animated fadeIn">
                <div class="col-lg-8 col-lg-offset-2" style="margin-tosp:-20px;">
                    <ul class="nav nav-tabs statics-tabs">
                        <li class="active"><a href="#new" data-toggle="tab">最新地址</a></li>
                        <li class=""><a href="#pop" data-toggle="tab">访问最多</a></li>
                        <li class=""><a href="#rec" data-toggle="tab">最近访问</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="new" >
                            <div class="row" style="margin-top:-10px">
                                    <div class="table-responsive">
                                        <table id="file" class="statics table table-bordered table-striped table-hover">

                                            <?php
                                            $result = $db->query("SELECT * FROM links WHERE pass = '' ORDER BY date DESC LIMIT 10 ");
                                            ?>
                                            <thead>
                                                <tr>
                                                    <th>目标网址</th>
                                                    <th>转向链接</th>
                                                    <th>创建日期</th>
													<th>状态统计</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
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
                                                            <a href="<?php echo $info['URL'] . '/' . $row['link']; ?>" target="_blank">
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
														<td>
                                                            <a href="<?php echo $info['URL'] . '/stats.php?id=' . $row['link']; ?>" target="_blank">
                                                                <div class="fa fa-signal" style="height:100%;width:100%">
                                                                统计
																</div>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pop">
                                <div class="row" style="margin-top:-10px">
                                    <div class="table-responsive">
                                        <table id="file" class="statics table table-bordered table-striped table-hover">

                                            <?php
                                            $result = $db->query("SELECT * FROM links WHERE pass = '' ORDER BY hits DESC LIMIT 10 ");
                                            ?>
                                            <thead>
                                                <tr>
                                                    <th>目标网址</th>
                                                    <th>转向链接</th>
                                                    <th>创建日期</th>
                                                    <th>状态统计</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
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
                                                            <a href="<?php echo $info['URL'] . '/' . $row['link']; ?>" target="_blank">
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
														<td>
                                                            <a href="<?php echo $info['URL'] . '/stats.php?id=' . $row['link']; ?>" target="_blank">
                                                                <div class="fa fa-signal" style="height:100%;width:100%">
                                                                    统计
                                                                </div>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="rec">
                                <div class="row" style="margin-top:-10px">
                                    <div class="table-responsive">
                                        <table id="file" class="statics table table-bordered table-striped table-hover">

                                            <?php
                                            $result = $db->query("SELECT * FROM links WHERE pass = '' ORDER BY last_visit DESC LIMIT 10 ");
                                            ?>
                                            <thead>
                                                <tr>
                                                    <th>目标网址</th>
                                                    <th>转向链接</th>
                                                    <th>创建日期</th>
                                                    <th>状态统计</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
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
                                                            <a href="<?php echo $info['URL'] . '/' . $row['link']; ?>" target="_blank">
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
														<td>
                                                            <a href="<?php echo $info['URL'] . '/stats.php?id=' . $row['link'];$db->close_connection(); ?>" target="_blank">
                                                                <div  class="fa fa-signal" style="height:100%;width:100%">
                                                                    统计
                                                                </div>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- JavaScript -->
                <script src="js/jquery-1.10.2.js"></script>
                <script src="js/bootstrap.js"></script>


            </body>

        </html>
