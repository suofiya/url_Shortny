<?php

$today = date("Y-m-d");
$result1 = $db->query("SELECT * FROM links");
$num_rows1 = $db->num_rows($result1);


$result2 = $db->query("SELECT * FROM links WHERE DATE(date) = '$today' ");
$num_rows2 = $db->num_rows($result2);

$result3 = $db->query("SELECT SUM(hits) FROM links");
$row3 = $db->fetch_array($result3);
$num_rows3 = $row3['SUM(hits)'];
?>