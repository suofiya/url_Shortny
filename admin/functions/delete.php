<?php

include('../../functions/database.php');
if ($_GET['ccz']) {
    $id = $_GET['ccz'];


    $sql = "DELETE FROM links WHERE id='$id'";
    $db->query($sql);
}
?>