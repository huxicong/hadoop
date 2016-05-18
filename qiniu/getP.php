<?php
require_once './autoload.php';
require_once'./config.php';
use Qiniu\Auth;
$accessKey=Config::ACCESS_KEY;
$secretKey=Config::SECRET_KEY;

// 构建Auth对象
$auth = new Auth($accessKey, $secretKey);

// 私有空间中的外链 http://<domain>/<file_key>
$baseUrl = 'http://7xscnh.media1.z0.glb.clouddn.com/01bgz';
// 对链接进行签名
$signedUrl = $auth->privateDownloadUrl($baseUrl,10);

echo $signedUrl;