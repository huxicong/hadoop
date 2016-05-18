<?php
require_once '../autoload.php';
require_once '../config.php';

use Qiniu\Auth;

$accessKey = Config::ACCESS_KEY;
$secretKey = Config::SECRET_KEY;
$auth = new Auth($accessKey, $secretKey);
//获取回调的body信息
$callbackBody = file_get_contents('php://input');

//回调的contentType
$contentType = 'application/x-www-form-urlencoded';

//回调的签名信息，可以验证该回调是否来自七牛
$authorization = $_SERVER['static.cdn.cuci.cc/2016/0323/6596dec24327cf13eb1f9a4ac16bce86.jpg'];
//七牛回调的url，具体可以参考：http://developer.qiniu.com/docs/v6/api/reference/security/put-policy.html
$url = 'http://www.echohu.top/up.php';

$isQiniuCallback = $auth->verifyCallback($contentType, $authorization, $url, $callbackBody);
var_dump($isQiniuCallback);
if ($isQiniuCallback) {
    $resp = array('ret' => 'success');
} else {
    $resp = array('ret' => 'failed');
}

echo json_encode($resp);
