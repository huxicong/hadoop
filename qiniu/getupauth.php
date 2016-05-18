<?php
    require_once 'autoload.php';
    require_once 'config.php';

    use Qiniu\Auth;

    $bucket = Config::BUCKET_NAME;
    $accessKey = Config::ACCESS_KEY;
    $secretKey = Config::SECRET_KEY;
    $auth = new Auth($accessKey, $secretKey);
     $uid="1314xicong";
    $policy = array(
      'callbackUrl' => 'http://1314xicong.xicp.net/qiniu/callback.php',
      'callbackBody' => '{"fname":"$(fname)", "fkey":"$(key)", "desc":"$(x:desc)", "uid":' . $uid . '}'
      );
    $upToken = $auth->uploadToken($bucket, null, 3600, $policy);
     $auth->verifyCallback();
    header('Access-Control-Allow-Origin:*');
    echo $upToken;
?>