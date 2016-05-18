 <?php
    require_once './autoload.php';

    // 引入鉴权类
    use Qiniu\Auth;

    // 引入上传类
    use Qiniu\Storage\UploadManager;

    // 需要填写你的 Access Key 和 Secret Key
    $ACCESS_KEY='vI2xPIjOoh7udcRw4GdYNvf3o_gKsCx9wdZaC9u-';
    $SECRET_KEY='ja76Ne-wCvo-YSc88D3TwKM5O3JtBym5isn-YqjN';
    
    // 构建鉴权对象
    $auth = new Auth($ACCESS_KEY, $SECRET_KEY);
    
    // 要上传的空间
    $bucket = 'file';

    // 生成上传 Token
    $token = $auth->uploadToken($bucket,$key=null, 3600);

   $arr=array("uptoken"=>$token);
   echo json_encode($arr);
/*http://www.jinxinzx25.com/qiniu_do_not_delete.gif  当前请求
http://*.imiker.com"        Referer
   curl -I http://www.jinxinzx25.com/qiniu_do_not_delete.gif -H "Referer: http://*.imiker.com"*/