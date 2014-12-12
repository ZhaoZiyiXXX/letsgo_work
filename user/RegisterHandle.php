<?php
define('IN_TG',true);
define('ACCESS',true);
 include dirname(__FILE__).'/../configs/configs.php';
 require_once $GLOBALS["rootPath"].'/includes/function.php';
	$date =  date('Y-m-d H:i:s',time());
	$sql = "SELECT max(staffId) as maxid FROM letsgo_staff";
	$ret = _query_one_assoc($sql);
	$newstaffid = $ret["maxid"]+1;

	$sql = "INSERT INTO letsgo_staff (staffId,roleType,email,password,name,gender,telephone,birth,nativePlace,qq,college,campus,academy,major,registerTime,level) VALUES ('".
					$newstaffid."', 'level0' ,'".$_POST["email"]."','".md5($_POST["password"])."','".$_POST["name"]."','".$_POST["gender"]."','".$_POST["tel"].
					"','".$_POST["birth"]."','".$_POST["nativePlace"]."','".$_POST["qq"]."','".$_POST["college"]."','".$_POST["campus"]."','".$_POST["academy"]."','".$_POST["major"]."','".$date."','0.4')";
	$ret = _mysql_exec($sql);
if(1 == $ret){
	echo json_encode(array(
			"result" => "0",
			"data" => array(
					"name" =>$_POST["name"],
					"staffid" =>$newstaffid
			),
	));
}else{
	echo json_encode(array(
			"result" => "1000",
			"msg" => "Insert Error",
	));
}
?>