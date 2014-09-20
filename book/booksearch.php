<?php

define('IN_TG',true);
include dirname(__FILE__).'/configs/configs.php';
require_once $GLOBALS["rootPath"].'/includes/function.php';
if(empty($_GET["q"])){
	echo "{\"result\":0,\"data\":0}";
	exit;
}

$sql = "SELECT * FROM letsgo_staff WHERE staffid = '{$_GET['q']}'  OR  `name` LIKE '%".$_GET['q']."%'";
$result = _query_assoc($sql);
//echo "{\"result\":0,\"data\":".json_encode($result)."}";
//echo json_encode($result);
$html ="";
foreach($result as $row){
	$html .= '<div class="col-md-2">工号：'.$row["staffId"].'</div>';
	$html .= '<div class="col-md-2">姓名：'.$row["name"].'</div>';
	$html .= '<div class="col-md-2">手机：'.$row["telephone"].'</div>';
	$html .= '<div class="col-md-3">邮箱：'.$row["email"].'</div>';
	$html .= '<div class="col-md-3">学校：'.$row["college"].'</div>';
}
echo $html;
exit;

?>


