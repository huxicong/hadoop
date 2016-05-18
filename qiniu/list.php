<?php
require_once"config.php";
require_once 'autoload.php';
use Qiniu\Auth;
use Qiniu\Storage\BucketManager;
$accessKey = Config::ACCESS_KEY;
$secretKey = Config::SECRET_KEY;
$auth = new Auth($accessKey, $secretKey);
$bucketMgr = new BucketManager($auth);
$bucket = 'qiniu';
header("Content-type: text/html; charset=utf-8"); 
// 抓取资源到指定空间
/*$url = 'https://www.midonline.com/images/diamondImages/07-508.jpg';
$key = time().'.jpg';
list($ret, $err) = $bucketMgr->fetch($url, $bucket, $key);
echo "=====> fetch $url to bucket: $bucket  key: $key\n";
if ($err !== null) {
    var_dump($err);
} else {
    echo 'Success';
}
*/
/*列举空间资源
 * @param $bucket     空间名
 * @param $prefix     列举前缀
 * @param $marker     列举标识符
 * @param $limit      单次列举个数限制
 * @param $delimiter  指定目录分隔符
*/
$prefix = "0";
$marker = null;
$limit = 100;
list($iterms, $marker, $err) = $bucketMgr->listFiles($bucket, $prefix, $marker, $limit);
/*if ($err !== null) {
    echo "\n====> list file err: \n";
    var_dump($err);
} else {
    echo "Marker: $marker\n";
    echo "\nList Iterms====>\n";
    var_dump($iterms);
}*/