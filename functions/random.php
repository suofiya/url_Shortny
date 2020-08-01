<?php

function generateRandomString($length = 5, $letters = '1234567890QWERTYUOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjkzxcvbnm') {
    $s = '';
    $lettersLength = strlen($letters) - 1;

    for ($i = 0; $i < $length; $i++) {
        $s .= $letters[rand(0, $lettersLength)];
    }

    return $s;
}

$rand = generateRandomString();
$rand2 = generateRandomString();
?>