<?php
$data="鑳＄粏鑱�.wmv";
    function base64_urlSafeDecode($str)
    {
        $find = array('-', '_');
        $replace = array('+', '/');
        return base64_decode(str_replace($find, $replace, $str));
    }
    function base64_urlSafeEncode($data)
    {
        $find = array('+', '/');
        $replace = array('-', '_');
        return str_replace($find, $replace, base64_encode($data));
    }
$data=base64_urlSafeEncode($data);
echo base64_urlSafeDecode("6IOh57uG6IGqLndtdg==");
echo base64_urlSafeDecode("uvrPuLTPLndtdg==");
die();
$uptoken2="vI2xPIjOoh7udcRw4GdYNvf3o_gKsCx9wdZaC9u-:VhWx46vtJRp3_pq2C4qS1qQgaqI=:eyJjYWxsYmFja1VybCI6Imh0dHA6XC9cL3d3dy5lY2hvaHUudG9wXC91cC5waHAiLCJjYWxsYmFja0JvZHkiOiJrZXk9JChrZXkpJmhhc2g9JChoYXNoKSIsImZzaXplTGltaXQiOjE3MTc5ODY5MTg0LCJzY29wZSI6InhpYW9odTpraHVoa2sua2siLCJkZWFkbGluZSI6MTQ1NzUwNjA5N30=";
$uptoken="vI2xPIjOoh7udcRw4GdYNvf3o_gKsCx9wdZaC9u-:CQuXdnjvo56WmAEF0KXpcMvCP1E=:eyJjYWxsYmFja1VybCI6Imh0dHA6XC9cL3d3dy5lY2hvaHUudG9wXC91cC5waHAiLCJjYWxsYmFja0JvZHkiOiJrZXk9JChrZXkpJmZuYW1lPSQoZm5hbWUpJmhhc2g9JChoYXNoKSIsImZzaXplTGltaXQiOjE3MTc5ODY5MTg0LCJzY29wZSI6InhpYW9odTpraHVoa2sua2siLCJkZWFkbGluZSI6MTQ1NzUwNTQzN30=";
$data=explode(":", $uptoken2);
$dt=count($data);
$data=base64_decode($data[$dt-1]);
$da=strstr($data, "fname");
if(empty($da)){
echo "不存在";
}
echo "$da";
echo "<pre>";
var_dump($data);
echo "<pre>";
?>