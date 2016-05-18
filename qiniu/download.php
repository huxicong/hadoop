<?php
require 'autoload.php';
require_once"config.php";
use Qiniu\Auth;

$accessKey = Config::ACCESS_KEY;
$secretKey = Config::SECRET_KEY;
$auth = new Auth($accessKey, $secretKey);

//构造下载url就可以了，私有空间m3u8下载url的形式如下
$baseUrl = 'http://7xpyzu.com1.z0.glb.clouddn.com/aaa%2Faaa';
$authUrl = $auth->privateDownloadUrl($baseUrl);
echo $authUrl;
?>