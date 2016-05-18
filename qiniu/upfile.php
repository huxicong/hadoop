<?php
//require_once 'vendor/qiniu/php-sdk/test.php';
require_once"config.php";
require_once 'autoload.php';
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

$accessKey = Config::ACCESS_KEY;
$secretKey = Config::SECRET_KEY;
$data=new Auth("wI1XAFCkN2OC2Ty28BouznH8HJEQvB429QQWpZWB","-QW6_A5QaGxhzwsmZjy73kvtAJnq4V6wR3QxBv-J");
$url=$data->privateDownloadUrl("http://imggh.topcells.com.cn//20160201/thumb/84_818437.jpg");
var_dump($url);
die();


$jsonStr = json_encode(array("urls"=>array("http://7xpyzu.com1.z0.glb.clouddn.com/.metadata%2F.plugins%2Fcom.zend.php.core%2F__language__%2Fc92995ca%2FZendCodeTrace.php")));
$auth = new Auth($accessKey, $secretKey);
/*$url = "/refresh";
$kk=$auth->signRequest($url,null,"application/json");
var_dump($kk);
die();
$bucket = 'qiniu'
*/
$bucket = 'qiniu';
$uploadMgr = new UploadManager();

// //设置处理结果另存空间以及文件名，php链接字符串用的是.
$savekey = Qiniu\base64_urlSafeEncode('phpdemo:test.jpg');

//------------------图片缩放-------------------
$fops1 ='imageView/2/w/10/h/10';
$fops2 = $fops1.'|saveas/'.$savekey;

//------------------视频转码-------------------
$fops3 ='avthumb/avi/s/500x600';
$fops4 = $fops3.'|saveas/'.$savekey;

//------------------图片水印-------------------
$base64URL = Qiniu\base64_urlSafeEncode('http://developer.qiniu.com/resource/logo-2.jpg');
$fops5 = 'watermark/1/image/'.$base64URL;
$fops6 = $fops5.'|saveas/'.$savekey;
 
//------------------视频切片-------------------
$fops7 = 'avthumb/m3u8/segtime/10/s/500x600';
$fops8 = $fops7.'|saveas/'.$savekey;

//------------------文档转换-------------------
$fops9 = 'yifangyun_preview';
$fops10 = $fops9.'|saveas/'.$savekey;

//------------------视频截图-------------------
$fops11 = 'vframe/jpg/offset/1/w/480/h/360/rotate/90';
$fops12 = $fops11.'|saveas/'.$savekey;
$pipeline = 'hu';
$policy1 = null;
//根据处理需要选择不同的fops
$policy2 = array(
    'persistentOps' => $fops2,
    'persistentPipeline' => $pipeline
);
header("Content-type: text/html; charset=utf-8"); 
//获得上传Token,uploadToken第二个参数设置为null为普通上传，设置为$key为覆盖上传
//$filePath = 'D:\WWW\qiniu\hh.wmv';
$filePath="hu.jpg";
$key = 'huhu.jpg';//上传后的名字
$token = $auth->uploadToken($bucket, $key, 36000, $policy2);
list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
curl -I https://dn-loggerhead.qbox.me/images%2Fautocomplete.png -H "Referer: https://www.baidu.com"
"


?>