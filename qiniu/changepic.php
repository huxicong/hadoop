<?php
require_once 'autoload.php';
require_once"config.php";
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
   $bucket = Config::BUCKET_NAME;
    $auth = new Auth(Config::ACCESS_KEY, Config::SECRET_KEY);

    $wmImg = Qiniu\base64_urlSafeEncode('http://rwxf.qiniudn.com/logo-s.png');
    $pfopOps = "avthumb/m3u8/wmImage/$wmImg";
    $policy = array(
        'persistentOps' => $pfopOps,
        'persistentNotifyUrl' => 'F:\Yii2视频教程（一、基本概念）老汉出品.wmv',
    );

    $upToken = $auth->uploadToken($bucket, null, 3600, $policy);

    echo json_encode(array('uptoken' => $upToken));
    die();
//require_once 'vendor/qiniu/php-sdk/test.php';
// require_once 'autoload.php';
// require_once"config.php";
// use Qiniu\Auth;
// use Qiniu\Storage\UploadManager;
// $auth = new Auth(Config::ACCESS_KEY, Config::SECRET_KEY);
// $bucket = Config::BUCKET_NAME;
// $uploadMgr = new UploadManager();

// // //设置处理结果另存空间以及文件名，php链接字符串用的是.
// $savekey = Qiniu\base64_urlSafeEncode('phpdemo:test.jpg');

// //------------------图片缩放-------------------
// $fops1 ='imageView/2/w/200/h/200';
// $fops2 = $fops1.'|saveas/'.$savekey;

// //------------------视频转码-------------------
// $fops3 ='avthumb/avi/s/500x600';
// $fops4 = $fops3.'|saveas/'.$savekey;

// //------------------图片水印-------------------
// $base64URL = Qiniu\base64_urlSafeEncode('http://developer.qiniu.com/resource/logo-2.jpg');
// $fops5 = 'watermark/1/image/'.$base64URL;
// $fops6 = $fops5.'|saveas/'.$savekey;

// //------------------视频切片-------------------
// $fops7 = 'avthumb/m3u8/segtime/10/s/500x600';
// $fops8 = $fops7.'|saveas/'.$savekey;

// //------------------文档转换-------------------
// $fops9 = 'yifangyun_preview';
// $fops10 = $fops9.'|saveas/'.$savekey;

// //------------------视频截图-------------------
// $fops11 = 'vframe/jpg/offset/1/w/480/h/360/rotate/90';
// $fops12 = $fops11.'|saveas/'.$savekey;

//源码中关于uploadToken的代码段
// public function uploadToken(
//         $bucket,
//         $key = null,
//         $expires = 3600,
//         $policy = null,
//         $strictPolicy = true
//     )

// //源码中关于putFile的代码段
// public function putFile(
//     $upToken,
//     $key,
//     $filePath,
//     $params = null,
//     $mime = 'application/octet-stream',
//     $checkCrc = false
//     )

// $pipeline = 'mpsdemo';
// $policy1 = null;
// //根据处理需要选择不同的fops
// $policy2 = array(
//     'persistentOps' => $fops2,
//     'persistentPipeline' => $pipeline
// );

// //获得上传Token,uploadToken第二个参数设置为null为普通上传，设置为$key为覆盖上传
// $filePath = '/Users/dxy/sync/photo-2.jpg';
// $key = 'aaa/aaa';
// $token = $auth->uploadToken($bucket, $key, 3600, $policy1);
// echo "$token";
// list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
// echo "\n====> putFile result: \n";
// if ($err !== null) {
//     var_dump($err);

// } else {
//     var_dump($ret);
//     echo $ret[ "width"];
//     echo $ret["key"];
// }

?>