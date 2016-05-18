<?php
require_once './autoload.php';
require_once'config.php';
use Qiniu\Auth;
use Qiniu\Storage\BucketManager;
/*$accessKey = Config::ACCESS_KEY;
$secretKey = Config::SECRET_KEY;*/

$auth = new Auth(config::ACCESS_KEY, config::SECRET_KEY);
$bucketMgr = new BucketManager($auth);
$bucket1 = 'file';
$bucket2="gethu";
$key1 = '0/blob (3).png';
$key2="hh";
$dd=$bucketMgr->buckets();
var_dump($dd);
die();
$err = $bucketMgr->copy($bucket1, $key1, $bucket2, $key2,true);
if ($err !== null) {
    var_dump($err);
} else {
    echo "Success!";
}
die();
//抓取资源到指定空间
/*$url = 'https://www.midonline.com/images/diamondImages/07-508.jpg';
$key = time().'.jpg';
list($ret, $err) = $bucketMgr->fetch($url, $bucket, $key);

die();
echo "=====> fetch $url to bucket: $bucket  key: $key\n";
if ($err !== null) {
    var_dump($err);
} else {
    echo 'Success';
}
die();*/
/*列举空间资源
 * @param $bucket     空间名
 * @param $prefix     列举前缀
 * @param $marker     列举标识符
 * @param $limit      单次列举个数限制
 * @param $delimiter  指定目录分隔符*/

$prefix = 0;
$marker = null;
$limit = 1000;
list($iterms, $marker, $err)  = $bucketMgr->listFiles($bucket, $prefix, $marker, $limit);
if ($err !== null) {
    echo "\n====> list file err: \n";
    var_dump($err);
} else {
echo "Marker: $marker\n";
echo "\nList Iterms====>\n";
echo "<pre>";
var_dump(count($iterms));
var_dump($iterms);
echo "</pre>";
}
die;
//获取文件的状态信息
$key1 = 'photo1.jpg';
list($ret, $err) = $bucketMgr->stat($bucket, $key1);
echo "\n====> $key stat : \n";
if ($err !== null) {
    var_dump($err);
} else {
    var_dump($ret);
}

//将文件从文件$key 复制到文件$key2。 可以在不同bucket复制
$key2 = 'photo2.jpg';
$err = $bucketMgr->copy($bucket, $key, $bucket, $key2);
echo "\n====> copy $key to $key2 : \n";
if ($err !== null) {
    var_dump($err);
} else {
    echo "Success!";
}

//将文件从文件$key2 移动到文件$key3。 可以在不同bucket移动
$key3 = 'photo3.jpg';
$err = $bucketMgr->move($bucket, $key2, $bucket, $key3);
echo "\n====> move $key2 to $key3 : \n";
if ($err !== null) {
    var_dump($err);
} else {
    echo "Success!";
}

//删除$bucket 中的文件 $key
$key4 = 'uphoto1.jpg';
$err = $bucketMgr->delete($bucket, $key4);
echo "\n====> delete $key3 : \n";
if ($err !== null) {
    var_dump($err);
} else {
    echo "Success!";
}

?>