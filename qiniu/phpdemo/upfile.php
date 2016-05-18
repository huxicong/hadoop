<?php
    require '../autoload.php';
 require_once"./config.php";
    use Qiniu\Auth;
    use Qiniu\Storage\UploadManager;
    
    // 设置信息
    $APP_ACCESS_KEY = Config::ACCESS_KEY;
    $APP_SECRET_KEY = Config::SECRET_KEY;
    
    $bucket = Config::BUCKET_NAME2;
    $file = './config.php';
    $asname="config.php";
    $auth = new Auth($APP_ACCESS_KEY, $APP_SECRET_KEY);
    $token = $auth->uploadToken($bucket,$asname);
    $uploadManager = new UploadManager();
    //两个key需要相同
    list($ret, $err) = $uploadManager->putFile($token, $asname, $file);
    if ($err != null) {
    	showdetal($err->message);
    } else {
    	showdetal($ret["key"]);
    }
?>