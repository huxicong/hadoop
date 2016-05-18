<?php
require '../autoload.php';
require_once"./config.php";
use Qiniu\Auth;
$accessKey = Config::ACCESS_KEY;
$secretKey = Config::SECRET_KEY;
$auth = new Auth($accessKey, $secretKey);
$baseUrl = 'http://7xq1ht.com1.z0.glb.clouddn.com/config.php';
$authUrl = $auth->privateDownloadUrl($baseUrl);
downfile($auth);
?>