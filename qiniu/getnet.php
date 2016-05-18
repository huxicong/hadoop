<?php
require_once 'autoload.php';
require_once"config.php";

use Qiniu\Auth;
use Qiniu\Http\Client;
use Qiniu\Http\Response;
// $accessKey = 'accesskey';
// $secretKey = 'secretkey';
$auth = new Auth(Config::ACCESS_KEY, Config::SECRET_KEY);

// 获取带宽
$bandwidth_url = 'http://fusion.qiniuapi.com/domain/traffic?domain=inimg01.jiuyan.info&uid=1380301031&startTime=2016-02-19%2005:00:00&endTime=2016-02-19%2015:00:00';
$bandwidth_headers = $auth->authorization($bandwidth_url);
$bandwidth_res = Client::get($bandwidth_url, $bandwidth_headers);
//$result = Response::bodyJson($bandwidth_res);
var_dump($bandwidth_res->body);