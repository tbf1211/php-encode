<?php

header("Content-type: text/html; charset=utf-8");

//加密方法 
 function myEncode($string, $key = '')
 {
 	$key = md5($key);
 	$ret = '';

 	$base64String = base64_encode($string);
 	$oldChr = '';
 	$md5Chr = '';
 	$len = strlen($base64String);
 	for($i = 0; $i < $len; $i++)
 	{
 		$md5Chr = $key[$i%32];
 		$oldChr = $base64String[$i];
 		$ret .= chr(ord($oldChr)^ord($md5Chr));
 	}

 	return $ret;
 }

//解密方法
 function myDecode($string, $key = '')
 {
 	$key = md5($key);
 	$tmp = '';

 	$md5Chr = '';
 	$enChr = '';
 	$len = strlen($string);
 	for($i = 0; $i < $len; $i++)
 	{
 		$md5Chr = $key[$i%32];
 		$enChr = $string[$i];
 		$tmp .= chr(ord($enChr)^ord($md5Chr));
 	}
 	return base64_decode($tmp);
 }

 $string = <<<INFO
 'http://zhidao.baidu.com/link?url=xcvdO1qQ7qCupY52idgJqCn3gNQ58WEPLiqiueKSfl2OzKUlhpcR392K9UdZbSVsRRsO1FBSf18vmKMP-WfBv_'
 'tbf1211'
 INFO;
 $myEn = myEncode($string, 'fuck');
 $myDe = myDecode($myEn, 'fuck');
 var_dump($myEn, $myDe);
