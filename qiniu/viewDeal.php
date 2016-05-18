<?php

require_once 'autoload.php';
require_once"config.php";
use Qiniu\Auth;
use Qiniu\Processing\PersistentFop;

$accessKey = Config::ACCESS_KEY;
$secretKey = Config::SECRET_KEY;
$auth = new Auth($accessKey, $secretKey);
//$key=null;
$pipeline = 'qi';
$bucket = 'echohu';
$pfop = new PersistentFop($auth, $bucket,$pipeline);
$savekey = Qiniu\base64_urlSafeEncode('echo:iam');
$encodedUrl1 = Qiniu\base64_urlSafeEncode('http://7xr250.dl1.z0.glb.clouddn.com/hux.mp4');
$encodedUrl2 = Qiniu\base64_urlSafeEncode('http://7xr250.dl1.z0.glb.clouddn.com/huxicong.mp4');
$fops13 = 'avconcat/2/format/mp4/'.$encodedUrl1.'/'.$encodedUrl2;
$fops14 = $fops13.'|saveas/'.$savekey;
var_dump($pfop->execute($key,$fops14));
die();


$key = 'o_1agbvf3da16vb1nu9k5s1rv61ae0g.mp4';


$fops11 = 'vframe/jpg/offset/1/w/480/h/360/rotate/90';
$fops12 = $fops11.'|saveas/'.$savekey;
$data = $pfop->execute($key,$fops12);
var_dump($data);

die();
$f="avthumb/mp3";
$sa=$f.'|saveas/'.$savekey;
$data= $pfop->execute($key,$sa);
var_dump($data);
die();
$fops11 = 'vframe/jpg/offset/1/w/480/h/360/rotate/90';
$fops12 = $fops11.'|saveas/'.$savekey;
$data = $pfop->execute($key,$fops12);
var_dump($data);
die();

$f="avthumb/mp4";
$sa=$f.'|saveas/'.$savekey;
$data= $pfop->execute($key,$sa);
var_dump($data);
die();


$encodedUrl1 = Qiniu\base64_urlSafeEncode('http://7xr250.dl1.z0.glb.clouddn.com/hux.mp4');
$encodedUrl2 = Qiniu\base64_urlSafeEncode('http://7xr250.dl1.z0.glb.clouddn.com/huxicong.mp4');
$fops13 = 'avconcat/2/format/mp4/'.$encodedUrl1.'/'.$encodedfile2;
$fops14 = $fops13.'|saveas/'.$savekey;
var_dump($pfop->execute($key,$fops14));
die();
//设置处理结果另存空间以及文件名，php链接字符串用的是.
$savekey = Qiniu\base64_urlSafeEncode('file:huxicong.mp4');
/*可以设置ts文件自定义命名，具体可以参考http://developer.qiniu.com/docs/v6/api/reference/fop/av/segtime.html*/
$savets =Qiniu\base64_urlSafeEncode('daixionyi$(count)');
$f="avthumb/mp4";
$sa=$f.'|saveas/'.$savekey;
$data= $pfop->execute($key,$sa);
var_dump($data);
die();
//------------------图片缩放-------------------
//$fops1 ='imageView/2/w/200/h/200';
//$fops2 = $fops1.'|saveas/'.$savekey;
$fopsy="imageView/crop/!300x400a10a10";
$fops2 = $fopsy.'|saveas/'.$savekey;
//------------------视频转码-------------------
$fops3 ='avthumb/flv/vb/229k/vcodec/libx264/noDomain/1';
$fops4 = $fops3.'|saveas/'.$savekey;

//------------------图片水印-------------------
$base64URL = Qiniu\base64_urlSafeEncode('http://developer.qiniu.com/resource/logo-2.jpg');
$fops5 = 'watermark/1/image/'.$base64URL;
$fops6 = $fops5.'|saveas/'.$savekey;

//------------------视频切片-------------------
   //设置ts文件名
$fops71 = 'avthumb/m3u8/pattern/'.$savets;
$fops81 = $fops71.'|saveas/'.$savekey;

$fops72 = 'avthumb/m3u8/vb/640k/hlsKey/MDEyMzQ1Njc4OTEyMzQ1Ng==/hlsKeyUrl/aHR0cDovLzd4bGVrYi5jb20yLnowLmdsYi5xaW5pdWNkbi5jb20vcWluaXV0ZXN0LmtleQ==';
$fops82 = $fops72.'|saveas/'.$savekey;

//------------------文档转换-------------------
$fops9 = 'yifangyun_preview';
$fops10 = $fops9.'|saveas/'.$savekey;

//------------------视频截图-------------------
$fops11 = 'vframe/jpg/offset/1/w/480/h/360/rotate/90';
$fops12 = $fops11.'|saveas/'.$savekey;

//------------------视频拼接-------------------
//拼接视频片段时要保证所有源的画面长宽值一致
//除去作为数据处理对象的源文件以外，还可以指定最多5个源文件（即总计6个片段）
//所有源文件必须属于同一存储空间
//格式:avconcat/<Mode>/format/<Format>/<encodedUrl0>/<encodedUrl1>/<encodedUrl2>/...
$encodedUrl1 = Qiniu\base64_urlSafeEncode('http://7xl4c9.com1.z0.glb.clouddn.com/pingjie2.flv');
$encodedUrl2 = Qiniu\base64_urlSafeEncode('http://7xl4c9.com1.z0.glb.clouddn.com/pingjie3.avi');
$fops13 = 'avconcat/2/format/mp4/'.$encodedUrl1.'/'.$encodedUrl2;
$fops14 = $fops13.'|saveas/'.$savekey;

//------------------多文件压缩-------------------
//可将若干七牛空间中的资源文件，在七牛服务端压缩后存储
//格式:mkzip/<mode>/url/<Base64EncodedURL>/alias/<Base64EncodedAlias>/url/<Base64EncodedURL>
$encodedfile1 = Qiniu\base64_urlSafeEncode('http://7xl4c9.com1.z0.glb.clouddn.com/photo1.jpg');
$encodedfile2 = Qiniu\base64_urlSafeEncode('http://7xl4c9.com1.z0.glb.clouddn.com/vedio1.mp4');
$encodedfile3 = Qiniu\base64_urlSafeEncode('http://7xl4c9.com1.z0.glb.clouddn.com/audio1.mp3');
$fops15 = 'mkzip/2/url/'.$encodedfile1.'/url/'.$encodedfile2.'/url/'.$encodedfile3;
$fops16 = $fops15.'|saveas/'.$savekey;
$dt="avthumb/mp4/ab/128000/vb/2000000/subtitle/aHR0cDovL2h3dDAud2ljcC5uZXQ6MTQ0NTAvYXBpL3RlbnNfc2hvdy9zcnQvMjQ5LnNydA==";
//根据需求选择不同的fop进行数据处理
list($id, $err) = $pfop->execute($key,$dt);
echo "\n====> pfop avthumb result: \n";
if ($err != null) {
    var_dump($err);
} else {
    echo "PersistentFop Id: $id \n";
    $res = "http://api.qiniu.com/status/get/prefop?id=$id";
    echo "Processing result: $res";
}
?>