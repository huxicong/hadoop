<?php
/**
* 配置文件
* 
*/
class Config 
{
	const  BUCKET_NAME="qiniu",
    ACCESS_KEY="vI2xPIjOoh7udcRw4GdYNvf3o_gKsCx9wdZaC9u-",
    SECRET_KEY="ja76Ne-wCvo-YSc88D3TwKM5O3JtBym5isn-YqjN",
	    // ACCESS_KEY="DLv3x-EcpG_dzQ_5AnfokXsKSvEUvhv9_zHAl-Vb",
	    // SECRET_KEY="T35Bbxz90nDUt3WzKv8sqV--6-2YG8WyjEbzW1gU",
    BUCKET_NAME2="huxicong";
}
function showdetal($value='')
{
	echo "<pre>";
	
	echo "<pre>";
}
function downfile($filename)
{
 $filename=realpath($filename); //文件名
 $date=date("Ymd-H:i:m");
 Header( "Content-type:  application/octet-stream "); 
 Header( "Accept-Ranges:  bytes "); 
Header( "Accept-Length: " .filesize($filename));
 header( "Content-Disposition:  attachment;  filename= {$date}.doc"); 
 echo file_get_contents($filename);
 readfile($filename); 
}
?>