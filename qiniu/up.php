<?php
//require_once 'vendor/qiniu/php-sdk/test.php';
require_once './autoload.php';
require_once'./config.php';
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
$auth = new Auth(Config::ACCESS_KEY, Config::SECRET_KEY);
$bucket = "xiaohu";
$uploadMgr = new UploadManager();
$filePath ="hh.wmv";
$key = 'nulljjjj.lll';
$savekey = Qiniu\base64_urlSafeEncode('file:nihao.mp4');

//$fops11 = 'vframe/jpg/offset/1/w/480/h/360/rotate/90';
//$fops12 = $fops11.'|saveas/'.$savekey;
$token = $auth->uploadToken($bucket, $key, 3600*3600);
$fops13 = 'avthumb/mp4/';
$fops14 = $fops13.'|saveas/'.$savekey;
$policy= array(
'callbackUrl'=>'http://requestb.in/19xgvvr1',
   'callbackBody'=>'key=$(key)&hash=$(hash)&fname=$(fname)&ext=$(ext)',
//   'callbackBodyType'=>"application/x-www-form-urlencoded",
// 'fsizeLimit'=>1024*1024*1024*8*2,
  //  'persistentOps'=>$fops14,
  // 'persistentPipeline'=>'qi',
  // 'persistentNotifyUrl'=>'http://1314xicong.xicp.net:22854/hu.php'
);
//$token="L9HBrzAJrWjPErgKSk-uWniX8xVZVJWF9GPoy-70:TQNUCSHJR8ZM6nVoIkPQ-znY4LI=:eyJzY29wZSI6bnVsbCwiZGVhZGxpbmUiOjE0NjE5Mjk1NTN9";
$token = $auth->uploadToken($bucket, $key, 3600*3600,$policy);
//$token =$auth->uploadToken($bucket,$key,3600);
$data= $uploadMgr->putFile($token, $key, $filePath);


//echo "\n====> putFile result: \n";
echo "<pre>";
var_dump($data);
echo "</pre>";
die();
if ($err !== null) {
	echo "<pre>";
    var_dump($err);
    echo "</pre>";

} else {
    var_dump($ret);
}
?>