<?php
define('IN_TG',true);
require dirname(__FILE__).'/../configs/configs.php';
require  $GLOBALS["rootPath"].'includes/function.php';
header("Content-type:text/html;charset=utf-8");
//判断用户是否已经登录，未登录用户不得修改个人信息
if(empty($_COOKIE['username'])){
	exit;
}
if(empty($_POST['password1'])||empty($_POST['password2'])){
	$sql = "UPDATE letsgo_staff SET `name`='".$_POST['name']."',`email`='".$_POST['email']."',`telephone`='".$_POST['telephone']."' WHERE staffid = '".$_COOKIE['staffid']."'";
}else{
	if($_POST['password1']!=$_POST['password2']){
		//_alert_back("两次输入的密码不一致！");
		exit;
	}else{
		$sql = "UPDATE letsgo_staff SET `password`='".md5($_POST['password1'])."' name`='".$_POST['name']."',`email`='".$_POST['email'].
		"',`telephone`='".$_POST['telephone']."' WHERE staffid = '".$_COOKIE['staffid']."'";
	}
}

$ret = _mysql_exec($sql);
header("Location:info.php");
exit;
?>