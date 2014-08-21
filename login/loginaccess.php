<?php
ob_start();
define('IN_TG',true);
require dirname(__FILE__).'/../configs/configs.php';
require  $GLOBALS["rootPath"].'includes/function.php';

//判断用户是否已经登录
if(!empty($_COOKIE['username'])){
	exit;
}

//没有的登录就判断POST过来的用户名密码是否能通过验证
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$ret = _query_one_assoc('SELECT id,name,staffid,roleType FROM letsgo_staff WHERE `staffid` = '.$username);
//$ret = _query_one_assoc("SELECT id,name,staffid,roleType FROM letsgo_staff WHERE `staffid` = ".$username." AND password = '".md5($password )."'");
if($ret){
	_set_cookies("username", $ret["name"]);
	_set_cookies("staffid", $ret["staffid"]);
	_set_cookies("roleType", $ret["roleType"]);
	header("location:../index.php");
}else{
	header("Location:login.php");
}
exit;
?>