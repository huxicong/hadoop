<?php
/**
 * PHP发送Json对象数据
 *
 * @param $url 请求url
 * @param $jsonStr 发送的json字符串
 * @return array
 */
define("ACCESS_KEY","vI2xPIjOoh7udcRw4GdYNvf3o_gKsCx9wdZaC9u-");
define("SECRET_KEY","ja76Ne-wCvo-YSc88D3TwKM5O3JtBym5isn-YqjN");
    function base64_urlSafeEncode($data)
    {
        $find = array('+', '/');
        $replace = array('-', '_');
        return str_replace($find, $replace, base64_encode($data));
    }
         function sign($data)
    {
        $hmac = getSignature($data, "ja76Ne-wCvo-YSc88D3TwKM5O3JtBym5isn-YqjN");
        return "vI2xPIjOoh7udcRw4GdYNvf3o_gKsCx9wdZaC9u-". ':' . base64_urlSafeEncode($hmac);
    }
function getSignature($str, $key) {
$signature = "";
if (function_exists('hash_hmac')) {
$signature = base64_encode(hash_hmac("sha1", $str, $key, true));
} else {
$blocksize = 64;
$hashfunc = 'sha1';
if (strlen($key) > $blocksize) {
$key = pack('H*', $hashfunc($key));
}
$key = str_pad($key, $blocksize, chr(0x00));
$ipad = str_repeat(chr(0x36), $blocksize);
$opad = str_repeat(chr(0x5c), $blocksize);
$hmac = pack(
'H*', $hashfunc(
($key ^ $opad) . pack(
'H*', $hashfunc(
($key ^ $ipad) . $str
)
)
)
);
$signature = base64_encode($hmac);
}
return $signature;
}
     function signRequest($urlString, $body=null, $contentType = "application/json")
    {
        $url = parse_url($urlString);
        $data = '';
        if (array_key_exists('path', $url)) {
            $data = $url['path'];
        }
        if (array_key_exists('query', $url)) {
            $data .= '?' . $url['query'];
        }
        $data .= "\n";
        return sign($data);
    }
function http_post_json($url, $jsonStr,$auth)
{
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonStr);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json; charset=utf-8','authorization'=>$auth
    )
  );
  $response = curl_exec($ch);
  $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

  return array($httpCode, $response);
}

$url = "http://fusion.qiniuapi.com/refresh";
$at=array("urls"=>array("http://7xpyzu.com1.z0.glb.clouddn.com/.metadata%2F.plugins%2Fcom.zend.php.core%2F__language__%2Fc92995ca%2FZendCodeTrace.php"));
$jsonStr = json_encode($at);
var_dump($jsonStr);
$auth=signRequest($jsonStr);
$da= http_post_json($url, $jsonStr,"vI2xPIjOoh7udcRw4GdYNvf3o_gKsCx9wdZaC9u-:0KPRVoBiHR2c9K-t9bBr5DVDuUU=");
var_dump($da);