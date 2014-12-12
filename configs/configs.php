<?php
if(!defined('IN_TG')){
	exit("Access Defined!");
}

	//$host='http://'.$_SERVER['SERVER_NAME'];
	$host = substr(dirname(__FILE__),0,-7);
	//$host =  $DOCUMENT_ROOT;
	/*$domain='http://work.letsgo.name';
	 $apiUrl = "http://api.jige.olege.com/";
	 $dbURL='s2.qycn.cn';
	$dbName='qydb2c7e';
	$dbUsername='qydb2c7e_f';
	$dbPassword='19880425';*/
	$domain='http://work';
	$apiUrl = "http://api.jigedev.olege.com/";
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
		$GLOBALS["domain"] = $domain;
		$GLOBALS["rootPath"] = $host;
		$GLOBALS["dbURL"]=$dbURL;
		$GLOBALS["dbName"]=$dbName;
		$GLOBALS["dbUsername"]=$dbUsername;
		$GLOBALS["dbPassword"]=$dbPassword;
	}
	config($host,$domain,$dbURL,$dbName,$dbUsername,$dbPassword);
	if(!defined('ACCESS')){
		if(empty($_COOKIE['username'])){
			$url = $domain."/login/login.php";
			echo "<script language='javascript' type='text/javascript'>";
			echo "window.location.href='$url'";
			echo "</script>";
		}
	}
?>