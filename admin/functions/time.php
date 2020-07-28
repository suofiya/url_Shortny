<?php
function time_ago($date)
 
{
 
if(empty($date)) {
 
return "未提供日期";
 
}
 
$periods = array("秒", "分钟", "小时", "天", "周", "月", "年", "十年");
 
$lengths = array("60","60","24","7","4.35","12","10");
 
$now = time();
 
$unix_date = strtotime($date);
 
// check validity of date
 
if(empty($unix_date)) {
 
return "坏日期";
 
}
 
// is it future date or past date
 
if($now > $unix_date) {
 
$difference = $now - $unix_date;
 
$tense = "之前";
 
} else {
 
$difference = $unix_date - $now;
$tense = "之前";}
 
for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
 
$difference /= $lengths[$j];
 
}
 
$difference = round($difference);
 
if($difference != 1) {
 
$periods[$j].= "s";
 
}
 
return "$difference $periods[$j] {$tense}";
 
}
?>