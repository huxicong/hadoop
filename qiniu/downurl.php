<?php
require_once './autoload.php';
require_once'./config.php';
use Qiniu\Auth;

$accessKey = 'Access_Key';
$secretKey = 'Secret_Key';

// 构建Auth对象
$auth = new Auth(Config::ACCESS_KEY, Config::SECRET_KEY);
//header("Content-type: text/html; charset=");
$nam=urlencode('胡.docx');
$baseUrl = "http://7xqdsh.com2.z0.glb.clouddn.com/jj.jpg?attname=".$nam; 
// 私有空间中的外链 http://<domain>/<file_key>
//$baseUrl = 'http://sslayer.qiniudn.com/1.jpg?imageView2/1/h/500';
// 对链接进行签名
$signedUrl = $auth->privateDownloadUrl($baseUrl);

echo $signedUrl;