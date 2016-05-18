<?php
namespace Qiniu;

final class Zone
{
    public $upHost;
    public $upHostBackup;
    public function __construct($upHost, $upHostBackup)
    {
        $this->upHost = $upHost;
        $this->upHostBackup = $upHostBackup;
    }
//'http://up.qiniu.com'原站上传
//'http://upload.qiniu.com'cdn上传
    public static function zone0()
    {
        return new self('http://up.qiniu.com', 'http://upload.qiniu.com');
    }

    public static function zone1()
    {
        return new self('http://up-z1.qiniu.com', 'http://upload-z1.qiniu.com');
    }
}


