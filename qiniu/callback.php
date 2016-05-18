<?php
    $_body = file_get_contents('php://input');
    $body = json_decode($_body, true);
    $uid = $body['uid'];
    $fname = $body['fname'];
    $fkey = $body['fkey'];
    $desc = $body['desc'];
    echo "<br/>";
    echo "string";
?>