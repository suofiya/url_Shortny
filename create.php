<?php
include "functions/random.php";
include "functions/database.php";

$data = $db->query("SELECT * FROM settings");
$info = $db->fetch_array($data);

//原版正则$url_reg = '/((([A-Za-z]{3,9}:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[.\!\/\\\\w]*))?)/i';
//可用正则$url_reg = '@(?i)\b((?:[a-z][\w-]+:(?:/{1,3}|[a-z0-9%])|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:\'".,<>?«»“”‘’]))@';
$url_reg = '/^(http|https|ftp):\/\/[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^\"])*$/'; 

$verify = preg_match($url_reg, $_POST['longurl'],$new_url);
$cust = $_POST['cust'];
$pass = $_POST['pass'];
$myweb = $info['URL'];

$spam = array("admin", "contact", "tos", "about", "api-about","404");

if (in_array($cust, $spam)){
    $error_msg = "您的自定义信息被标记为垃圾邮件"; //error message
    include "functions/error.php"; //error page
} else {
    if (!($verify)) {
        $error_msg = "无效的网址"; //error message
        include "functions/error.php"; //error page
        exit();
    }
    if (ctype_space($new_url[0]) OR $new_url[0] == '') {
        $error_msg = "您的网址为空"; //error message
        include "functions/error.php"; //error page
        exit();
    }
    $chk_rand = $db->query("SELECT link FROM links WHERE BINARY link = '$rand'");
    if ($db->num_rows($chk_rand) == 0) {
        $nrand = $rand;
    } else {
        $nrand = $rand2;
    } // checking the generated random links

    $chk_cust = $db->query("SELECT link FROM links WHERE BINARY link = '$cust'");
    if ($db->num_rows($chk_cust) == !0) {
        $error_msg = "您选择的自定义链接是重复的"; //error message
        include "functions/error.php"; //error page
        exit();
    }

    if (ctype_space($cust) OR $cust == '') {
        $rand1 = $nrand;
        $is_cust = 0;
    } else {
        $rand1 = $cust;
        $is_cust = 1;
    } // checking if there a custom link (space checking added)

    if (ctype_space($pass) OR $pass == '') {
        $npass = '';
    } else {
        $npass = $pass;
    } // checking if there a password (space checking added)

    $action = $db->query("INSERT INTO links (URL, link, pass, custom, last_visit) 
                    VALUES ('$new_url[0]','$rand1','$npass','$is_cust', NOW())");
    if (!$action) {
        $error_msg = "有技术错误，请再试一次";
        include "functions/error.php";
        $db->close_connection();
        exit();
    } else {
        $created_link = $myweb . '/' . $rand1;
        include "functions/created.php";
        $db->close_connection();
        exit();
    }
}
?>