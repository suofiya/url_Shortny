<?php
session_start();
if (!$_SESSION["valid_user"]) {
    Header("Location: login.php");
}
include "functions/time.php";
include "../functions/database.php";

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

        <title>链接 - <?php echo $info['name']; ?></title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../font/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <!-- Custom CSS -->
        <link href="css/scrolling-nav.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../css/alertify.core.css" />
        <link rel="stylesheet" href="../css/alertify.bootstrap.css" />

    </head>

    <!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->
    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<?php
include "functions/menu.php"
?>

        <div id="services" class="services-section">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="table" class="table table-bordered table-hover table-striped tablesorter">			<!--we create here table heading-->
                                <thead>
                                    <tr>
                                        <th>ID <i class="fa fa-sort"></i></th>
                                        <th>目标网址 <i class="fa fa-sort"></i></th>
                                        <th>短链 <i class="fa fa-sort"></i></th>
                                        <th>点击次数 <i class="fa fa-sort"></i></th>
                                        <th>创建日期 <i class="fa fa-sort"></i></th>
                                        <th>上次访问 <i class="fa fa-sort"></i></th>
                                        <th>删除 <i class="fa fa-sort"></i></th>

                                    </tr>
                                </thead>

                                <tbody>
<?php
//number of results to show per page
$rec_limit = 10;


/* Get total number of records */
$sql = "SELECT count(id) FROM links";
$retval = $db->query($sql);
if (!$retval) {
    die('错误：无法检索数据。');
}

$row = $db->fetch_array($retval);
$rec_count = $row['count(id)'];

if (isset($_GET{'page'})) { //get the current page
    $page = $_GET{'page'} + 1;
    $offset = $rec_limit * $page;
} else {
    // show first set of results
    $page = 0;
    $offset = 0;
}
$left_rec = $rec_count - ($page * $rec_limit);
//we set the specific query to display in the table
$sql = "SELECT id, URL, hits, link, date, last_visit " . "FROM links " . "ORDER BY date DESC LIMIT $offset, $rec_limit ";

$retval = $db->query($sql);
if (!$retval) {
    die('错误：无法检索数据。');    
}
//we loop through each records
while ($row = $db->fetch_array($retval)) {
    $showdate = date('d M Y', strtotime($row['date']));
		$count01 = mb_strlen( $row['URL']);
		if($count01 > 50){
		    $myurl =  substr($row['URL'],0,50)."...";
		} else {
				$myurl = $row['URL'];
		}

    //populate and display results data in each row
    echo '<tr class="record">';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td><a href="' . $row['URL'] . '">' . $myurl . '</a></td>';
    echo '<td><a href="' . $info['URL'] . '/' . $row['link'] . '">' . $row['link'] . '</td>';
    echo '<td>' . $row['hits'] . '</td>';
    echo '<td>' . $showdate . '</td>';
    echo '<td>' . time_ago($row['last_visit']) . '</td>';
    echo '<td><div align="center"><a href="#" id="' . $row['id'] . '" class=" delbutton fa fa-times" title="单击“删除”"></a></div></td>';
}

echo '</tr>';
echo '</tbody>';
echo '</table>';
//we display here the pagination
echo '<ul class="pager">';
if ($left_rec < $rec_limit) {
    $last = $page - 2;
    echo @"<li><a href=\"$_PHP_SELF?page=$last\">前面一个</a></li>";
} else if ($page == 0) {
    echo @"<li><a href=\"$_PHP_SELF?page=$page\"> <li>后面一个</a></li>";
} else if ($page > 0) {
    $last = $page - 2;
    echo @"<li><a href=\"$_PHP_SELF?page=$last\">前面一个</a></li> ";
    echo @"<li><a href=\"$_PHP_SELF?page=$page\">后面一个</a></li>";
}
echo '</ul>';
$db->close_connection();
?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Core JavaScript Files -->
        <script src="../js/jquery-1.10.2.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="js/jquery.easing.min.js"></script>
        <script src="../js/alertify.min.js"></script>
        <script src="../js/jquery.tablesorter.js"></script>

        <script type="text/javascript">
            $(function() {


                $(".delbutton").click(function() {

                    //Save the link in a variable called element
                    var element = $(this);

                    //Find the id of the link that was clicked
                    var del_id = element.attr("id");

                    //Built a url to send
                    var info = 'ccz=' + del_id;
                    alertify.confirm("你确定？无法撤消此步骤", function(e) {
                        if (e) {
                            $.ajax({
                                type: "GET",
                                url: "functions/delete.php",
                                data: info,
                                success: function() {

                                }
                            });
                            element.parents(".record").animate({
                                backgroundColor: "#fbc7c7"
                            }, "fast")
                                    .animate({
                                        opacity: "hide"
                                    }, "slow");
                            alertify.error("链接已删除！");
                        }

                        else {
                            // user clicked "cancel"
                            alertify.log("链接没有删除");
                        }
                    });


                    return false;

                });

            });
            $(function() {
                $("#table").tablesorter({debug: true});
            });
        </script>
    </body>

</html>

<?php $db->close_connection(); ?>