<?php
ob_start();
define('IN_TG',true);
require dirname(__FILE__).'/../configs/configs.php';
require  $GLOBALS["rootPath"].'includes/function.php';
_set_cookies("username", $ret["name"],-3600);
_set_cookies("staffid", $ret["staffid"],-3600);
_set_cookies("roleType", $ret["roleType"],-3600);
header("location:login.php");
exit;
?>