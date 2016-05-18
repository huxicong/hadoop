<?php
require_once '../autoload.php';

use Qiniu\Auth;

$accessKey = 't5iCGtp8EwoOk8WzCgutKe9zvq7pChdMCQjluruk';
$secretKey = 'sIW4WqyDDWRfsYzc1Va4KEknTJ6DNO9IgRWbYWzY';

// 构建Auth对象
$auth = new Auth($accessKey, $secretKey);

// 私有空间中的外链 http://<domain>/<file_key>
$baseUrl = 'http://balloon.justbehere.net/FigYz1y7VqAkBX4XTzuqq1gWY8Uv';
// 对链接进行签名
$signedUrl = $auth->privateDownloadUrl($baseUrl);

echo $signedUrl;
