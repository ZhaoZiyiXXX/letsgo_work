<?php
if(!defined('IN_TG')){
	exit("Access Defined!");
}
require_once $GLOBALS["rootPath"].'/includes/mysql.php';


function _get_staffinfo_byid($staffid){
	return _query_one_assoc('SELECT id,name,staffid,roleType,email,telephone,college FROM letsgo_staff WHERE `staffid` = '.$staffid);
}
/**
 * 
 * @param string $staffid
 * @return boolean
 */
function _get_orders($staffid = null){
	if($staffid == null){
		$sql = "SELECT lo.staffId AS `工号`,lo.orderId AS `订单号`,lo.orderName AS `订单名称`  FROM letsgo_order AS lo";
	}else{
		$sql = "SELECT lo.staffId AS `工号`,lo.orderId AS `订单号`,lo.orderName AS `订单名称`  FROM letsgo_order AS lo WHERE lo.staffId = '".$staffid."'";
	}
	$result = _query_assoc($sql);
	if(empty($result)){
		return false;
		exit();
	}
	foreach($result as $row){
		echo '<tr>';
		echo '<td>'.$row["工号"].'</td>';
		echo '<td>'.$row["订单号"].'</td>';
		echo '<td>'.$row["订单名称"].'</td>';
		echo '<td><a href="/book/orderinfo.php?orderid='.$row["订单号"].'">详情</a></td>';
		echo'</tr>';
	}
}
/**
 * 
 * @param string $key
 * @param string $value
 * @param string $time
 */
function _set_cookies($key,$value,$time = 0){
	echo $key.$value.$time;
	if($time == 0){
		setcookie($key,$value,null,"/");
	}else{
		setcookie($key,$value,$time,"/");
	}
}
/**
 * 弹出提示框并返回到上一个页面
 * @param string $string
 */
function _alert_back($string){
	echo '<script type="text/javascript">alert('.$string.');history.back(-1);</script>';
}
/**
 * 获取全部公告列表
 */
function _get_notices(){
	$result = _query_assoc("select * from letsgo_notice order by releasetime desc");
	foreach($result as $row){
		echo '<tr>';
		echo '<td>'.$row["releaseTime"].'</td>';
		if($row["type"]=="notice"){
			echo '<td class="content"><a href="/notice.php?id='.$row["id"].'">'.$row["title"].'</a></td>';
		}else{
			echo '<td class="content">'.$row["title"].'</td>';
		}
		echo'</tr>';
	}
}

/**
 * 获取某一条公告的详细信息
 * @param string $id
 */
function _get_one_notices($id){
	return  _query_one_assoc("SELECT * FROM letsgo_notice WHERE id = $id");
}
