<?php
//?ak="vI2xPIjOoh7udcRw4GdYNvf3o_gKsCx9wdZaC9u-"&sk="ja76Ne-wCvo-YSc88D3TwKM5O3JtBym5isn-YqjN"&key="nihao"&bucket="file"
require_once './autoload.php';
require_once'./config.php';
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
$data=$_REQUEST;
if (isset($data["ak"]) && isset($data["sk"]) && isset($data["bucket"])) {
	$ak=$data["ak"];
	$sk=$data["sk"];
	$bucket=$data["bucket"];
	$bucket=trim($bucket);
$auth = new Auth($ak, $sk);
$uploadMgr = new UploadManager();
}else{
die("至少填写ak sk bucket");
}

if (isset($data["key"])) {
	$key=$data["key"];
}else{
	$key=NULL;
}
if(isset($data["policy"])){
$policy=json_decode($data["policy"]);
}else{
	$policy=NULL;
}

if(isset($data["timeOut"])){
$timeOut=$data["timeOut"];
}else{
$timeOut=60*60;

} 
$filePath = 'data.txt';
$token = $auth->uploadToken($bucket, $key, $timeOut);
$d= $uploadMgr->putFile($token, $key, $filePath);
echo json_encode($d);

?>