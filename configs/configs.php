<?php
if(!defined('IN_TG')){
	exit("Access Defined!");
}
	//$host='http://'.$_SERVER['SERVER_NAME'];
	$host = substr(dirname(__FILE__),0,-7);
	//$host =  $DOCUMENT_ROOT;
	$domain='';
	$dbURL='localhost';
	$dbName='test';
	$dbUsername='root';
	$dbPassword='1234';
	function config($host,$domain,$dbURL,$dbName,$dbUsername,$dbPassword)
	{
/* 		$temp='';
		if(empty($domain))
			$temp=$host;
		else {
			$temp =$host.'/'.$domain;
		} */ 
// 		$GLOBALS["rootPath"]=$temp;
		$GLOBALS["rootPath"] = $host;
		$GLOBALS["dbURL"]=$dbURL;
		$GLOBALS["dbName"]=$dbName;
		$GLOBALS["dbUsername"]=$dbUsername;
		$GLOBALS["dbPassword"]=$dbPassword;
	}
	config($host,$domain,$dbURL,$dbName,$dbUsername,$dbPassword);
?>