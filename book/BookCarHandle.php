<?php
if(!isset($_POST['name'])){
	echo "{result:0,data:0}";
}
define('IN_TG',true);
include dirname(__FILE__).'/../configs/configs.php';
include_once $GLOBALS["rootPath"].'/includes/ShopCar.php';
session_start();
$bookcar = new Shopcar();
$newbook = array(
	'id' =>$_POST['id'],
	'name' => $_POST['name'],
	'press' => $_POST['press'],
	'fixedPrice' => $_POST['fixedPrice']
);

$bookcar->add($newbook);
