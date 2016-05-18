 <?php
 // require_once './autoload.php';
 //  use Qiniu\Auth;
 // require_once"./config.php";
 //  $bucket = $array["youspace"];
 //  $accessKey = $array["accessKey"];
 //  $secretKey = $array["secretKey"];
 //  $auth = new Auth($accessKey, $secretKey);
 //  $upToken = $auth->uploadToken($bucket);
 //  echo $upToken;
      require_once './autoload.php';

    // 引入鉴权类
    use Qiniu\Auth;

    // 引入上传类
    use Qiniu\Storage\UploadManager;

    // 需要填写你的 Access Key 和 Secret Key
    $accessKey = 'vI2xPIjOoh7udcRw4GdYNvf3o_gKsCx9wdZaC9u-';
    $secretKey = 'ja76Ne-wCvo-YSc88D3TwKM5O3JtBym5isn-YqjN';
    
    // 构建鉴权对象
    $auth = new Auth($accessKey, $secretKey);
    
    // 要上传的空间
    $bucket = 'qiniu';

    // 生成上传 Token
    $token = $auth->uploadToken($bucket);
    
    // 要上传文件的本地路径
    $filePath = 'D:\WWW\qiniu\hh.wmv';

    // 上传到七牛后保存的文件名
    $key = 'my-php-logo.png';

    // 初始化 UploadManager 对象并进行文件的上传。
    $uploadMgr = new UploadManager();
    list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath,3600);
    echo "\n====> putFile result: \n";
    if ($err !== null) {
        var_dump($err);
    } else {
        var_dump($ret);
    }