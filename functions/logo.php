<?php
$logo_url = $info['logo_url'];
if (strpos($logo_url,";")) {
    $logo_url = explode(";",$logo_url);
    if (empty($logo_url[1])) {
        $logo_url[1] = $logo_url[0];
    }
} else {
    $logo_url = [$logo_url,$logo_url];
}
if ($info['logo_type'] == 1) {
    $logo_tag = '<a style="color: inherit;margin:auto;" href="' . $info['URL'] . '" ><img id="main-logo" alt="'.$info['name'].' Logo" src="' . $logo_url[0] . '" class="sized" /></a>';
} else {
    $logo_tag = '<a class="logo-text" style="color: inherit;" href="' . $info['URL'] . '" ><p class="font"><strong>' . $info['name'] . '</strong></p></a>';
}
echo $logo_tag
?>
