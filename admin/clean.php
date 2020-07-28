<?php
session_start();
if (!$_SESSION["valid_user"]) {
    Header("Location: login.php");
}
?>
<?php
include('../functions/database.php');
if ($_GET['d']) {

    $id = $_GET['d'];

if ($_SESSION["valid_user"]) {
    $sql = "DELETE from `links` where last_visit<DATE_SUB(curdate(), INTERVAL $id DAY)";
    $db->query($sql);
	echo "清理成功";
	} else {
	echo "错误";
	}
}else {
echo "错误";
	}
	
?>